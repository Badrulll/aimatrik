<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Praktik\PraktikStoreRequest;
use App\Http\Requests\Admin\Praktik\PraktikUpdateRequest;
use App\Services\BidangKapabilitas\BidangKapabilitasQueryService;
use App\Services\BidangPraktik\BidangPraktikQueryService;
use App\Services\Domain\DomainQueryService;
use App\Services\Praktik\PraktikCommandService;
use App\Services\Praktik\PraktikQueryService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

final class PraktikController extends Controller
{
    // Constructor
    public function __construct(
        private readonly DomainQueryService $domainQueryService,
        private readonly BidangKapabilitasQueryService $bidangKapabilitasQueryService,
        private readonly BidangPraktikQueryService $bidangPraktikQueryService,
        private readonly PraktikCommandService $praktikCommandService,
        private readonly PraktikQueryService $praktikQueryService
    ) {}

    public function index(Request $request, string $id_domain, string $id_bidang_kapabilitas, string $id_bidang_praktik): View
    {
        // Mengambil domain
        $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

        // Jika gk ketemu maka respon 404
        if (! isset($findDomain)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        // Mengambil bidang kapabilitas
        $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

        // Jika gk ketemu atau domainnya beda maka respon 404
        if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
            abort(Response::HTTP_NOT_FOUND);
        }

        // Mengambil bidang praktik
        $findBidangPraktik = $this->bidangPraktikQueryService->findBidangPraktikById(id: $id_bidang_praktik);

        // Jika gk ketemu atau bidang kapabilitasnya beda maka respon 404
        if (! isset($findBidangPraktik) || $findBidangPraktik->bidang_kapabilitas_id !== $findBidangKapabilitas->id) {
            abort(Response::HTTP_NOT_FOUND);
        }

        // Mengambil semua praktik
        $getAllPraktik = $this->praktikQueryService->getAllPraktik(id_bidang_praktik: $id_bidang_praktik);

        // Return view
        return view('admin.pages.praktik.index', compact('getAllPraktik', 'findDomain', 'findBidangKapabilitas', 'findBidangPraktik'));
    }

    public function store(PraktikStoreRequest $request, string $id_domain, string $id_bidang_kapabilitas, string $id_bidang_praktik): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Mengambil domain
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Jika gk ketemu maka respon 404
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.store', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil bidang kapabilitas
            $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

            // Jika gk ketemu atau domainnya beda maka respon 404
            if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.store', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil bidang praktik
            $findBidangPraktik = $this->bidangPraktikQueryService->findBidangPraktikById(id: $id_bidang_praktik);

            // Jika gk ketemu atau bidang kapabilitasnya beda maka respon 404
            if (! isset($findBidangPraktik) || $findBidangPraktik->bidang_kapabilitas_id !== $findBidangKapabilitas->id) {
                throw new Exception(trans('response.error.store', ['data' => 'Bidang Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Menyimpan praktik
            $this->praktikCommandService->storePraktik(request: $request);

            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas, 'id_bidang_praktik' => $id_bidang_praktik])->with('success', trans('response.success.store', ['data' => 'Praktik']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas, 'id_bidang_praktik' => $id_bidang_praktik])->with('error', $th->getMessage());
        }
    }

