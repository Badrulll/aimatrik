<script>
    $(document).ready(function() {
        const success = $(".berhasil").data("berhasil");
        if (success) {
            swal.fire({
                title: "Berhasil!",
                text: success,
                icon: "success",
            });
        }
    });

    $(document).ready(function() {
        const gagal = $(".gagal").data("gagal");
        if (gagal) {
            swal.fire({
                title: "Gagal!",
                text: gagal,
                icon: "error",
            });
        }
    });

    const alertGagal = (gagal) => {
        swal.fire({
            title: "Gagal!",
            text: gagal,
            icon: "error",
        });
    }

    const alertInfo = (info) => {
        swal.fire({
            title: "Informasi!",
            text: info,
            icon: "info",
        });
    }

    const alertSuccess = (success) => {
        swal.fire({
            title: "Berhasil!",
            text: success,
            icon: "success",
        });
    }

    const alertConfirm = (button) => {
        const id = $(button).data('id');
        swal.fire({
            title: "Apakah Yakin?",
            text: "Data akan dihapus permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus Data",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-' + id).submit();
            } else {
                swal.fire("Batal Dihapus",
                    "{{ trans('response.error.delete', ['data' => 'dipilih', 'error' => 'aksi dibatalkan user']) }}",
                    "success");
            }
        });
    }

    const changeStatus = (button) => {
        const id = $(button).data('id');
        swal.fire({
            title: "Apakah Yakin?",
            text: "Data akan diubah statusnya",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ubah Status",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $('#change-' + id).submit();
            } else {
                swal.fire("Batal Diubah",
                    "{{ trans('response.error.delete', ['data' => 'dipilih', 'error' => 'aksi dibatalkan user']) }}",
                    "success");
            }
        });
    }
</script>
