    <div class="home2-about-section mb-120"> 
    <div class="container">
        <div class="activities-counter">
            <div class="row justify-content-center g-lg-4 gy-5">
                
                @if($homepageElement?->counters)
                    @foreach($homepageElement->counters as $counter)
                        <div class="col-lg-4 col-sm-6 divider d-flex justify-content-center">
                            <div class="single-activity">
                                <div class="icon">
                                    {{-- Display uploaded icon if it exists, otherwise a default icon --}}
                                    @if(!empty($counter['icon']))
                                        <img src="{{ asset($counter['icon']) }}" alt="{{ $counter['name'] }}" style="height: 50px; width: auto;">
                                    @else
                                        <i class="fa-solid fa-chart-line"></i>
                                    @endif
                                </div>
                                <div class="content">
                                    <div class="number">
                                        <h5>{{ $counter['value'] }}</h5>
                                        {{-- You can append '+' here or include it in the 'value' input field --}}
                                    </div>
                                    <h4>{{ $counter['name'] }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>