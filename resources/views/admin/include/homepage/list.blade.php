<div class="page-body">
    <div class="container-fluid">

        {{-- Page Title + Breadcrumb --}}
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Home Page Elements</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/portal/dashboard') }}">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Home Page Elements</li>
                    </ol>
                </div>
            </div>
        </div>


        {{-- Listing Card --}}
        <div class="card">
            <div class="card-body">

                <form method="POST"
                    action="{{ $homepageElement ? route('homepage.elements.update',$homepageElement->id) : route('homepage.elements.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- How To Apply --}}
                    <div class="mb-3">
                        <label class="form-label">How To Apply Image</label>
                        <input type="file" name="how_to_apply" class="form-control">
                        @if($homepageElement?->how_to_apply)
                            <img src="{{ asset($homepageElement->how_to_apply) }}" height="80" class="mt-2">
                        @endif
                    </div>

                    {{-- What We Offer --}}
                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between">
                            What We Offer
                            <button type="button" class="btn btn-sm btn-primary" id="add-offer">+</button>
                        </label>

                        <div id="offer-wrapper">
                            @if($homepageElement?->what_we_offer)
                                @foreach($homepageElement->what_we_offer as $key => $offer)
                                    <div class="row mb-2 offer-row">
                                        <div class="col-md-5">
                                            <input type="text" name="offer_name[]" value="{{ $offer['name'] }}" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="file" name="offer_icon[]" class="form-control">
                                            <input type="hidden" name="old_offer_icon[]" value="{{ $offer['icon'] }}">
                                            @if($offer['icon'])
                                                <img src="{{ asset('storage/'.$offer['icon']) }}" height="40" class="mt-1">
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-offer">×</button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row mb-2 offer-row">
                                    <div class="col-md-5">
                                        <input type="text" name="offer_name[]" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="file" name="offer_icon[]" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-offer">×</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-success">Save</button>
                </form>


            </div>
        </div>


    </div>
</div>

<script>
    document.getElementById('add-offer').addEventListener('click', function () {
        let html = `
        <div class="row mb-2 offer-row">
            <div class="col-md-5">
                <input type="text" name="offer_name[]" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-5">
                <input type="file" name="offer_icon[]" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-offer">×</button>
            </div>
        </div>`;
        document.getElementById('offer-wrapper').insertAdjacentHTML('beforeend', html);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-offer')) {
            e.target.closest('.offer-row').remove();
        }
    });
</script>
