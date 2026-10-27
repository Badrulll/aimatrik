
<section class="aim-vision py-5" id="visi">
    <div class="container py-lg-5">
        <div class="aim-vision-meta aim-reveal">
            <span>01</span>
            <span class="aim-line"></span>
            <span>AIMATRIK / VISION</span>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-6 aim-reveal">
                <span class="aim-eyebrow">ARAH DAN TUJUAN</span>
                <h2 class="aim-vision-title">
                    VISI<br>
                    <span>KAMI<span class="aim-red">.</span></span>
                </h2>
            </div>

            <div class="col-lg-6 aim-reveal">
                <article class="aim-vision-card">
                    <div class="aim-card-icon">↗</div>
                    <span class="aim-card-label">OUR VISION</span>
                    <p>
                        Mewujudkan tata kelola AI di pendidikan tinggi yang unggul,
                        inklusif, adaptif, dan berstandar global, demi menciptakan
                        ekosistem pembelajaran dan penelitian yang inovatif.
                    </p>
                    <div class="aim-card-footer">
                        <span>AIMATRIK</span>
                        <span class="aim-status"><i></i> VISION STATEMENT</span>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<style>
    .aim-vision {
        --aim-red: #ed1b2f;
        position: relative;
        overflow: hidden;
        background: #f7f8fa;
        color: #161b21;
    }

    .aim-vision::before {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        opacity: .35;
        background-image:
            linear-gradient(#dfe3e8 1px, transparent 1px),
            linear-gradient(90deg, #dfe3e8 1px, transparent 1px);
        background-size: 48px 48px;
        mask-image: linear-gradient(90deg, #000, transparent 85%);
    }

    .aim-vision .container {
        position: relative;
    }

    .aim-vision-meta {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 55px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .16em;
    }

    .aim-vision-meta > span:first-child {
        color: var(--aim-red);
        font-size: 14px;
    }

    .aim-line {
        width: 38px;
        height: 1px;
        background: var(--aim-red);
    }

    .aim-vision-meta > span:last-child {
        color: #7d858e;
    }

    .aim-eyebrow {
        color: #747d87;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .18em;
    }

    .aim-vision-title {
        margin: 22px 0 0;
        font-size: clamp(68px, 10vw, 140px);
        font-weight: 800;
        letter-spacing: -.085em;
        line-height: .82;
    }

    .aim-vision-title span {
        display: inline-block;
    }

    .aim-red {
        color: var(--aim-red);
    }

    .aim-vision-card {
        padding: clamp(26px, 4vw, 48px);
        background: #fff;
        border: 1px solid #e7e9ed;
        box-shadow: 0 24px 70px rgba(17, 22, 28, .055);
    }

    .aim-card-icon {
        display: grid;
        place-items: center;
        width: 44px;
        height: 44px;
        margin-bottom: 35px;
        color: #fff;
        background: var(--aim-red);
        font-size: 22px;
    }

    .aim-card-label {
        color: #89919b;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .17em;
    }

    .aim-vision-card p {
        margin: 18px 0 35px;
        color: #343c45;
        font-size: clamp(17px, 2vw, 22px);
        line-height: 1.8;
    }

    .aim-card-footer {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 12px;
        padding-top: 18px;
        border-top: 1px solid #e9ebee;
        color: #89919b;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .1em;
    }

    .aim-status {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .aim-status i {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--aim-red);
    }

    @media (max-width: 575px) {
        .aim-vision-meta {
            margin-bottom: 38px;
        }

        .aim-vision-title {
            font-size: clamp(66px, 18vw, 100px);
        }
    }
</style>
