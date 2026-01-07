<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Edit Partner</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Partners</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                @if($action === 'add' || $action === 'edit')
                    <div class="card mt-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.partners.update',$partner->id) }}" enctype="multipart/form-data">
                              @csrf

                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label>Name</label>
                                      <input type="text" value="{{$partner->name}}" name="name" class="form-control">
                                  </div>

                                  <div class="col-md-6 mb-3">
                                      <label>Status</label>
                                      <select name="status" class="form-select">
                                          <option value="1" {{ $partner->status ? 'selected' : '' }}>Active</option>
                                          <option value="0" {{ !$partner->status ? 'selected' : '' }}>Inactive</option>
                                      </select>
                                  </div>

                              </div>

                              <div class="row">
                                  <label>Logo</label>
                                  <div class="col">
                                      <div class="fake-dropzone text-center mb-3">
                                          <i class="bx bxs-cloud-upload"></i>
                                          @if($partner->logo)
                                              <img src="{{ asset($partner->logo) }}" width="80"><br><br>
                                          @endif
                                          <h6>Upload Partner Logo</h6>
                                          <input type="file" class="form-control mt-3" name="logo" accept=".jpg,.jpeg,.png,.svg">
                                      </div>
                                  </div>
                              </div>

                              <button class="btn btn-primary">Update Partner</button>
                              <a href="{{ route('admin.partners') }}" class="btn btn-danger">Cancel</a>

                            </form>


                        </div>
                    </div>
                @endif

              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>