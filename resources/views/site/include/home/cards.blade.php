<div class="home2-blog-section mb-120">
    <div class="container">
        @if($ads->count())
            <div class="row mb-50">
                <div class="row g-lg-4 gy-5">

                    @foreach($ads as $ad)
                        <div class="{{ $ads->count() == 1 ? 'col-lg-12' : 'col-lg-6' }}">
                            <a 
                                href="{{ $ad->url ?? 'javascript:void(0)' }}"
                                class="special-card-img"
                                {{ $ad->url ? 'target=_blank' : '' }}
                            >
                                <img 
                                    src="{{ asset($ad->image) }}" 
                                    class="w-100 rounded"
                                    alt="Advertisement"
                                    style="object-fit: cover;"
                                >
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif

        <div class="row mb-50">
            <div class="row g-lg-4 gy-5">
                <div class="section-title2 text-center">
                        <div class="eg-section-tag">
                            <span style="color: var(--primary-color1);">How to Apply</span>
                        </div>
                    </div>
                <div class="col-lg-12">
                    <a href="#" class="process-card-img"><img src="{{asset('assets/img/cards/3.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>