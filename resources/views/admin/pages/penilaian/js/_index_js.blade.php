<script>
    const empty = (value) => {
        return (
            value === undefined ||
            value === null ||
            value === '' ||
            (Array.isArray(value) && value.length === 0)
        );
    };


    const NPLF_VAL = {
        N: {{ \App\Constants\AppConst::NPLF_VAL['N'] }},
        P: {{ \App\Constants\AppConst::NPLF_VAL['P'] }},
        L: {{ \App\Constants\AppConst::NPLF_VAL['L'] }},
        F: {{ \App\Constants\AppConst::NPLF_VAL['F'] }},
    };

    const NPLF_ARR = {
        N: "{{ \App\Constants\AppConst::NPLF_ARR['N'] }}",
        P: "{{ \App\Constants\AppConst::NPLF_ARR['P'] }}",
        L: "{{ \App\Constants\AppConst::NPLF_ARR['L'] }}",
        F: "{{ \App\Constants\AppConst::NPLF_ARR['F'] }}",
    };

    const NPLF_RANGE = {
        {{ \App\Constants\AppConst::NPLF_VAL['N'] }}: {
            min: {{ \App\Constants\AppConst::NPLF_MAKS_MIN[\App\Constants\AppConst::NPLF_VAL['N']]['min'] }},
            max: {{ \App\Constants\AppConst::NPLF_MAKS_MIN[\App\Constants\AppConst::NPLF_VAL['N']]['max'] }}
        },
        {{ \App\Constants\AppConst::NPLF_VAL['P'] }}: {
            min: {{ \App\Constants\AppConst::NPLF_MAKS_MIN[\App\Constants\AppConst::NPLF_VAL['P']]['min'] }},
            max: {{ \App\Constants\AppConst::NPLF_MAKS_MIN[\App\Constants\AppConst::NPLF_VAL['P']]['max'] }}
        },
        {{ \App\Constants\AppConst::NPLF_VAL['L'] }}: {
            min: {{ \App\Constants\AppConst::NPLF_MAKS_MIN[\App\Constants\AppConst::NPLF_VAL['L']]['min'] }},
            max: {{ \App\Constants\AppConst::NPLF_MAKS_MIN[\App\Constants\AppConst::NPLF_VAL['L']]['max'] }}
        },
        {{ \App\Constants\AppConst::NPLF_VAL['F'] }}: {
            min: {{ \App\Constants\AppConst::NPLF_MAKS_MIN[\App\Constants\AppConst::NPLF_VAL['F']]['min'] }},
            max: {{ \App\Constants\AppConst::NPLF_MAKS_MIN[\App\Constants\AppConst::NPLF_VAL['F']]['max'] }}
        }
    };

    $(document).ready(function() {
        $('.select2-nplf').select2({
            width: '100%',
            placeholder: '--Pilih Pelaksanaan --',
            allowClear: true,
        });
    });

    $(document).ready(function() {
        $('.select2-level-target').select2({
            width: '100%',
            placeholder: '--Pilih Level Target --',
            allowClear: true,
        });
    });

    const hitungNilaiLevel = (button) => {
        const data = $(button).data('info');

        const level = data.id_level;
        const first_level = data.id_first_level;
        const this_level = data.id_this_level;
        const next_level = data.id_next_level;
        const last_level = data.id_last_level;

        const id_level = `level-${level}-${this_level}`;
        let hitungRerata = hitungRerataByLevel(id_level);
        let rerata = hitungRerata.rerata;
        let jml_kosong = hitungRerata.totalEmpty;
        let jml_semua = hitungRerata.max;

        let persentase = hitungPersentase(rerata);

        cekDanShowHideLevel(rerata, jml_kosong, jml_semua, persentase, level, this_level, next_level, first_level,
            last_level);
    }

    const cekDataLevelKosong = (id_level) => {
        const selects = $(`#${id_level} select[name^='pelaksanaan']`);
        let adaYangKosong = false;
        let totalBukanF = 0;
        selects.each(function() {
            const val = $(this).val();
            if (!val || !(val in NPLF_VAL)) {
                adaYangKosong = true;
            }

            if (val !== 'F') {
                totalBukanF += 1;
            }
        });

        return {
            adaYangKosong,
            totalBukanF
        };
    }

    const hitungRerataByLevel = (id_level) => {
        const selects = $(`#${id_level} select[name^='pelaksanaan']`);
        let total = 0;
        let totalEmpty = 0;
        const max = selects.length;

        selects.each(function() {
            const valString = $(this).val();
            if (empty(valString)) {
                totalEmpty += 1;
            }
            const val = NPLF_VAL[valString] ?? 0;
            total += val;
        });

        rerata = max > 0 ? parseFloat((total / max).toFixed(2)) : 0;
        return {
            rerata,
            totalEmpty,
            max
        };
    };

    const getKategoriByNilai = (nilai) => {
        for (const [kode, range] of Object.entries(NPLF_RANGE)) {
            if (nilai >= range.min && nilai <= range.max) {
                return Object.keys(NPLF_VAL).find(key => NPLF_VAL[key] == kode);
            }
        }
        return null;
    }

    const hitungPersentase = (rerata) => {
        const nilai = (rerata * 100 / 3).toFixed(2);
        const nilaiDesimal = parseFloat(nilai);

        const kategori = getKategoriByNilai(nilai);

        return {
            nilai,
            kategori
        };
    }

    const cekDanShowHideNotif = (level, this_level, kategori, last_level) => {
        let showAlert = 'hide';
        const id_level = `level-${level}-${this_level}`;

        let checkData = cekDataLevelKosong(id_level);

        if (kategori !== 'F' && !checkData.adaYangKosong && checkData.totalBukanF == 1) {
            showAlert = 'show';
        }

        if (showAlert === "show") {
            if (last_level !== this_level) {
                alertInfo(
                    `Mohon maaf praktik di Level ${this_level} belum terpenuhi, sehingga tidak bisa dilanjutkan ke Level ${this_level + 1}.`
                )
            }
        }
    }

    const cekDanShowResult = (persentase, jml_kosong, jml_semua, level, this_level, last_level) => {
        const achivementScoreId = $(`#achivement-score-${level}-${this_level}`);
        const keteranganScoreId = $(`#keterangan-score-${level}-${this_level}`);
        const catatanScoreId = $(`#catatan-score-${level}-${this_level}`);

        achivementScoreId.empty();
        keteranganScoreId.empty();
        catatanScoreId.empty();

        if (parseFloat(persentase.nilai) > 0 || (parseFloat(persentase.nilai) == 0 && jml_kosong != jml_semua)) {
            achivementScoreId.append(persentase.nilai + '%');
            keteranganScoreId.append(NPLF_ARR[persentase.kategori]);
            if (persentase.kategori !== 'F') {
                if (this_level !== last_level) {
                    catatanScoreId.append('Tidak Bisa Lanjut Ke Level ' + (this_level + 1));
                }
            } else {
                if (this_level !== last_level) {
                    catatanScoreId.append('Bisa Lanjut Ke Level ' + (this_level + 1));
                }
            }
        }
    }

    const cekDanShowHideLevel = (rerata, jml_kosong, jml_semua, persentase, level, this_level, next_level, first_level,
        last_level) => {

        cekDanShowResult(persentase, jml_kosong, jml_semua, level, this_level, last_level);
        cekDanShowHideNotif(level, this_level, persentase.kategori, last_level);

        for (let i = next_level; i <= last_level; i++) {
            const id = `level-${level}-${i}`;
            const $element = $('#' + id);

            if ($element.length === 0) continue;
            const shouldHide = (persentase.kategori !== 'F') ? i >= next_level : i > next_level;

            if (shouldHide) {

                $element.addClass('d-none');

                $element.find('select').each(function() {
                    $(this).val(''); // kosongin data
                    // Kosongkan tampilan UI Select2
                    $(this).each(function() {
                        let container = $(this).data('select2').$container;
                        container.find('.select2-selection__rendered').html('&nbsp;');
                    });
                });

                $element.find('textarea').each(function() {
                    $(this).val('');
                });

                $element.find('input[type="file"]').each(function() {
                    $(this).val(null);
                });

            } else if (i === next_level && persentase.kategori === 'F') {
                $element.removeClass('d-none');
            }
        }
    };


    const simpanLevelTarget = (button) => {
        const id_level = $(button).data('id_level');
        const level_target = $(button).data('level_target');
        const modal = $('#modalInputLevelTarget')
        modal.find('input[name="id_level"]').val(id_level);
        if (level_target) {
            modal.find('select[name="select_level_target"]')
                .val(level_target)
                .trigger('change');
        } else {
            modal.find('select[name="select_level_target"]')
                .val(null)
                .trigger('change');
        }
        modal.modal('show');

    }

    const validateLevelTargetAndSubmit = (button) => {
        const idModal = $(button).data('id_modal');
        const modal = $('#' + idModal);
        const levelTarget = modal.find('select[name="select_level_target"]').val();
        const level = modal.find('input[name="id_level"]').val();

        const route =
            "{{ route('admin.daftar-penilaian.penilaian.storeLevelTarget', $findDaftarPenilaian->id) }}"
        $.ajax({
            url: route,
            method: 'POST',
            data: {
                level_target: levelTarget,
                level: level,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                modal.modal('hide');
                swal.fire({
                    title: "Berhasil!",
                    text: "Berhasil Mendefinisikan Level Target",
                    icon: "success",
                }).then(() => {
                    location.reload(); // Reload halaman setelah user menutup alert
                });
            },
            error: function(xhr) {
                console.error('Gagal mengambil file:', xhr.responseText);
                alertGagal('Terjadi kesalahan saat mengambil praktik.');
            }
        });

    }

    const kosongkanFilePendukung = (button) => {
        const idModal = $(button).data('id_modal');
        const modal = $('#' + idModal);
        const idTarget = modal.find('input[name="id_target_file_pendukung"]').val();
        const route =
            "{{ route('admin.daftar-penilaian.penilaian.deleteImagePenilaian', $findDaftarPenilaian->id) }}"
        $.ajax({
            url: route,
            method: 'POST',
            data: {
                idTarget: idTarget,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                modal.modal('hide');
                alertSuccess('File pendukung berhasil dikosongkan');
            },
            error: function(xhr) {
                console.error('Gagal mengambil file:', xhr.responseText);
                alertGagal('Terjadi kesalahan saat mengambil file pendukung.');
            }
        });
    }

    const previewFilePendukung = (button) => {
        const idTarget = $(button).data('id_target');
        const modal = $('#modalPreviewFilePendukung');
        const previewContainer = $('#preview-image-layout');
        const route =
            "{{ route('admin.daftar-penilaian.penilaian.loadImagePenilaian', $findDaftarPenilaian->id) }}";

        $.ajax({
            url: route,
            method: 'POST',
            data: {
                idTarget: idTarget,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                const data = response.data;
                let html = '';
                modal.find('input[name="id_target_file_pendukung"]').val(idTarget);

                if (data.length === 0) {
                    modal.find('#btnKosongkanFilePendukung').addClass('d-none');
                    html = `
                        <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                            <p class="text-center text-muted">Tidak Ada File Pendukung Untuk Praktik Ini</p>
                        </div>
                    `;
                } else {
                    modal.find('#btnKosongkanFilePendukung').removeClass('d-none');
                    html = '<div class="row">';
                    data.forEach(item => {
                        const path = item.asset_path;
                        const extension = path.split('.').pop().toLowerCase();

                        let filePreview = '';

                        if (['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'].includes(extension)) {
                            filePreview =
                                `<img src="${path}" class="img-fluid rounded-top" alt="${item.asset_alt ?? 'Preview'}">`;
                        } else if (extension === 'pdf') {
                            filePreview = `
                                <div class="text-center p-3">
                                    <i class="bi bi-file-earmark-pdf-fill text-danger" style="font-size: 3rem;"></i>
                                    <p><a href="${path}" target="_blank">Lihat PDF</a></p>
                                </div>
                        `;
                        } else {
                            filePreview = `
                                <div class="text-center p-3">
                                    <i class="bi bi-file-earmark-text-fill text-secondary" style="font-size: 3rem;"></i>
                                    <p><a href="${path}" target="_blank">Unduh File</a></p>
                                </div>
                        `;
                        }

                        html += `
                            <div class="col-md-3 mb-3">
                                <div class="card shadow-sm h-100">
                                    ${filePreview}
                                </div>
                            </div>
                        `;
                    });
                    html += '</div>';
                }

                previewContainer.html(html);
                modal.modal('show');
            },
            error: function(xhr) {
                console.error('Gagal mengambil file:', xhr.responseText);
                alertGagal('Terjadi kesalahan saat mengambil file pendukung.');
            }
        });
    }
</script>
