{{-- Event Hero --}}
<section class="event-hero pt-120 pb-80">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- TEXT --}}
            <div class="col-lg-6">
                <h1 class="fw-bold mb-3">{{ $event->name }}</h1>

                @if($event->overview)
                    <p class="lead mb-3">{{ $event->overview }}</p>
                @endif

                <ul class="list-unstyled small text-muted">
                    <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</li>
                    <li><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</li>
                    <li><strong>Location:</strong> {{ $event->location ?? '-' }}</li>
                    <li><strong>Contact:</strong> {{ $event->contact_person ?? '-' }} {{ $event->contact_number ? '('.$event->contact_number.')' : '' }}</li>
                </ul>
            </div>

            {{-- IMAGE --}}
            <div class="col-lg-6 text-center">
                <img src="{{ asset($event->image ?? 'assets/img/placeholder.jpg') }}"
                     class="img-fluid rounded shadow"
                     style="max-height:420px; object-fit:cover;"
                     alt="{{ $event->name }}">
            </div>

        </div>
    </div>
</section>

{{-- Event Detail Content --}}
<section class="pb-120">
    <div class="container">
        <div class="row g-5">

            {{-- MAIN CONTENT --}}
            <div class="col-lg-8">
                <div class="event-detail-content mb-60">
                    {!! $event->detail !!}
                </div>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <div class="event-sidebar position-sticky" style="top:40px;">

                    {{-- REGISTER BOX --}}
                    <div class="p-4 mb-30 rounded shadow bg-white">
                        <h5 class="mb-3">Interested in this Event?</h5>
                        <p class="small text-muted">
                            Register now or contact our advisor for more info.
                        </p>

                        <a href="{{ url('/contact-us') }}" class="btn btn-primary w-100 mb-2">Register Now</a>
                        <a href="{{ $globalContactInfo->whatsapp ? 'https://wa.me/'.$globalContactInfo->whatsapp : 'javascript:void(0)' }}" class="btn btn-outline-success w-100">WhatsApp Advisor</a>
                    </div>

                    {{-- OTHER EVENTS --}}
                    @if($otherEvents->count())
                        <div class="p-4 rounded shadow-sm bg-light">
                            <h6 class="mb-3">Other Events</h6>

                            <ul class="list-unstyled">
                                @foreach($otherEvents as $item)
                                    <li class="mb-3 d-flex align-items-center">
                                        <img src="{{ asset($item->image ?? 'assets/img/placeholder.jpg') }}"
                                             width="60"
                                             height="60"
                                             class="rounded me-3"
                                             style="object-fit:cover;"
                                             alt="{{ $item->name }}">
                                        <div>
                                            <a href="{{ route('events.detail', $item->href) }}"
                                               class="fw-semibold d-block">
                                                {{ $item->name }}
                                            </a>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($item->event_date)->format('d M Y') }}</small>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>
