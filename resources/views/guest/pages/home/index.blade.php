@extends('guest.layouts.app')

@section('title', 'Home')

@section('customCss')
    <style>
        .blog-img {
            width: 100%;
            /* Ikuti parent */
            height: 200px;
            /* Tetap kunci tingginya */
            overflow: hidden;
            /* Sembunyikan gambar yang lebih */
            position: relative;
        }

        .blog-img img {
            width: 100%;
            /* Isi penuh secara lebar */
            height: 100%;
            /* Isi penuh secara tinggi */
            object-fit: cover;
            /* Crop gambar supaya tetap proporsional */
        }
    </style>
@endsection

@section('customJs')
    <script>
        $(document).ready(function() {
            var maxHeight = 0;

            // Menentukan tinggi maksimum
            $('.service-box-dynamic').each(function() {
                var thisHeight = $(this).outerHeight();
                if (thisHeight > maxHeight) {
                    maxHeight = thisHeight;
                }
            });

            // Menetapkan tinggi maksimum ke semua elemen
            $('.service-box-dynamic').each(function() {
                $(this).outerHeight(maxHeight);
            });
        });
    </script>
@endsection

@section('body')
    {{-- Welcome Section --}}
    @include('guest.pages.home._welcome_section')

    {{-- Visi --}}
    @include('guest.pages.home._visi_section')

    {{-- About --}}
    @include('guest.pages.home._about_section')

    {{-- Main Content --}}
    @include('guest.pages.home._main_section')
@endsection
