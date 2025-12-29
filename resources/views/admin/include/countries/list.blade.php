<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Countries
                    </h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/portal/dashboard">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a>
                    </li>
                    <li class="breadcrumb-item active">Countries</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12"> 
                <div class="card"> 
                  <div class="card-body">
                    <div class="list-product-header">
                      <div>
                        <a class="btn btn-primary" href="/portal/countries/add"><i class="fa fa-plus"></i>Add Country</a>
                      </div>
                    </div>
                    <div class="list-product">
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>Currency</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($countries as $country)
                                <tr>
                                    <td class="d-flex align-items-center gap-3">
                                        @if($country->image)
                                            <img src="{{ asset($country->image) }}" width="50">
                                        @endif
                                        <strong>{{ $country->name }}</strong>
                                        <span class="text-muted">({{ $country->country_code }})</span>
                                    </td>

                                    <td>
                                        {{ $country->currency_symbol }}
                                        {{ $country->currency }}
                                        ({{ $country->currency_code }})
                                    </td>

                                    <td>{!! get_status($country->status) !!}</td>

                                    <td class="d-flex gap-2">
                                        <div class="product-action">
                                          <a href="{{ url('/portal/countries/edit/'.$country->id) }}"
                                            class="action-btn edit-btn"
                                            title="Edit">
                                              <svg>
                                                  <use href="{{ asset('admin/svg/icon-sprite.svg#edit-content') }}"></use>
                                              </svg>
                                          </a>
                                          
                                          <form action="{{ route('admin.countries.delete', $country->id) }}" method="POST"
                                                onsubmit="return confirm('Delete this country?')" style="display:inline;">
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
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        <strong>No country found</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>