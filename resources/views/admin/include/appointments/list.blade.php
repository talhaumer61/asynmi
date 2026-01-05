 <div class="page-body">
    <div class="container-fluid">

        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Appointments</h4>
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
                        <li class="breadcrumb-item active">Appointments</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card mb-3">
            <div class="card-body">
                <form method="GET" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="name" class="form-control"
                               placeholder="Name" value="{{ request('name') }}">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="email" class="form-control"
                               placeholder="Email" value="{{ request('email') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="country_id" class="form-select">
                            <option value="">All Countries</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ request('country_id') == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
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
                <div class="list-product">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Country</th>
                            <th>Date</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td><strong>{{ $appointment->name }}</strong></td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td>{{ $appointment->country->name ?? '-' }}</td>
                                <td>{{ $appointment->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="javascript:void(0)"
                                       class="action-btn edit-btn viewAppointment"
                                       data-id="{{ $appointment->id }}"
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
                                    No appointments found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $appointments->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="appointmentModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="appointmentModalContent">
                <div class="text-center p-5">
                    <div class="spinner-border text-primary"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.viewAppointment').forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.dataset.id;

            let modal = new bootstrap.Modal(
                document.getElementById('appointmentModal')
            );

            fetch(`/portal/appointments/${id}`)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('appointmentModalContent').innerHTML = html;
                    modal.show();
                });
        });
    });
</script>
