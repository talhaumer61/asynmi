<div class="page-body">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Contact Information</h4>

                    @if(!$contact)
                        <a href="{{ route('admin.contact-info','add') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Add Contact Info
                        </a>
                    @else
                        <a href="{{ route('admin.contact-info','edit') }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i> Edit Contact Info
                        </a>
                    @endif
                </div>

                @if($contact)
                    <table class="table table-bordered align-middle">
                        <tbody>
                            <tr>
                                <th width="25%">Email 1</th>
                                <td>{{ $contact->email1 ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Email 2</th>
                                <td>{{ $contact->email2 ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ $contact->phone ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>WhatsApp</th>
                                <td>{{ $contact->whatsapp ?? '-' }}</td>
                            </tr>

                            {{-- Addresses --}}
                            <tr>
                                <th>Addresses</th>
                                <td>
                                    @forelse($contact->addresses as $addr)
                                        <div class="mb-1">
                                            <strong>{{ $addr['city'] }}</strong> —
                                            {{ $addr['address'] }}
                                        </div>
                                    @empty
                                        <span class="text-muted">No addresses added</span>
                                    @endforelse
                                </td>
                            </tr>

                            {{-- Social Media --}}
                            <tr>
                                <th>Social Media</th>
                                <td>
                                    @if($contact->facebook)
                                        <a href="{{ $contact->facebook }}" target="_blank" class="me-2">
                                            <i class="fab fa-facebook text-primary"></i>
                                        </a>
                                    @endif

                                    @if($contact->instagram)
                                        <a href="{{ $contact->instagram }}" target="_blank" class="me-2">
                                            <i class="fab fa-instagram text-danger"></i>
                                        </a>
                                    @endif

                                    @if($contact->linkedin)
                                        <a href="{{ $contact->linkedin }}" target="_blank" class="me-2">
                                            <i class="fab fa-linkedin text-info"></i>
                                        </a>
                                    @endif

                                    @if($contact->twitter)
                                        <a href="{{ $contact->twitter }}" target="_blank" class="me-2">
                                            <i class="fab fa-twitter text-primary"></i>
                                        </a>
                                    @endif

                                    @if(
                                        !$contact->facebook &&
                                        !$contact->instagram &&
                                        !$contact->linkedin &&
                                        !$contact->twitter
                                    )
                                        <span class="text-muted">No social links</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning mb-0">
                        <i class="fa fa-info-circle"></i>
                        No contact information added yet.
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>
