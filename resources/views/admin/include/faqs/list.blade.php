<div class="page-body">
    <div class="container-fluid">

        <div class="page-title">
            <div class="row">
                <div class="col-6"><h4>FAQs</h4></div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/portal/dashboard"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">FAQs</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="text-end mb-3">
            <a href="{{ route('admin.faqs', 'add') }}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> Add FAQ
            </a>
        </div>

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($faqs as $key => $faq)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ Str::limit($faq->question, 80) }}</td>
                                <td>{!! get_status($faq->status) !!}</td>
                                <td>
                                    <div class="product-action">

                                        <a href="{{ url('/portal/faqs/edit/'.$faq->id) }}"
                                        class="action-btn edit-btn"
                                        title="Edit">
                                            <svg>
                                                <use href="{{ asset('admin/svg/icon-sprite.svg#edit-content') }}"></use>
                                            </svg>
                                        </a>

                                        <form action="{{ route('admin.faqs.delete', $faq->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Delete this FAQ?')"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button class="action-btn delete-btn border-0">
                                                <svg>
                                                    <use href="{{ asset('admin/svg/icon-sprite.svg#trash1') }}"></use>
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger fw-bold">
                                    No FAQs Found!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>



    </div>
</div>
