<section class="industries-area bg_color_black pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div id="struktur">
                    <div class="section-title text-center">
                        <h2 class="title text_color_white d-inline-block text-anim">Struktur Model GOVAIHEI
                        </h2>
                        <p class="desc text_color_light_white">Model ini mengadopsi struktur hirarkis dari
                            model
                            CMMI, di mana struktur tersebut disesuaikan sebagai berikut
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Domain Utama --}}
@include('guest.pages.home.sub._sub_domain_utama')

{{-- Tingkatan Level --}}
@include('guest.pages.home.sub._sub_tingkatan_level')

{{-- Sub Tingkatan --}}
@include('guest.pages.home.sub._sub_tingkat_praktik')

{{-- Profile --}}
@include('guest.pages.home.sub._sub_profile')

{{-- Footer --}}
@include('guest.pages.home.sub._sub_footer')
