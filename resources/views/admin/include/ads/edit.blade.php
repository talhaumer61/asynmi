<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Edit Advertisement</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Advertisements</li>
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
                            <form method="POST" action="{{ route('admin.ads.update',$ad->id) }}" enctype="multipart/form-data">
                              @csrf

                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label>Status</label>
                                      <select name="status" class="form-select">
                                          <option value="1" {{ $ad->status ? 'selected' : '' }}>Active</option>
                                          <option value="0" {{ !$ad->status ? 'selected' : '' }}>Inactive</option>
                                      </select>
                                  </div>

                                  <div class="col-md-6 mb-3">
                                      <label>URL</label>
                                      <input type="text" value="{{$ad->url}}" name="url" class="form-control">
                                  </div>
                              </div>

                              <div class="row">
                                  <label>Image</label>
                                  <div class="col">
                                      <div class="fake-dropzone text-center mb-3">
                                          <i class="bx bxs-cloud-upload"></i>
                                          @if($ad->image)
                                              <img src="{{ asset($ad->image) }}" width="80"><br><br>
                                          @endif
                                          <h6>Upload Advertisement Image</h6>
                                          <input type="file" class="form-control mt-3" name="image" accept=".jpg,.jpeg,.png,.svg">
                                      </div>
                                  </div>
                              </div>

                              <button class="btn btn-primary">Update Advertisement</button>
                              <a href="{{ route('admin.ads') }}" class="btn btn-danger">Cancel</a>

                            </form>


                        </div>
                    </div>
                @endif

              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>