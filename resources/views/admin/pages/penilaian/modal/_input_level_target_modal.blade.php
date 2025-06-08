<div class="modal fade text-left" id="modalInputLevelTarget" tabindex="-1" role="dialog"
    aria-labelledby="modalInputLevelTarget" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="modalInputLevelTarget">
                    <h5>
                        Input Level Target
                    </h5>
                    <small class="text-danger text-sm">* Wajib diisi</small>
                </div>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body overflow-auto rute-modal">
                <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-lg-8 col-12" style="height: 500px; overflow-y: scroll">
                            <table class="table-responsive table table-striped" id="table-level-target-modal">
                                <thead class="bg-primary">
                                    <tr class="text-white">
                                        <th>Level</th>
                                        <th>Nama Level</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="bg-primary text-white">0</td>
                                        <td>Tidak Lengkap</td>
                                        <td>Praktik tata kelola AI yang diterapkan masih belum menyeluruh, sehingga
                                            belum mampu mencapai tujuan pada bidang praktik yang terkait.</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white">1</td>
                                        <td>Awal (Initial) </td>
                                        <td>Praktik dasar dalam tata kelola AI mulai diterapkan, tetapi belum sepenuhnya
                                            memenuhi tujuan di bidang praktik yang berkaitan.</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white">2</td>
                                        <td>Dikelola (Managed)</td>
                                        <td>Praktik tata kelola AI sudah dikelola dengan baik untuk mendukung pencapaian
                                            tujuan secara menyeluruh di bidang praktik terkait.</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white">3</td>
                                        <td>Didefinisikan
                                            (Defined)
                                        </td>
                                        <td>Praktik yang diterapkan memiliki definisi yang jelas dan mengikuti standar
                                            institusi pendidikan tinggi, sehingga dapat memenuhi tujuan tata kelola AI
                                            pada bidang praktik yang relevan</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white">4</td>
                                        <td>Dikelola Secara Kuantitatif (Quantitatively Managed)
                                        </td>
                                        <td>Praktik tata kelola AI diukur secara kuantitatif, memungkinkan evaluasi
                                            berbasis data untuk mencapai tujuan pada bidang praktik yang terkait.</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white">5</td>
                                        <td>Dioptimalkan (Optimizing)
                                        </td>
                                        <td>Praktik yang diterapkan secara berkelanjutan dioptimalkan berdasarkan hasil
                                            pengukuran kuantitatif untuk memastikan tercapainya tujuan tata kelola AI di
                                            bidang praktik yang berkaitan.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="id_level" value="" required>
                                    <div class="col-12 col-md-12">
                                        <label>Level Target<span class="text-danger"> *</span></label>
                                        <select class="form-control select2-level-target" name="select_level_target">
                                            <option value="">--
                                                Pilih Level Target --
                                            </option>
                                            @foreach (\App\Constants\AppConst::LEVEL_ARR as $itemLevel)
                                                <option value="{{ $itemLevel }}">Level -
                                                    {{ $itemLevel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="validateLevelTargetAndSubmit(this)"
                    data-id_modal="modalInputLevelTarget" class="btn btn-sm btn-primary me-1 mb-1">Simpan Level
                    Target</button>
            </div>
        </div>
    </div>
</div>
