<div class="page-body">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>{{ $contact ? 'Edit Contact Info' : 'Add Contact Info' }}</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('admin/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Contact Info</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="card mt-4">
            <div class="card-body">

                <form method="POST"
                      action="{{ $contact
                            ? route('admin.contact-info.update', $contact->id)
                            : route('admin.contact-info.store') }}">
                    @csrf

                    {{-- Emails --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Email 1</label>
                            <input type="email" name="email1" class="form-control"
                                   value="{{ old('email1', $contact->email1 ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email 2</label>
                            <input type="email" name="email2" class="form-control"
                                   value="{{ old('email2', $contact->email2 ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control"
                                   value="{{ old('phone', $contact->phone ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>WhatsApp</label>
                            <input type="text" name="whatsapp" class="form-control"
                                   value="{{ old('whatsapp', $contact->whatsapp ?? '') }}">
                        </div>
                    </div>

                    <hr>

                    {{-- Social Links --}}
                    <h5>Social Media</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Facebook</label>
                            <input type="url" name="facebook" class="form-control"
                                   value="{{ old('facebook', $contact->facebook ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Instagram</label>
                            <input type="url" name="instagram" class="form-control"
                                   value="{{ old('instagram', $contact->instagram ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>LinkedIn</label>
                            <input type="url" name="linkedin" class="form-control"
                                   value="{{ old('linkedin', $contact->linkedin ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Twitter</label>
                            <input type="url" name="twitter" class="form-control"
                                   value="{{ old('twitter', $contact->twitter ?? '') }}">
                        </div>
                    </div>

                    <hr>

                    {{-- Addresses --}}
                    <h5>Addresses</h5>

                    <div id="addressWrapper">
                        @php
                            $addresses = old('city')
                                ? collect(old('city'))->map(fn($city, $i) => [
                                    'city' => $city,
                                    'address' => old('address')[$i]
                                ])
                                : ($contact->addresses ?? [['city'=>'','address'=>'']]);
                        @endphp

                        @foreach($addresses as $addr)
                            <div class="row mb-2 address-row">
                                <div class="col-md-4">
                                    <input type="text" name="city[]" class="form-control"
                                           placeholder="City" value="{{ $addr['city'] }}">
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="address[]" class="form-control"
                                           placeholder="Address" value="{{ $addr['address'] }}">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger remove-address">×</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-sm btn-secondary mb-3" id="addAddress">
                        + Add Address
                    </button>

                    <br>

                    <button class="btn btn-primary">
                        {{ $contact ? 'Update' : 'Save' }}
                    </button>
                    <a href="{{ route('admin.contact-info') }}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>

    </div>
</div>

{{-- JS --}}
<script>
document.getElementById('addAddress').addEventListener('click', function () {
    document.getElementById('addressWrapper').insertAdjacentHTML('beforeend', `
        <div class="row mb-2 address-row">
            <div class="col-md-4">
                <input type="text" name="city[]" class="form-control" placeholder="City">
            </div>
            <div class="col-md-7">
                <input type="text" name="address[]" class="form-control" placeholder="Address">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger remove-address">×</button>
            </div>
        </div>
    `);
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-address')) {
        e.target.closest('.address-row').remove();
    }
});
</script>
