 <div class="page-body">
    <div class="container-fluid">

        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>User Queries</h4>
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
                        <li class="breadcrumb-item active">User Queries</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card mb-3">
            <div class="card-body">
                <form method="GET" class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="name" class="form-control"
                            placeholder="Name" value="{{ request('name') }}">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="email" class="form-control"
                            placeholder="Email" value="{{ request('email') }}">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="subject" class="form-control"
                            placeholder="Subject" value="{{ request('subject') }}">
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary w-100">
                            <i class="fa fa-filter"></i> Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Listing -->
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($queries as $query)
                        <tr>
                            <td><strong>{{ $query->name }}</strong></td>
                            <td>{{ $query->email }}</td>
                            <td>{{ $query->phone ?? '-' }}</td>
                            <td>{{ $query->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="javascript:void(0)"
                                class="action-btn edit-btn viewQuery"
                                data-id="{{ $query->id }}"
                                title="View">
                                    <svg>
                                        <use href="{{ asset('admin/svg/icon-sprite.svg#eye') }}"></use>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No queries found
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                {{ $queries->links() }}
            </div>
        </div>


    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="queryModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="queryModalContent">
                <div class="text-center p-5">
                    <div class="spinner-border text-primary"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.viewQuery').forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.dataset.id;

            let modal = new bootstrap.Modal(
                document.getElementById('queryModal')
            );

            fetch(`/portal/queries/${id}`)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('queryModalContent').innerHTML = html;
                    modal.show();
                });
        });
    });
</script>

