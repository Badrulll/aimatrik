<div class="modal fade text-left" id="modalPreviewFilePendukung" tabindex="-1" role="dialog"
    aria-labelledby="modalPreviewFilePendukung" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="modalPreviewFilePendukung">
                    <h5>
                        Preview File Pendukung
                    </h5>
                </div>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body overflow-auto rute-modal">
                <input type="hidden" name="id_target_file_pendukung" id="id_target_file_pendukung">
                <section id="preview-image-layout">

                </section>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="kosongkanFilePendukung(this)" id="btnKosongkanFilePendukung"
                    data-id_modal="modalPreviewFilePendukung" data-id_target="id_target_file_pendukung"
                    class="btn btn-sm btn-primary me-1 mb-1 d-none">Kosongkan File
                    Pendukung</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-secondary me-1 mb-1">Tutup</button>
            </div>
        </div>
    </div>
</div>
