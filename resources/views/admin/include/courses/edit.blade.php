<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                    Edit Course</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/portal/dashboard">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Courses</li>
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
                    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="row">
                        <div class="col mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $course->name }}" class="form-control">
                        </div>
  
                        <div class="col mb-3">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="1" {{ $course->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$course->status ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                      </div>

                      <div class="mb-3">
                          <label>Overview</label>
                          <textarea name="overview" class="form-control">{{ $course->overview }}</textarea>
                      </div>

                      <div class="mb-3">
                          <label>Detail</label>
                          <textarea name="detail" class="form-control" id="ckeditor">{{ $course->detail }}</textarea>
                      </div>

                      <div class="mb-3">
                          <label>Image</label><br>
                          @if($course->image)
                              <img src="{{ asset($course->image) }}" width="80"><br><br>
                          @endif
                          <input type="file" name="image" class="form-control">
                      </div>

                      <button class="btn btn-success">Update Course</button>
                      <a href="{{ route('admin.courses') }}" class="btn btn-danger">Cancel</a>

                      </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>