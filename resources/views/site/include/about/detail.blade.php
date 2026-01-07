<style>
    /* ABOUT IMAGE */
    .about-image-box img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 18px;
        box-shadow: 0 20px 45px rgba(0,0,0,0.15);
    }

    /* ABOUT TEXT */
    .about-text-box p {
        font-size: 17px;
        line-height: 1.8;
        color: #555;
    }

    /* FEATURE CARDS */
    .about-feature-card {
        position: relative;
        background: #fff;
        padding: 40px 30px;
        border-radius: 18px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
    }

    .about-feature-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 25px 55px rgba(0,0,0,0.15);
    }

    .about-feature-card .icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: rgba(0,123,255,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 20px;
    }

    .about-feature-card h4 {
        font-weight: 600;
        margin-bottom: 15px;
    }

    .about-feature-card p {
        font-size: 16px;
        line-height: 1.7;
        color: #555;
    }

    /* DIFFERENT ACCENTS */
    .about-feature-card.mission .icon {
        background: rgba(40,167,69,0.12);
    }

    .about-feature-card.vision .icon {
        background: rgba(255,193,7,0.15);
    }

</style>
@if($about)
<div class="about-us-section pt-120 mb-120">
    <div class="container">

        {{-- SECTION HEADER --}}
        <div class="row mb-70">
            <div class="col-lg-12 text-center">
                <div class="section-title2">
                    <div class="eg-section-tag">
                        <span style="color: var(--primary-color1);">Who We Are</span>
                    </div>
                    <h2>About Us</h2>
                </div>
            </div>
        </div>

        {{-- ABOUT CONTENT + IMAGE --}}
        <div class="row align-items-center mb-80">

            @if($about->image)
                <div class="col-lg-6 mb-30">
                    <div class="about-image-box">
                        <img src="{{ asset($about->image) }}" alt="About Us">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-text-box">
                        {!! $about->about !!}
                    </div>
                </div>
            @else
                <div class="col-lg-10 mx-auto text-center">
                    <div class="about-text-box">
                        {!! $about->about !!}
                    </div>
                </div>
            @endif

        </div>

        {{-- MISSION & VISION --}}
        <div class="row g-4">
            @if($about->mission)
            <div class="col-lg-6">
                <div class="about-feature-card mission">
                    <div class="icon">🎯</div>
                    <h4>Our Mission</h4>
                    <p>{!! $about->mission !!}</p>
                </div>
            </div>
            @endif

            @if($about->vision)
            <div class="col-lg-6">
                <div class="about-feature-card vision">
                    <div class="icon">🌍</div>
                    <h4>Our Vision</h4>
                    <p>{!! $about->vision !!}</p>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
@endif
