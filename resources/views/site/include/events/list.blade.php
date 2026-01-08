<div class="events-section pt-120 mb-120">
    <div class="container">
        <div class="row g-md-4 gy-5">

            @forelse($events as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="event-card h-100 shadow-sm rounded overflow-hidden">
                        
                        <div class="event-card-img position-relative">
                            <a href="{{ route('events.detail', $event->href) }}">
                                <img src="{{ asset($event->image ?? 'assets/img/placeholder.jpg') }}"
                                     class="w-100"
                                     style="height:260px; object-fit:cover;"
                                     alt="{{ $event->name }}">
                                <span class="badge position-absolute top-0 start-0 m-2" style="background-color:var(--primary-color1);">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                                </span>
                            </a>
                        </div>

                        <div class="event-card-content text-center mt-3 px-3 pb-3">
                            <h5 class="fw-bold">
                                <a href="{{ route('events.detail', $event->href) }}" style="color:var(--primary-color1);">
                                    {{ $event->name }}
                                </a>
                            </h5>

                            <p class="text-muted small mb-2">
                                {{ $event->institution ?? 'Independent Event' }}
                            </p>

                            <a href="{{ route('events.detail', $event->href) }}"
                               class="btn primary-btn1 btn-sm px-3 py-2">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    No events found.
                </div>
            @endforelse

        </div>
    </div>
</div>
