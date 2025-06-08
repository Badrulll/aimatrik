<?php

namespace App\Http\Controllers\Admin;

use App\Constants\AppConst;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BidangKapabilitas\BidangKapabilitasStoreRequest;
use App\Http\Requests\Admin\BidangKapabilitas\BidangKapabilitasUpdateRequest;
use App\Services\BidangKapabilitas\BidangKapabilitasCommandService;
use App\Services\BidangKapabilitas\BidangKapabilitasQueryService;
use App\Services\Domain\DomainQueryService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

final class BidangKapabilitasController extends Controller
{
    // Constructor
    public function __construct(
        private readonly DomainQueryService $domainQueryService,
        private readonly BidangKapabilitasCommandService $bidangKapabilitasCommandService,
        private readonly BidangKapabilitasQueryService $bidangKapabilitasQueryService
    ) {}

    public function index(Request $request, string $id_domain): View
    {
        // Cari domain berdasarkan id
        $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

        // Jika gk ketemu maka respon 404
        if (! isset($findDomain)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        // Cari semua bidang kapabilitas
        $getAllBidangKapabilitas = $this->bidangKapabilitasQueryService->getAllBidangKapabilitas(id_domain: $id_domain);

        // Mapping kodenya
        $nextCode = $findDomain->code.'.'.AppConst::CODE_NAME['bidang_kapabilitas'].'0'.count($getAllBidangKapabilitas) + 1;

        // Return view
        return view('admin.pages.bidang-kapabilitas.index', compact('getAllBidangKapabilitas', 'findDomain', 'nextCode'));
    }

    public function store(BidangKapabilitasStoreRequest $request, string $id_domain): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Cari domain berdasarkan id
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Jika gk ketemu
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.store', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Simpan bidang kapabilitas
            $this->bidangKapabilitasCommandService->storeBidangKapabilitas(request: $request);

            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $id_domain])->with('success', trans('response.success.store', ['data' => 'Bidang Kapabilitas']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $id_domain])->with('error', $th->getMessage());
        }
    }

    public function update(BidangKapabilitasUpdateRequest $request, string $id_domain, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Cari domain berdasarkan id
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Jika gk ketemu
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.store', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang kapabilias
            $bidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id);

            // Jika gk ketemu atau domainnya beda
            if (! isset($bidangKapabilitas) || $bidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Update bidang kapabilitas
            $this->bidangKapabilitasCommandService->updateBidangKapabilitas(request: $request, bidangKapabilitas: $bidangKapabilitas);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $id_domain])->with('success', trans('response.success.update', ['data' => 'Bidang Kapabilitas']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $id_domain])->with('error', $th->getMessage());
        }
    }

    public function delete(Request $request, string $id_domain, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();

            // Cari domain berdasarkan id
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Jika gk ketemu
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.delete', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang kapabilias
            $bidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id);

            // Jika gk ketemu atau domainnya beda
            if (! isset($bidangKapabilitas) || $bidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Cek apakah bidang kapabilitas masih digunakan di pertanyaan
            if ($bidangKapabilitas->questionAnswerBidKapabilitas->count() > 0) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Kapabilitas', 'error' => 'bidang kapabilitas masih digunakan pada Daftar Penilaian']));
            }

            // Jika sedang memiliki bidang praktik
            if ($bidangKapabilitas->bidangPraktik->count() > 0) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Kapabilitas', 'error' => 'bidang kapabilitas masih digunakan pada bidang praktik']));
            }

            // Jika bidang kapabilitas sedang aktif
            if ($bidangKapabilitas->is_active) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Kapabilitas', 'error' => 'bidang kapabilitas masih aktif']));
            }

            // Hapus
            $this->bidangKapabilitasCommandService->deleteBidangKapabilitas(bidangKapabilitas: $bidangKapabilitas);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $id_domain])->with('success', trans('response.success.delete', ['data' => 'Bidang Kapabilitas']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $id_domain])->with('error', $th->getMessage());
        }
    }

    public function setStatus(Request $request, string $id_domain, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Cari domain
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Cek apakah ada
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.update', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang kapabilitas
            $bidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id);

            // Cek apakah ada atau domainnya beda
            if (! isset($bidangKapabilitas) || $bidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Ubah status
            $this->bidangKapabilitasCommandService->setStatus(bidangKapabilitas: $bidangKapabilitas);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $id_domain])->with('success', trans('response.success.switch', ['data' => 'Perubahan status bidang kapabilitas']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $id_domain])->with('error', $th->getMessage());
        }
    }
}
