
<section class="aim-about" id="mengapa">
    <div class="aim-about-grid"></div>

    <div class="container position-relative">
        <div class="aim-about-meta aim-reveal">
            <span>02</span>
            <span class="aim-about-line"></span>
            <span>AIMATRIK / OVERVIEW</span>
        </div>

        <div class="row align-items-end g-4 mb-5">
            <div class="col-lg-7 aim-reveal">
                <h2 class="aim-about-title">
                    Mengapa<br>
                    <span>AIMATRIK<span class="aim-about-red">.</span></span>
                </h2>
            </div>
            <div class="col-lg-5 aim-reveal">
                <p class="aim-about-intro">
                    Model AIMATRIK memungkinkan otomatisasi cerdas, analisis data
                    real-time, dan efisiensi kerja yang lebih tinggi. Solusi ini
                    mempercepat proses dan membantu pengambilan keputusan lebih akurat.
                </p>
            </div>
        </div>

        <div class="row g-0 aim-benefit-list">
            <div class="col-md-6 col-lg-3 aim-benefit aim-reveal">
                <article>
                    <div class="aim-benefit-top"><span>01</span><span>↗</span></div>
                    <span class="aim-benefit-label">GUIDANCE</span>
                    <h3>Panduan Penerapan AI</h3>
                    <p>Memberikan panduan menyeluruh untuk penerapan AI di pendidikan tinggi.</p>
                    <div class="aim-benefit-bottom">01 </div>
                </article>
            </div>

            <div class="col-md-6 col-lg-3 aim-benefit aim-reveal">
                <article>
                    <div class="aim-benefit-top"><span>02</span><span>↗</span></div>
                    <span class="aim-benefit-label">COMPLIANCE</span>
                    <h3>Kepatuhan dan Pengawasan</h3>
                    <p>Memastikan kepatuhan terhadap regulasi serta pengawasan berkelanjutan.</p>
                    <div class="aim-benefit-bottom">02 </div>
                </article>
            </div>

            <div class="col-md-6 col-lg-3 aim-benefit aim-reveal">
                <article>
                    <div class="aim-benefit-top"><span>03</span><span>↗</span></div>
                    <span class="aim-benefit-label">ETHICS</span>
                    <h3>Tata Kelola yang Etis</h3>
                    <p>Mendorong tata kelola berbasis data, teknologi, dan etika.</p>
                    <div class="aim-benefit-bottom">03 </div>
                </article>
            </div>

            <div class="col-md-6 col-lg-3 aim-benefit aim-reveal">
                <article>
                    <div class="aim-benefit-top"><span>04</span><span>↗</span></div>
                    <span class="aim-benefit-label">QUALITY</span>
                    <h3>Kualitas Pendidikan</h3>
                    <p>Meningkatkan kualitas pembelajaran dan manajemen akademik di pendidikan tinggi.</p>
                    <div class="aim-benefit-bottom">04 </div>
                </article>
            </div>
        </div>

        <a href="#struktur" class="aim-about-next aim-reveal">
            <span class="aim-about-next-link">Jelajahi Struktur Model <b>↓</b></span>
        </a>
    </div>
</section>

