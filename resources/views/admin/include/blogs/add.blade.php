<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Add Blog</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Blogs</li>
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
                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="mb-3">
                          <label>Title</label>
                          <input type="text" name="title" class="form-control" required>
                      </div>

                      <div class="mb-3">
                          <label>Status</label>
                          <select name="status" class="form-select">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                          </select>
                      </div>

                      <div class="mb-3">
                          <label>Overview</label>
                          <textarea name="overview" class="form-control"></textarea>
                      </div>

                      <div class="mb-3">
                          <label>Detail</label>
                          <textarea name="detail" class="form-control" id="ckeditor"></textarea>
                      </div>

                      <div class="row">
                          <label>Image</label>
                          <div class="col">
                              <div class="fake-dropzone text-center mb-3">
                                  <i class="bx bxs-cloud-upload"></i>
                                  <h6>Upload Blog Image</h6>
                                  <input type="file" class="form-control mt-3" name="image" accept=".jpg,.jpeg,.png,.svg">
                              </div>
                          </div>
                      </div>

                      <button class="btn btn-success">Add Blog</button>
                      <a href="{{ route('admin.blogs') }}" class="btn btn-danger">Cancel</a>

                      </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>