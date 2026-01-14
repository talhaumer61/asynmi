<div class="page-body">
    <div class="container-fluid">

        {{-- Page Title + Breadcrumb --}}
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Header / Footer Elements</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/portal/dashboard') }}">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Header - Footer Elements</li>
                    </ol>
                </div>
            </div>
        </div>

        {{-- Action Button --}}
        <div class="row mb-3">
            <div class="col-md-12 text-end">
                {{-- @if($about)
                    <a href="{{ url('/portal/about-us/edit/'.$about->id) }}"
                    class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit About Us
                    </a>
                @else
                    <a href="{{ url('/portal/about-us/add') }}"
                    class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add About Us
                    </a>
                @endif --}}
            </div>
        </div>

        {{-- Listing Card --}}
        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.header_footer.update') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- HEADER --}}
                        <div class="col-md-6">
                            <h5 class="mb-3">Header Menu</h5>

                            @foreach($headerElements as $item)
                                <div class="form-check mb-2">
                                    <input class="form-check-input"
                                        type="checkbox"
                                        name="visible[]"
                                        value="{{ $item->id }}"
                                        id="header_{{ $item->id }}"
                                        {{ $item->is_visible ? 'checked' : '' }}>

                                    <label class="form-check-label fw-semibold"
                                        for="header_{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        {{-- FOOTER --}}
                        <div class="col-md-6">
                            <h5 class="mb-3">Footer Menu</h5>

                            @foreach($footerElements as $item)
                                <div class="form-check mb-2">
                                    <input class="form-check-input"
                                        type="checkbox"
                                        name="visible[]"
                                        value="{{ $item->id }}"
                                        id="footer_{{ $item->id }}"
                                        {{ $item->is_visible ? 'checked' : '' }}>

                                    <label class="form-check-label fw-semibold"
                                        for="footer_{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Save Changes
                        </button>
                    </div>

                </form>

            </div>
        </div>


    </div>
</div>
