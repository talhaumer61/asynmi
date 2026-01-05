<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Add Event</h4>
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
                        <li class="breadcrumb-item active">Add</li>
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
                              action="{{ route('admin.events.store') }}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Event Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Institution</label>
                                    <input type="text" name="institution" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Representative</label>
                                    <input type="text" name="representative" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Date</label>
                                    <input type="date" name="event_date" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Start Time</label>
                                    <input type="time" name="start_time" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>End Time</label>
                                    <input type="time" name="end_time" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Contact Person</label>
                                    <input type="text" name="contact_person" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact_number" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Overview</label>
                                <textarea name="overview" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Detail</label>
                                <textarea name="detail" id="ckeditor" class="form-control"></textarea>
                            </div>

                            <div class="row">
                                <label>Image</label>
                                <div class="col">
                                    <div class="fake-dropzone text-center mb-3">
                                        <i class="bx bxs-cloud-upload"></i>
                                        <h6>Upload Event Image</h6>
                                        <input type="file" class="form-control mt-3" name="image" accept=".jpg,.jpeg,.png,.svg">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary">Save Event</button>
                            <a href="{{ route('admin.events') }}" class="btn btn-danger">Cancel</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
