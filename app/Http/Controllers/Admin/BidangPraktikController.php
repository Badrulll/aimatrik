<?php

namespace App\Http\Controllers\Admin;

use App\Constants\AppConst;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BidangPraktik\BidangPraktikStoreRequest;
use App\Http\Requests\Admin\BidangPraktik\BidangPraktikUpdateRequest;
use App\Services\BidangKapabilitas\BidangKapabilitasQueryService;
use App\Services\BidangPraktik\BidangPraktikCommandService;
use App\Services\BidangPraktik\BidangPraktikQueryService;
use App\Services\Domain\DomainQueryService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

final class BidangPraktikController extends Controller
{
    // Constructor
    public function __construct(
        private readonly DomainQueryService $domainQueryService,
        private readonly BidangKapabilitasQueryService $bidangKapabilitasQueryService,
        private readonly BidangPraktikCommandService $bidangPraktikCommandService,
        private readonly BidangPraktikQueryService $bidangPraktikQueryService
    ) {}

    public function index(Request $request, string $id_domain, string $id_bidang_kapabilitas): View
    {
        // Cari Domain berdasarkan id
        $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

        // Cek domain ada atau tidak
        if (! isset($findDomain)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        // Cari bidang kapabilitas
        $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

        // Cek apakah bidang kapabilitas ada atau domainnya beda
        if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
            abort(Response::HTTP_NOT_FOUND);
        }

        // Mengambil semua bidang praktik
        $getAllBidangPraktik = $this->bidangPraktikQueryService->getAllBidangPraktik(id_bidang_kapabilitas: $id_bidang_kapabilitas);

        // Membuat next code
        $nextCode = $findBidangKapabilitas->code.'.'.AppConst::CODE_NAME['bidang_praktik'].'0'.count($getAllBidangPraktik) + 1;

        // Return view
        return view('admin.pages.bidang-praktik.index', compact('getAllBidangPraktik', 'findDomain', 'findBidangKapabilitas', 'nextCode'));
    }

    public function store(BidangPraktikStoreRequest $request, string $id_domain, string $id_bidang_kapabilitas): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();

            // Cari domain
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Cek domain ada atau tidak
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.store', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang kapabilitas
            $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

            // Cek apakah bidang kapabilitas ada atau domainnya beda
            if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.store', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Menyimpan bidang praktik
            $this->bidangPraktikCommandService->storeBidangPraktik(request: $request);

            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas])->with('success', trans('response.success.store', ['data' => 'Bidang Praktik']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas])->with('error', $th->getMessage());
        }
    }

    public function update(BidangPraktikUpdateRequest $request, string $id_domain, string $id_bidang_kapabilitas, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Cari domain
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Cek domain ada atau tidak
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.update', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang kapabilitas
            $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

            // Cek apakah bidang kapabilitas ada atau domainnya beda
            if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang praktik
            $bidangPraktik = $this->bidangPraktikQueryService->findBidangPraktikById(id: $id);

            // Cek apakah bidang praktik ada atau bidang kapabilitasnya beda
            if (! isset($bidangPraktik) || $bidangPraktik->bidang_kapabilitas_id !== $findBidangKapabilitas->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Bidang Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Ubah bidang praktik
            $this->bidangPraktikCommandService->updateBidangPraktik(request: $request, bidangPraktik: $bidangPraktik);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas])->with('success', trans('response.success.update', ['data' => 'Bidang Praktik']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas])->with('error', $th->getMessage());
        }
    }

    public function delete(Request $request, string $id_domain, string $id_bidang_kapabilitas, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();

            // Cari domain
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Cek domain ada atau tidak
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.delete', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang kapabilitas
            $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

            // Cek apakah bidang kapabilitas ada atau domainnya beda
            if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang praktik
            $bidangPraktik = $this->bidangPraktikQueryService->findBidangPraktikById(id: $id);

            // Cek apakah bidang praktik ada atau bidang kapabilitasnya beda
            if (! isset($bidangPraktik) || $bidangPraktik->bidang_kapabilitas_id !== $findBidangKapabilitas->id) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Cek apakah bidang praktik masih digunakan di pertanyaan
            if ($bidangPraktik->questionAnswerBidPraktik->count() > 0) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Praktik', 'error' => 'bidang praktik masih digunakan pada Daftar Penilaian']));
            }

            // Jika sedang memiliki praktik
            if ($bidangPraktik->praktik->count() > 0) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Praktik', 'error' => 'bidang praktik masih digunakan pada praktik']));
            }

            // Jika bidang praktik sedang aktif
            if ($bidangPraktik->is_active) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Praktik', 'error' => 'bidang praktik masih aktif']));
            }

            // Hapus bidang praktik
            $this->bidangPraktikCommandService->deleteBidangPraktik(bidangPraktik: $bidangPraktik);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas])->with('success', trans('response.success.delete', ['data' => 'Bidang Praktik']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas])->with('error', $th->getMessage());
        }
    }

    public function setStatus(Request $request, string $id_domain, string $id_bidang_kapabilitas, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();

            // Cari domain
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Cek domain ada atau tidak
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.update', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang kapabilitas
            $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

            // Cek apakah bidang kapabilitas ada atau domainnya beda
            if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Cari bidang praktik
            $bidangPraktik = $this->bidangPraktikQueryService->findBidangPraktikById(id: $id);

            // Cek apakah bidang praktik ada atau bidang kapabilitasnya beda
            if (! isset($bidangPraktik) || $bidangPraktik->bidang_kapabilitas_id !== $findBidangKapabilitas->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Bidang Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Ubah status
            $this->bidangPraktikCommandService->setStatus(bidangPraktik: $bidangPraktik);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas])->with('success', trans('response.success.switch', ['data' => 'Perubahan status bidang praktik']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas])->with('error', $th->getMessage());
        }
    }
}
