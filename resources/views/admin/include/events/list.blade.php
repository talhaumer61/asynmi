<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Events</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/portal/dashboard">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('admin/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Events</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="list-product-header mb-3">
                            <a class="btn btn-primary" href="/portal/events/add">
                                <i class="fa fa-plus"></i> Add Event
                            </a>
                        </div>

                        <div class="list-product">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="45%">Event</th>
                                        <th width="10%">Date & Time</th>
                                        <th width="25%">Location</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $event)
                                        <tr>
                                            <td class="d-flex align-items-center gap-3">
                                                @if($event->image)
                                                    <img src="{{ asset($event->image) }}"
                                                         class="rounded"
                                                         width="60"
                                                         style="border:2px solid #000;">
                                                @endif
                                                <div>
                                                    <strong>{{ $event->name }}</strong><br>
                                                    <small class="text-muted">
                                                        {{ $event->institution }}
                                                    </small>
                                                </div>
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}<br>
                                                <small class="text-muted">
                                                    {{ $event->start_time }} - {{ $event->end_time }}
                                                </small>
                                            </td>

                                            <td>{{ $event->location }}</td>

                                            <td>{!! get_status($event->status) !!}</td>

                                            <td>
                                                <div class="product-action d-flex gap-2">
                                                    <a href="{{ url('/portal/events/edit/'.$event->id) }}"
                                                       class="action-btn edit-btn"
                                                       title="Edit">
                                                        <svg>
                                                            <use href="{{ asset('admin/svg/icon-sprite.svg#edit-content') }}"></use>
                                                        </svg>
                                                    </a>

                                                    <form action="{{ route('admin.events.delete', $event->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Delete this event?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="action-btn delete-btn border-0">
                                                            <svg>
                                                                <use href="{{ asset('admin/svg/icon-sprite.svg#trash1') }}"></use>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                <strong>No events found</strong>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