<style>
    .aim-about {
        --aim-red: #ed1b2f;
        position: relative;
        overflow: hidden;
        isolation: isolate;
        padding: 115px 0 85px;
        color: #fff;
        background: #11161c;
    }

    .aim-about-grid {
        position: absolute;
        z-index: -1;
        inset: 0;
        opacity: .22;
        pointer-events: none;
        background-image:
            linear-gradient(rgba(255,255,255,.055) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,.055) 1px, transparent 1px);
        background-size: 48px 48px;
        mask-image: linear-gradient(to bottom, transparent, #000 15%, #000 85%, transparent);
    }

    .aim-about-meta {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 35px;
        color: #8d96a0;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .16em;
    }

    .aim-about-meta > span:first-child {
        color: var(--aim-red);
        font-size: 14px;
    }

    .aim-about-line {
        width: 38px;
        height: 1px;
        background: var(--aim-red);
    }

    .aim-about-title {
        margin: 0;
        font-size: clamp(56px, 7.5vw, 108px);
        font-weight: 800;
        letter-spacing: -.075em;
        line-height: .94;
    }

    .aim-about-title > span {
        color: #f7f8fa;
    }

    .aim-about-red {
        color: var(--aim-red) !important;
    }

    .aim-about-intro {
        max-width: 440px;
        margin: 0 0 5px auto;
        padding-left: 22px;
        border-left: 2px solid var(--aim-red);
        color: #b2bac2;
        font-size: 14px;
        line-height: 1.9;
    }

    .aim-benefit-list {
        border-top: 1px solid rgba(255,255,255,.16);
        border-bottom: 1px solid rgba(255,255,255,.16);
    }

    .aim-benefit {
        border-right: 1px solid rgba(255,255,255,.12);
    }

    .aim-benefit:first-child {
        border-left: 1px solid rgba(255,255,255,.12);
    }

    .aim-benefit article {
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 325px;
        height: 100%;
        padding: 23px 21px 18px;
        transition: background .3s ease;
    }

    .aim-benefit article::before {
        position: absolute;
        top: -1px;
        left: 0;
        width: 0;
        height: 2px;
        content: "";
        background: var(--aim-red);
        transition: width .35s ease;
    }

    .aim-benefit article:hover {
        background: rgba(255,255,255,.045);
    }

    .aim-benefit article:hover::before {
        width: 100%;
    }

    .aim-benefit-top {
        display: flex;
        justify-content: space-between;
        margin-bottom: auto;
        color: var(--aim-red);
        font-size: 12px;
        font-weight: 700;
    }

    .aim-benefit-top span:last-child {
        display: grid;
        place-items: center;
        width: 30px;
        height: 30px;
        border: 1px solid rgba(255,255,255,.2);
        color: #c2c8ce;
        transition: .3s ease;
    }

    .aim-benefit article:hover .aim-benefit-top span:last-child {
        color: white;
        background: var(--aim-red);
        border-color: var(--aim-red);
    }

    .aim-benefit-label {
        margin: 30px 0 13px;
        color: #858e98;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .16em;
    }

    .aim-benefit h3 {
        margin: 0 0 12px;
        color: #f7f8fa;
        font-size: 20px;
        font-weight: 600;
        line-height: 1.4;
    }

    .aim-benefit p {
        margin: 0 0 25px;
        color: #a3abb4;
        font-size: 12px;
        line-height: 1.85;
    }

    .aim-benefit-bottom {
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid rgba(255,255,255,.1);
        color: #68727d;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .12em;
    }

    .aim-about-next {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-top: 35px;
        color: #8d96a0;
        text-decoration: none;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .1em;
    }

    .aim-about-next > span:first-child {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .aim-about-next i {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--aim-red);
    }

    .aim-about-next-link {
        display: flex;
        align-items: center;
        gap: 14px;
        color: #fff;
        font-size: 11px;
        letter-spacing: 0;
        transition: color .3s ease;
    }

    .aim-about-next-link b {
        display: grid;
        place-items: center;
        width: 32px;
        height: 32px;
        border: 1px solid rgba(237,27,47,.55);
        color: var(--aim-red);
        font-size: 17px;
        transition: .3s ease;
    }

    .aim-about-next:hover .aim-about-next-link {
        color: var(--aim-red);
    }

    .aim-about-next:hover .aim-about-next-link b {
        transform: translateY(3px);
        color: white;
        background: var(--aim-red);
    }

    @media (max-width: 991px) {
        .aim-about { padding: 90px 0 70px; }
        .aim-benefit:nth-child(3) { border-left: 1px solid rgba(255,255,255,.12); }
        .aim-benefit article { min-height: 290px; }
    }

    @media (max-width: 575px) {
        .aim-about { padding: 75px 0 55px; }
        .aim-about-title { font-size: clamp(52px, 14vw, 76px); }
        .aim-about-intro { margin-top: 12px; }
        .aim-benefit { border-left: 1px solid rgba(255,255,255,.12); }
        .aim-benefit article { min-height: 255px; padding: 22px; }
        .aim-about-next { align-items: flex-start; flex-direction: column; }
        .aim-about-next-link {
            width: 100%;
            justify-content: space-between;
            padding-top: 15px;
            border-top: 1px solid rgba(255,255,255,.15);
        }
    }
</style>
