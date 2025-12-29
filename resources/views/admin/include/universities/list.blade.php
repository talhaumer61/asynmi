<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Universities
                    </h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/portal/dashboard">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a>
                    </li>
                    <li class="breadcrumb-item active">Universities</li>
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
                        <a class="btn btn-primary" href="/portal/universities/add"><i class="fa fa-plus"></i>Add University</a>
                      </div>
                    </div>
                    <div class="list-product">
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="40%">University</th>
                                <th width="10%">Country</th>
                                <th width="10%">Ranking</th>
                                <th width="20%">Tuition Fee</th>
                                <th width="10%">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($universities as $uni)
                                <tr>
                                    <td class="d-flex align-items-center gap-3">
                                        @if($uni->image)
                                            <img src="{{ asset($uni->image) }}" width="50">
                                        @endif
                                        <strong>{{ $uni->name }}</strong>
                                    </td>

                                    <td>{{ $uni->country->name }}</td>
                                    <td>{{ $uni->ranking }}</td>
                                    <td>{{ $uni->country->currency_symbol.$uni->tuition_fee }}</td>
                                    <td>{!! get_status($uni->status) !!}</td>

                                    <td class="d-flex gap-2">
                                        <div class="product-action">
                                              <a href="{{ url('/portal/universities/edit/'.$uni->id) }}"
                                                class="action-btn edit-btn"
                                                title="Edit">
                                                  <svg>
                                                      <use href="{{ asset('admin/svg/icon-sprite.svg#edit-content') }}"></use>
                                                  </svg>
                                              </a>
                                              
                                              <form action="{{ route('admin.universities.delete', $uni->id) }}" method="POST"
                                                    onsubmit="return confirm('Delete this university?')" style="display:inline;">
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
                                    <td colspan="6" class="text-center text-muted">
                                        <strong>No university found</strong>
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