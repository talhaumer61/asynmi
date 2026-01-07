<div class="page-body">
<div class="container-fluid">

<div class="page-title">
    <div class="row">
        <div class="col-6"><h4>Banners</h4></div>
        <div class="col-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/portal/dashboard"><i data-feather="home"></i></a>
                </li>
                <li class="breadcrumb-item active">Banners</li>
            </ol>
        </div>
    </div>
</div>

<div class="text-end mb-3">
    <a href="/portal/banners/add" class="btn btn-success btn-sm">
        <i class="fa fa-plus"></i> Add Banner
    </a>
</div>

<div class="card">
<div class="card-body">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Status</th>
            <th>Order</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($banners->count() > 0)
            @foreach($banners as $key => $banner)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <img src="{{ asset($banner->image) }}" height="60">
                    </td>
                    <td>{!! get_status($banner->status) !!}</td>
                    <td>{{ $banner->sort_order }}</td>
                    <td>
                        <div class="product-action">
                            <a href="{{ url('/portal/banners/edit/'.$banner->id) }}"
                            class="action-btn edit-btn"
                            title="Edit">
                                <svg>
                                    <use href="{{ asset('admin/svg/icon-sprite.svg#edit-content') }}"></use>
                                </svg>
                            </a>
                            
                            <form action="{{ route('admin.banners.delete', $banner->id) }}" method="POST"
                                onsubmit="return confirm('Delete this banner?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="action-btn delete-btn border-0" title="Delete">
                                    <svg>
                                        <use href="{{ asset('admin/svg/icon-sprite.svg#trash1') }}"></use>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center fw-bold text-danger">
                    No Banners Found!
                </td>
            </tr>
        @endif
    </tbody>
</table>

</div>
</div>

</div>
</div>