    public function update(PraktikUpdateRequest $request, string $id_domain, string $id_bidang_kapabilitas, string $id_bidang_praktik, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();

            // Mengambil domain
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Jika gk ketemu maka respon 404
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.update', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil bidang kapabilitas
            $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

            // Jika gk ketemu atau domainnya beda maka respon 404
            if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil bidang praktik
            $findBidangPraktik = $this->bidangPraktikQueryService->findBidangPraktikById(id: $id_bidang_praktik);

            // Jika gk ketemu atau bidang kapabilitasnya beda maka respon 404
            if (! isset($findBidangPraktik) || $findBidangPraktik->bidang_kapabilitas_id !== $findBidangKapabilitas->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Bidang Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil praktik
            $praktik = $this->praktikQueryService->findPraktikById(id: $id);

            // Jika gk ketemu atau bidang praktiknya beda maka respon 404
            if (! isset($praktik) || $praktik->bidang_praktik_id !== $findBidangPraktik->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Memperbarui praktik
            $this->praktikCommandService->updatePraktik(request: $request, praktik: $praktik);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas, 'id_bidang_praktik' => $id_bidang_praktik])->with('success', trans('response.success.update', ['data' => 'Praktik']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas, 'id_bidang_praktik' => $id_bidang_praktik])->with('error', $th->getMessage());
        }
    }

    public function delete(Request $request, string $id_domain, string $id_bidang_kapabilitas, string $id_bidang_praktik, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Mengambil domain
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Jika gk ketemu maka respon 404
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.delete', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil bidang kapabilitas
            $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

            // Jika gk ketemu atau domainnya beda maka respon 404
            if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil bidang praktik
            $findBidangPraktik = $this->bidangPraktikQueryService->findBidangPraktikById(id: $id_bidang_praktik);

            // Jika gk ketemu atau bidang kapabilitasnya beda maka respon 404
            if (! isset($findBidangPraktik) || $findBidangPraktik->bidang_kapabilitas_id !== $findBidangKapabilitas->id) {
                throw new Exception(trans('response.error.delete', ['data' => 'Bidang Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil praktik
            $praktik = $this->praktikQueryService->findPraktikById(id: $id);

            // Jika gk ketemu atau bidang praktiknya beda maka respon 404
            if (! isset($praktik) || $praktik->bidang_praktik_id !== $findBidangPraktik->id) {
                throw new Exception(trans('response.error.delete', ['data' => 'Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Cek apakah bidang praktik masih digunakan di pertanyaan
            if ($praktik->questionAnswerPraktik->count() > 0) {
                throw new Exception(trans('response.error.delete', ['data' => 'Praktik', 'error' => 'praktik masih digunakan pada Daftar Penilaian']));
            }

            // Cek apakah praktik masih aktif
            if ($praktik->is_active) {
                throw new Exception(trans('response.error.delete', ['data' => 'Praktik', 'error' => 'praktik masih aktif']));
            }

            // Menghapus praktik
            $this->praktikCommandService->deletePraktik(praktik: $praktik);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas, 'id_bidang_praktik' => $id_bidang_praktik])->with('success', trans('response.success.delete', ['data' => 'Praktik']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas, 'id_bidang_praktik' => $id_bidang_praktik])->with('error', $th->getMessage());
        }
    }

    public function setStatus(Request $request, string $id_domain, string $id_bidang_kapabilitas, string $id_bidang_praktik, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Mengambil domain
            $findDomain = $this->domainQueryService->findDomainById(id: $id_domain);

            // Jika gk ketemu maka respon 404
            if (! isset($findDomain)) {
                throw new Exception(trans('response.error.store', ['data' => 'Domain', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil bidang kapabilitas
            $findBidangKapabilitas = $this->bidangKapabilitasQueryService->findBidangKapabilitasById(id: $id_bidang_kapabilitas);

            // Jika gk ketemu atau domainnya beda maka respon 404
            if (! isset($findBidangKapabilitas) || $findBidangKapabilitas->domain_id !== $findDomain->id) {
                throw new Exception(trans('response.error.store', ['data' => 'Bidang Kapabilitas', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil bidang praktik
            $findBidangPraktik = $this->bidangPraktikQueryService->findBidangPraktikById(id: $id_bidang_praktik);

            // Jika gk ketemu atau bidang kapabilitasnya beda maka respon 404
            if (! isset($findBidangPraktik) || $findBidangPraktik->bidang_kapabilitas_id !== $findBidangKapabilitas->id) {
                throw new Exception(trans('response.error.store', ['data' => 'Bidang Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Mengambil praktik
            $praktik = $this->praktikQueryService->findPraktikById(id: $id);

            // Jika gk ketemu atau bidang praktiknya beda maka respon 404
            if (! isset($praktik) || $praktik->bidang_praktik_id !== $findBidangPraktik->id) {
                throw new Exception(trans('response.error.update', ['data' => 'Praktik', 'error' => 'data tidak ditemukan']));
            }

            // Mengubah status praktik
            $this->praktikCommandService->setStatus(praktik: $praktik);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas, 'id_bidang_praktik' => $id_bidang_praktik])->with('success', trans('response.success.switch', ['data' => 'Perubahan status praktik']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.index', ['id_domain' => $id_domain, 'id_bidang_kapabilitas' => $id_bidang_kapabilitas, 'id_bidang_praktik' => $id_bidang_praktik])->with('error', $th->getMessage());
        }
    }
}
