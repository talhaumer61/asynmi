<div class="page-body">
<div class="container-fluid">

{{-- Page Title + Breadcrumb --}}
<div class="page-title">
    <div class="row">
        <div class="col-6">
            <h4>About Us</h4>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/portal/dashboard') }}">
                        <i data-feather="home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
        </div>
    </div>
</div>

{{-- Action Button --}}
<div class="row mb-3">
    <div class="col-md-12 text-end">
        @if($about)
            <a href="{{ url('/portal/about-us/edit/'.$about->id) }}"
               class="btn btn-primary btn-sm">
                <i class="fa fa-edit"></i> Edit About Us
            </a>
        @else
            <a href="{{ url('/portal/about-us/add') }}"
               class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> Add About Us
            </a>
        @endif
    </div>
</div>

{{-- Listing Card --}}
<div class="card">
<div class="card-body">

@if($about)
<table class="table table-bordered">
    <tr>
        <th>About</th>
        <td>{{ Str::limit(strip_tags($about->about), 200) }}</td>
    </tr>
    <tr>
        <th>Mission</th>
        <td>{{ Str::limit(strip_tags($about->mission), 200) }}</td>
    </tr>
    <tr>
        <th>Vision</th>
        <td>{{ Str::limit(strip_tags($about->vision), 200) }}</td>
    </tr>
</table>
@else
<div class="text-center text-muted">
    <p>No About Us record found.</p>
</div>
@endif

</div>
</div>

</div>
</div>
