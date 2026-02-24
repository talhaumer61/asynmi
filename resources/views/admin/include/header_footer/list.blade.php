<style>
    /* Custom subtle styling */
    .border-dashed { border-style: dashed !important; }
    .table-hover tbody tr:hover { background-color: rgba(0,0,0,.02); }
    .card { border-radius: 10px; border: none; }
    .card-header { border-bottom: 1px solid #eee; border-radius: 10px 10px 0 0 !important; }
    .form-switch .form-check-input { width: 2.5em; cursor: pointer; }
</style>
<div class="page-body">
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Header & Footer Management</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/portal/dashboard') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Navigation Elements</li>
                    </ol>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.header_footer.update') }}" method="POST">
            @csrf
            <div class="row">
                
                {{-- LEFT COLUMN: HEADER ELEMENTS --}}
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fa fa-window-maximize me-2 text-primary"></i>Header Menu</h5>
                            <small class="text-muted">Manage links appearing in the top navigation bar.</small>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="50%" class="text-center">Visible</th>
                                            <th width="50%">Link Name</th>
                                            {{-- <th style="width: 100px;">Order</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($headerElements as $item)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check form-switch d-inline-block">
                                                    <input class="form-check-input" type="checkbox" name="visible[]" value="{{ $item->id }}" {{ $item->is_visible ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="fw-medium text-dark">{{ $item->name }}</span>
                                            </td>
                                            {{-- <td>
                                                <input type="number" name="sort_order[{{ $item->id }}]" value="{{ $item->sort_order }}" class="form-control form-control-sm border-dashed">
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN: FOOTER LINKS --}}
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fa fa-list me-2 text-success"></i>Footer Links</h5>
                            <small class="text-muted">Manage links appearing in the website footer.</small>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 80px;">Visible</th>
                                            <th>Link Name</th>
                                            <th style="width: 100px;">Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($footerElements as $item)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check form-switch d-inline-block">
                                                    <input class="form-check-input" type="checkbox" name="visible[]" value="{{ $item->id }}" {{ $item->is_visible ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="fw-medium text-dark">{{ $item->name }}</span>
                                            </td>
                                            <td>
                                                <input type="number" name="sort_order[{{ $item->id }}]" value="{{ $item->sort_order }}" class="form-control form-control-sm border-dashed">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Floating Save Button Bar --}}
            <div class="row mt-4">
                <div class="col-12">
                        <div class="d-flex justify-content-center align-items-center py-3">
                            {{-- <span class="text-muted small italic text-uppercase">
                                <i class="fa fa-info-circle me-1"></i> Changes will take effect immediately upon saving.
                            </span> --}}
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                <i class="fa fa-save me-2"></i> Save Navigation Layout
                            </button>
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>

