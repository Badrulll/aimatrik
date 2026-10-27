<section class="aim-domain-section" id="domain-utama">
    <div class="container">
        <div class="aim-domain-intro aim-reveal">
            <span class="aim-section-kicker"><i></i> FRAMEWORK COMPONENTS / 01</span>
            <h2>5 Domain Utama dalam Model <span>AIMATRIK.</span></h2>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-6 aim-reveal-left">
                <div class="aim-domain-image">
                    <div class="aim-domain-image-label">
                        <span>MODEL ARCHITECTURE</span>
                        <span>FIG. 01</span>
                    </div>
                    <img
                        src="{{ asset('guest-assets/images/bg/domain-data.png') }}"
                        alt="Diagram lima domain utama model tata kelola AI"
                        loading="lazy"
                    >
                    <div class="aim-domain-image-footer">
                        AI GOVERNANCE FRAMEWORK
                    </div>
                </div>
            </div>

            <div class="col-lg-6 aim-reveal-right">
                <div class="aim-domain-list-heading">
                    <span>DOMAIN DIRECTORY</span>
                    <span>01 — 05</span>
                </div>

                <div class="accordion aim-domain-accordion" id="accordionExample">
                    @include('guest.pages.home.collapse._one_collapse')
                    @include('guest.pages.home.collapse._two_collapse')
                    @include('guest.pages.home.collapse._three_collapse')
                    @include('guest.pages.home.collapse._four_collapse')
                    @include('guest.pages.home.collapse._five_collapse')
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .aim-domain-section {
        --aim-red: #ed1b2f;
        padding: 100px 0;
        color: #f7f8fa;
        background: #11161c;
        overflow: hidden;
    }

    .aim-domain-intro {
        max-width: 780px;
        margin-bottom: 48px;
    }

    .aim-section-kicker {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        color: #929ba5;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .15em;
    }

    .aim-section-kicker i {
        width: 7px;
        height: 7px;
        background: var(--aim-red);
        border-radius: 50%;
    }

    .aim-domain-intro h2 {
        margin: 0;
        font-size: clamp(32px, 5vw, 60px);
        font-weight: 800;
        line-height: 1.08;
        letter-spacing: -.055em;
    }

    .aim-domain-intro h2 span {
        color: var(--aim-red);
    }

    .aim-domain-image {
        padding: 18px;
        background: #f7f8fa;
        border: 1px solid rgba(255,255,255,.12);
        box-shadow: 0 25px 70px rgba(0,0,0,.2);
    }

    .aim-domain-image-label,
    .aim-domain-image-footer,
    .aim-domain-list-heading {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        color: #89929d;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .12em;
    }

    .aim-domain-image-label {
        padding: 0 0 15px;
    }

    .aim-domain-image img {
        display: block;
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    .aim-domain-image-footer {
        padding-top: 14px;
        margin-top: 12px;
        border-top: 1px solid #e1e4e8;
    }

    .aim-domain-list-heading {
        padding-bottom: 16px;
        color: #929ba5;
    }

    .aim-domain-accordion {
        border-top: 1px solid rgba(255,255,255,.16);
    }

    .aim-domain-accordion .accordion-item {
        color: #f7f8fa;
        background: transparent;
        border: 0;
        border-bottom: 1px solid rgba(255,255,255,.14);
    }

    .aim-domain-accordion .accordion-button {
        gap: 14px;
        padding: 22px 8px;
        color: #f7f8fa;
        background: transparent;
        box-shadow: none;
        font-size: 14px;
        font-weight: 600;
    }

    .aim-domain-accordion .accordion-button::after {
        filter: invert(1);
        opacity: .65;
    }

    .aim-domain-accordion .accordion-button:not(.collapsed) {
        color: var(--aim-red);
    }

    .aim-domain-accordion .accordion-button:not(.collapsed)::after {
        filter: none;
        opacity: 1;
    }

    .aim-domain-accordion .accordion-body {
        padding: 0 28px 24px 36px;
        color: #adb5be;
        font-size: 13px;
        line-height: 1.85;
    }

    .aim-domain-accordion .accordion-body p:last-child {
        margin-bottom: 0;
    }

    @media (max-width: 767px) {
        .aim-domain-section {
            padding: 70px 0;
        }

        .aim-domain-intro {
            margin-bottom: 32px;
        }

        .aim-domain-image {
            padding: 12px;
        }

        .aim-domain-accordion .accordion-button {
            padding: 20px 4px;
            font-size: 13px;
        }
    }
</style>