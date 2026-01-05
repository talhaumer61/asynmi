<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit Event</h4>
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
                        <li class="breadcrumb-item">Events</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST"
                              action="{{ route('admin.events.update', $event->id) }}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Event Name</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ $event->name }}"
                                           required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ $event->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $event->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Institution</label>
                                    <input type="text"
                                           name="institution"
                                           class="form-control"
                                           value="{{ $event->institution }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Representative</label>
                                    <input type="text"
                                           name="representative"
                                           class="form-control"
                                           value="{{ $event->representative }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Date</label>
                                    <input type="date"
                                           name="event_date"
                                           class="form-control"
                                           value="{{ $event->event_date }}"
                                           required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Start Time</label>
                                    <input type="time"
                                           name="start_time"
                                           class="form-control"
                                           value="{{ $event->start_time }}"
                                           required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>End Time</label>
                                    <input type="time"
                                           name="end_time"
                                           class="form-control"
                                           value="{{ $event->end_time }}"
                                           required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Location</label>
                                    <input type="text"
                                           name="location"
                                           class="form-control"
                                           value="{{ $event->location }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Contact Person</label>
                                    <input type="text"
                                           name="contact_person"
                                           class="form-control"
                                           value="{{ $event->contact_person }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Contact Number</label>
                                    <input type="text"
                                           name="contact_number"
                                           class="form-control"
                                           value="{{ $event->contact_number }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Overview</label>
                                <textarea name="overview"
                                          class="form-control">{{ $event->overview }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Detail</label>
                                <textarea name="detail"
                                          id="ckeditor"
                                          class="form-control">{{ $event->detail }}</textarea>
                            </div>

                            <div class="row">
                                <label>Image</label>
                                <div class="col">
                                    <div class="fake-dropzone text-center mb-3">

                                        @if($event->image)
                                            <img src="{{ asset($event->image) }}"
                                                 class="img-fluid rounded mb-2"
                                                 style="max-height:150px;">
                                        @endif

                                        <i class="bx bxs-cloud-upload"></i>
                                        <h6>Upload Event Image</h6>
                                        <input type="file"
                                               class="form-control mt-3"
                                               name="image"
                                               accept=".jpg,.jpeg,.png,.svg">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary">Update Event</button>
                            <a href="{{ route('admin.events') }}" class="btn btn-danger">Cancel</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
