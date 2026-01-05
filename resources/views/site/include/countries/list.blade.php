<style>
    .country-card {
    position: relative;
    display: block;
    height: 280px;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,0.18);
    text-decoration: none;
}

/* Image */
.country-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

/* Gradient overlay */
.country-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,0.85),
        rgba(0,0,0,0.25),
        rgba(0,0,0,0.05)
    );
    transition: background 0.4s ease;
}

/* Country name */
.country-name {
    position: absolute;
    bottom: 24px;
    left: 50%;
    transform: translateX(-50%);
    color: #fff;
    font-size: 26px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.45s ease;
    z-index: 2;
    text-align: center;
    white-space: nowrap;
}

/* Hover effects */
.country-card:hover img {
    transform: scale(1.08);
}

.country-card:hover .country-name {
    top: 50%;
    bottom: auto;
    transform: translate(-50%, -50%);
    font-size: 30px;
}

.country-card:hover .country-overlay {
    background: linear-gradient(
        to top,
        rgba(0,0,0,0.85),
        rgba(0,0,0,0.85)
    );
}

</style>
<div class="destination-gallery-section pt-120 mb-120">
    <div class="container">
        <div class="row g-4">

            @foreach($countries as $country)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('/countries/' . $country->href) }}" class="country-card">
                        
                        <img src="{{ asset($country->image) }}"
                             alt="{{ $country->name }}">

                        <div class="country-overlay"></div>

                        <div class="country-name">
                            {{ $country->name }}
                        </div>

                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>

