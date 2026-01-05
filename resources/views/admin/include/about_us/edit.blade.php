<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Edit About Info</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">About Info</li>
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
                            <form method="POST"
                                action="{{ $action === 'edit'
                                        ? route('admin.about.update', $about->id)
                                        : route('admin.about.store') }}"
                                enctype="multipart/form-data">

                            @csrf

                            <div class="mb-3">
                                <label>About Us</label>
                                <textarea name="about" id="ckeditor" class="form-control">
                                    {{ $about->about ?? '' }}
                                </textarea>
                            </div>

                            <div class="mb-3">
                                <label>Mission</label>
                                <textarea name="mission" id="ckeditor2" class="form-control">
                                    {{ $about->mission ?? '' }}
                                </textarea>
                            </div>

                            <div class="mb-3">
                                <label>Vision</label>
                                <textarea name="vision" id="ckeditor3" class="form-control">
                                    {{ $about->vision ?? '' }}
                                </textarea>
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                @if(!empty($about->image))
                                    <img src="{{ asset($about->image) }}" width="120" class="mt-2 rounded">
                                @endif
                            </div>

                            <button class="btn btn-primary">
                                {{ $action === 'edit' ? 'Update' : 'Save' }}
                            </button>
                            <a href="{{ route('admin.about') }}" class="btn btn-danger">Cancel</a>

                            </form>

                        </div>
                    </div>
                @endif

              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>