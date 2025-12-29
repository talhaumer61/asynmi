<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit Country</h4>
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
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Countries</li>
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

                        <form method="POST"
                              action="{{ route('admin.countries.update', $country->id) }}"
                              enctype="multipart/form-data">
                            @csrf

                            {{-- ROW 1 --}}
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Name</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ $country->name }}"
                                           required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Country Code</label>
                                    <input type="text"
                                           name="country_code"
                                           class="form-control"
                                           value="{{ $country->country_code }}"
                                           placeholder="(USA, UK, AUS)">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ $country->status ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$country->status ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            {{-- ROW 2 --}}
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Currency</label>
                                    <input type="text"
                                           name="currency"
                                           class="form-control"
                                           value="{{ $country->currency }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Currency Code</label>
                                    <input type="text"
                                           name="currency_code"
                                           class="form-control"
                                           value="{{ $country->currency_code }}"
                                           placeholder="(USD, GBP, AUD)">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Currency Symbol</label>
                                    <input type="text"
                                           name="currency_symbol"
                                           class="form-control"
                                           value="{{ $country->currency_symbol }}"
                                           placeholder="($, £, A$)">
                                </div>
                            </div>

                            {{-- OVERVIEW --}}
                            <div class="mb-3">
                                <label>Overview</label>
                                <textarea name="overview"
                                          class="form-control"
                                          rows="3">{{ $country->overview }}</textarea>
                            </div>

                            {{-- DETAIL --}}
                            <div class="mb-3">
                                <label>Detail</label>
                                <textarea name="detail"
                                          class="form-control"
                                          id="ckeditor">{{ $country->detail }}</textarea>
                            </div>

                            {{-- IMAGE --}}
                            <div class="row">
                                <label>Image / Flag</label>
                                <div class="col">
                                    <div class="fake-dropzone text-center mb-3">
                                        @if($country->image)
                                            <img src="{{ asset($country->image) }}"
                                                 class="mb-3"
                                                 style="max-height:80px;">
                                        @endif

                                        <i class="bx bxs-cloud-upload"></i>
                                        <h6>Upload Country Image</h6>

                                        <input type="file"
                                               class="form-control mt-3"
                                               name="image"
                                               accept=".jpg,.jpeg,.png,.svg">
                                    </div>
                                </div>
                            </div>

                            {{-- ACTIONS --}}
                            <button class="btn btn-primary">Update Country</button>
                            <a href="{{ route('admin.countries') }}" class="btn btn-danger">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
