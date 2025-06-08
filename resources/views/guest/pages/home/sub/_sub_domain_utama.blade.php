<section class="data-area bg_color_black pb-120 overflow-hidden">
    <div class="container">
        <div class="row align-items-center justify-content-between gy-4">
            <!-- Left Column (Image) -->
            <div class="col-lg-6 col-xl-50">
                <div class="data-img-wrap position-relative z-index-one">
                    <img class="w-200" src="{{ asset('guest-assets/images/bg/domain-data.png') }}" alt="">
                </div>
            </div>

            <!-- Right Column (Text Content) -->
            <div class="col-lg-6 col-xl-6">
                <div class="data-info">
                    <h2 class="text_color_light_white">5 Domain Utama dalam Model GOVAIHEI</h2>

                    <!-- Accordion for Domain Content -->
                    <div class="accordion faq-wrap" id="accordionExample">

                        <!-- Domain 1: Data & Informasi -->
                        @include('guest.pages.home.collapse._one_collapse')

                        <!-- Domain 2: Teknologi dan Infrastruktur -->
                        @include('guest.pages.home.collapse._two_collapse')


                        <!-- Domain 3: Etika dan Sosial -->
                        @include('guest.pages.home.collapse._three_collapse')

                        <!-- Domain 4: Regulasi dan Kepatuhan -->
                        @include('guest.pages.home.collapse._four_collapse')

                        <!-- Domain 5: Regulasi dan Kepatuhan -->
                        @include('guest.pages.home.collapse._five_collapse')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
