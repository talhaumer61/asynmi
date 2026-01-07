<div class="page-body">
<div class="container-fluid">

<div class="page-title">
    <div class="row">
        <div class="col-6"><h4>Advertisements</h4></div>
        <div class="col-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/portal/dashboard"><i data-feather="home"></i></a>
                </li>
                <li class="breadcrumb-item active">Advertisements</li>
            </ol>
        </div>
    </div>
</div>

<div class="text-end mb-3">
    <a href="/portal/ads/add" class="btn btn-success btn-sm">
        <i class="fa fa-plus"></i> Add Advertisement
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
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($ads->count() > 0)
            @foreach($ads as $key => $ad)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <img src="{{ asset($ad->image) }}" height="60">
                    </td>
                    <td>{!! get_status($ad->status) !!}</td>
                    <td>
                        <div class="product-action">
                            <a href="{{ url('/portal/ads/edit/'.$ad->id) }}"
                            class="action-btn edit-btn"
                            title="Edit">
                                <svg>
                                    <use href="{{ asset('admin/svg/icon-sprite.svg#edit-content') }}"></use>
                                </svg>
                            </a>
                            
                            <form action="{{ route('admin.ads.delete', $ad->id) }}" method="POST"
                                onsubmit="return confirm('Delete this advertisement?')" style="display:inline;">
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
                    No Advertisement Found!
                </td>
            </tr>
        @endif
    </tbody>
</table>

</div>
</div>

</div>
</div>
