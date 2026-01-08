<div class="faq-section pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-12">
                <div class="faq-content-wrap mb-80">
                    <div class="faq-content">
                        <div class="accordion" id="accordionFaqs">

                            @forelse($faqs as $key => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faqHeading{{ $key }}">
                                        <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#faqCollapse{{ $key }}" 
                                                aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" 
                                                aria-controls="faqCollapse{{ $key }}">
                                            {{ sprintf('%02d', $key+1) }}. {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="faqCollapse{{ $key }}" 
                                         class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" 
                                         aria-labelledby="faqHeading{{ $key }}" 
                                         data-bs-parent="#accordionFaqs">
                                        <div class="accordion-body">
                                            {!! nl2br(e($faq->answer)) !!}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-muted">
                                    No FAQs available at the moment.
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

