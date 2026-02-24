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
                        {{-- SECTION 1: COLUMN ORDERING --}}
                        <div class="col-12 mb-4">
                            <div class="card bg-secondary">
                                <div class="card-body">
                                    <h5>Footer Column Ordering & Visibility</h5>
                                    <p class="text-muted small">Define the order of columns (1 comes first) and toggle entire sections.</p>
                                    <div class="row">
                                        @foreach($footerSections as $section)
                                        <div class="col-md-3 border-end">
                                            <label class="fw-bold">{{ $section->name }}</label>
                                            <input type="number" name="sort_order[{{ $section->id }}]" 
                                                value="{{ $section->sort_order }}" class="form-control mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="visible[]" 
                                                    value="{{ $section->id }}" id="sec_{{ $section->id }}"
                                                    {{ $section->is_visible ? 'checked' : '' }}>
                                                <label class="form-check-label" for="sec_{{ $section->id }}">Show Column</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SECTION 2: INDIVIDUAL LINKS --}}
                        <div class="col-md-6">
                            <h5>Header Menu</h5>
                            @foreach($headerElements as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="visible[]" value="{{ $item->id }}" {{ $item->is_visible ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-6">
                            <h5>Footer Links (Items inside the column)</h5>
                            @foreach($footerElements as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="visible[]" value="{{ $item->id }}" {{ $item->is_visible ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save Layout</button>
                </form>

            </div>
        </div>


    </div>
</div>
