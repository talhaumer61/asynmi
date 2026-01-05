<div class="destination-details-wrap mb-2 pt-5">
    <div class="container">
        <div class="row g-lg-4 gy-5">

            <div class="col-12">
                {{-- <h2>{{ $country->name }}</h2> --}}

                @if($country->overview)
                    <p>{!! $country->overview !!}</p>
                @endif

                <h4 class="mt-4">
                    Universities in {{ $country->name }}
                </h4>

                <p class="text-muted">
                    Total Universities: {{ $country->universities->count() }}
                </p>

            </div>

        </div>
    </div>
</div>

{{-- Universities in Country --}}
@if($country->universities->count())
<div class="package-grid-section mb-120">
    <div class="container">
        <div class="row gy-5 mb-70">

            @foreach($country->universities as $university)
                <div class="col-lg-4 col-md-6">
                    <div class="package-card">

                        <div class="package-card-img-wrap">
                            <a href="#">
                                <img src="{{ asset($university->image ?? 'assets/img/placeholder.jpg') }}"
                                     alt="{{ $university->name }}">
                            </a>
                        </div>

                        <div class="package-card-content">
                            <div class="card-content-top">
                                <h5 class="mb-1">
                                    {{ $university->name }}
                                </h5>

                                <p>
                                    {{ $university->city }},
                                    {{ $country->name }}
                                </p>

                                <div>
                                    <div class="d-flex justify-content-between">
                                        <span class="uni-points-head">
                                            <i class="fa-solid fa-medal"></i> Ranking
                                        </span>
                                        <span>{{ $university->ranking }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <span class="uni-points-head">
                                            <i class="fa-solid fa-sack-dollar"></i> Tuition Fee
                                        </span>
                                        <span>
                                            {{ $country->currency_symbol }}
                                            {{ $university->tuition_fee }}
                                        </span>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <span class="uni-points-head">
                                            <i class="fa-solid fa-file-export"></i> IELTS
                                        </span>
                                        <span>{{ $university->ielts_score }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <span class="uni-points-head">
                                            <i class="fa-solid fa-ticket"></i> Intakes
                                        </span>
                                        <span>{{ $university->intake_months }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-content-bottom justify-content-center">
                                <a href="{{ url('/contact') }}" class="primary-btn1 px-3 py-2">
                                    Apply Now
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endif
