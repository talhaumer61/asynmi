<div class="page-body">
<div class="container-fluid">

<div class="page-title">
    <div class="row">
        <div class="col-6"><h4>Partners</h4></div>
        <div class="col-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/portal/dashboard"><i data-feather="home"></i></a>
                </li>
                <li class="breadcrumb-item active">Partners</li>
            </ol>
        </div>
    </div>
</div>

<div class="text-end mb-3">
    <a href="/portal/partners/add" class="btn btn-success btn-sm">
        <i class="fa fa-plus"></i> Add Partner
    </a>
</div>

<div class="card">
<div class="card-body">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Status</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($partners->count() > 0)
            @foreach($partners as $key => $partner)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <img src="{{ asset($partner->logo) }}" height="60">
                    </td>
                    <td>{{ $partner->name }}</td>
                    <td>{!! get_status($partner->status) !!}</td>
                    <td>
                        <div class="product-action">
                            <a href="{{ url('/portal/partners/edit/'.$partner->id) }}"
                            class="action-btn edit-btn"
                            title="Edit">
                                <svg>
                                    <use href="{{ asset('admin/svg/icon-sprite.svg#edit-content') }}"></use>
                                </svg>
                            </a>
                            
                            <form action="{{ route('admin.partners.delete', $partner->id) }}" method="POST"
                                onsubmit="return confirm('Delete this partner?')" style="display:inline;">
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
                    No Partner Found!
                </td>
            </tr>
        @endif
    </tbody>
</table>

</div>
</div>

</div>
</div>
