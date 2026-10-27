<section class="aim-level-section" id="level">
    <div class="container">
        <div class="aim-level-heading aim-reveal">
            <span class="aim-section-kicker"><i></i> MATURITY FRAMEWORK ______ 04</span>
            <h2>Tingkatan Level Praktik <span>(Practice Levels)</span></h2>
            <p>Menjelaskan bagaimana kematangan AI dinilai di institusi.</p>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-4 aim-reveal">
                <article class="aim-level-card">
                    <div class="aim-level-top"><span>LEVEL</span><span>00</span></div>
                    <div class="aim-level-number">0<span>.</span></div>
                    <h3>Tidak Lengkap</h3>
                    <p>Praktik tata kelola AI yang diterapkan masih belum menyeluruh, sehingga belum mampu mencapai
                        tujuan pada bidang praktik yang terkait.</p>
                    <div class="aim-level-bottom"><span>MATURITY STAGE</span><i></i></div>
                </article>
            </div>

            <div class="col-md-6 col-lg-4 aim-reveal">
                <article class="aim-level-card">
                    <div class="aim-level-top"><span>LEVEL</span><span>01</span></div>
                    <div class="aim-level-number">1<span>.</span></div>
                    <h3>Awal <small>(Initial)</small></h3>
                    <p>Praktik dasar dalam tata kelola AI mulai diterapkan, tetapi belum sepenuhnya memenuhi tujuan di
                        bidang praktik yang berkaitan.</p>
                    <div class="aim-level-bottom"><span>MATURITY STAGE</span><i></i></div>
                </article>
            </div>

            <div class="col-md-6 col-lg-4 aim-reveal">
                <article class="aim-level-card">
                    <div class="aim-level-top"><span>LEVEL</span><span>02</span></div>
                    <div class="aim-level-number">2<span>.</span></div>
                    <h3>Dikelola <small>(Managed)</small></h3>
                    <p>Praktik tata kelola AI sudah dikelola dengan baik untuk mendukung pencapaian tujuan secara
                        menyeluruh di bidang praktik terkait.</p>
                    <div class="aim-level-bottom"><span>MATURITY STAGE</span><i></i></div>
                </article>
            </div>

            <div class="col-md-6 col-lg-4 aim-reveal">
                <article class="aim-level-card">
                    <div class="aim-level-top"><span>LEVEL</span><span>03</span></div>
                    <div class="aim-level-number">3<span>.</span></div>
                    <h3>Didefinisikan <small>(Defined)</small></h3>
                    <p>Praktik yang diterapkan memiliki definisi yang jelas dan mengikuti standar institusi pendidikan
                        tinggi, sehingga dapat memenuhi tujuan tata kelola AI pada bidang praktik yang relevan.</p>
                    <div class="aim-level-bottom"><span>MATURITY STAGE</span><i></i></div>
                </article>
            </div>

            <div class="col-md-6 col-lg-4 aim-reveal">
                <article class="aim-level-card">
                    <div class="aim-level-top"><span>LEVEL</span><span>04</span></div>
                    <div class="aim-level-number">4<span>.</span></div>
                    <h3>Dikelola Secara Kuantitatif</h3>
                    <p>Praktik tata kelola AI diukur secara kuantitatif, memungkinkan evaluasi berbasis data untuk
                        mencapai tujuan pada bidang praktik yang terkait.</p>
                    <div class="aim-level-bottom"><span>MATURITY STAGE</span><i></i></div>
                </article>
            </div>

            <div class="col-md-6 col-lg-4 aim-reveal">
                <article class="aim-level-card">
                    <div class="aim-level-top"><span>LEVEL</span><span>05</span></div>
                    <div class="aim-level-number">5<span>.</span></div>
                    <h3>Dioptimalkan <small>(Optimizing)</small></h3>
                    <p>Praktik yang diterapkan secara berkelanjutan dioptimalkan berdasarkan hasil pengukuran
                        kuantitatif untuk memastikan tercapainya tujuan tata kelola AI di bidang praktik yang berkaitan.
                    </p>
                    <div class="aim-level-bottom"><span>MATURITY STAGE</span><i></i></div>
                </article>
            </div>
        </div>
    </div>
</section>

<style>
    .aim-level-section {
        --aim-red: #ed1b2f;
        padding: 100px 0;
        background: #f7f8fa;
        color: #161b21;
    }

    .aim-level-heading {
        max-width: 750px;
        margin: 0 auto 45px;
        text-align: center;
    }

    .aim-level-section .aim-section-kicker {
        justify-content: center;
        color: #77808a;
    }

    .aim-level-heading h2 {
        margin: 0 0 15px;
        font-size: clamp(32px, 4.5vw, 54px);
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -.055em;
    }

    .aim-level-heading h2 span {
        color: var(--aim-red);
    }

    .aim-level-heading p {
        margin: 0;
        color: #727b85;
        font-size: 15px;
        line-height: 1.8;
    }

    .aim-level-card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 330px;
        height: 100%;
        padding: 25px;
        overflow: hidden;
        background: #fff;
        border: 1px solid #e4e7eb;
        box-shadow: 0 12px 35px rgba(17, 22, 28, .035);
        transition: transform .35s ease, border-color .35s ease, box-shadow .35s ease;
    }

    .aim-level-card::before {
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 3px;
        content: "";
        background: var(--aim-red);
        transition: width .4s ease;
    }

    .aim-level-card:hover,
    .aim-level-card-featured {
        border-color: rgba(237, 27, 47, .35);
    }

    .aim-level-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px rgba(17, 22, 28, .08);
    }

    .aim-level-card:hover::before,
    .aim-level-card-featured::before {
        width: 100%;
    }

    .aim-level-top,
    .aim-level-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .aim-level-top {
        color: #858e98;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .15em;
    }

    .aim-level-top span:last-child {
        color: var(--aim-red);
    }

    .aim-level-number {
        margin: 28px 0 10px;
        color: #161b21;
        font-family: 'Space Grotesk', sans-serif;
        font-size: 66px;
        font-weight: 700;
        letter-spacing: -.08em;
        line-height: 1;
    }

    .aim-level-number span {
        color: var(--aim-red);
    }

    .aim-level-card h3 {
        margin: 0 0 13px;
        font-size: 20px;
        font-weight: 700;
        line-height: 1.35;
        letter-spacing: -.035em;
    }

    .aim-level-card h3 small {
        display: block;
        margin-top: 4px;
        color: #7d858e;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0;
    }

    .aim-level-card p {
        margin: 0 0 25px;
        color: #69727d;
        font-size: 12px;
        line-height: 1.85;
    }

    .aim-level-bottom {
        gap: 10px;
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid #e9ebee;
        color: #8a929b;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .12em;
    }

    .aim-level-bottom i {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--aim-red);
    }

    @media (max-width: 767px) {
        .aim-level-section {
            padding: 70px 0;
        }

        .aim-level-card {
            min-height: 300px;
        }
    }
</style>
