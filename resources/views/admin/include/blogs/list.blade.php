<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Blogs
                    </h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a>
                    </li>
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
                    <div class="list-product-header">
                      <div>
                        <a class="btn btn-primary" href="/portal/blogs/add"><i class="fa fa-plus"></i>Add Blog</a>
                      </div>
                    </div>
                    <div class="list-product">
                      <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if($blogs->count() > 0)
                              @foreach($blogs as $blog)
                                  <tr>
                                      {{-- Image + Title --}}
                                      <td>
                                          <div class="product-names">
                                              <div class="light-product-box">
                                                  @if($blog->image)
                                                      <img class="img-fluid" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                                                  @else
                                                      <img class="img-fluid" src="{{ asset('admin/images/placeholder.png') }}" alt="No Image">
                                                  @endif
                                              </div>
                                              <p class="mb-0">{{ $blog->title }}</p>
                                          </div>
                                      </td>

                                      {{-- Status --}}
                                      <td>
                                          {!! get_status($blog->status) !!}
                                      </td>

                                      {{-- Actions --}}
                                      <td>
                                          <div class="product-action">
                                              <a href="{{ url('/portal/blogs/edit/'.$blog->id) }}"
                                                class="action-btn edit-btn"
                                                title="Edit">
                                                  <svg>
                                                      <use href="{{ asset('admin/svg/icon-sprite.svg#edit-content') }}"></use>
                                                  </svg>
                                              </a>
                                              
                                              <form action="{{ route('admin.blogs.delete', $blog->id) }}" method="POST"
                                                    onsubmit="return confirm('Delete this blog?')" style="display:inline;">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button class="action-btn delete-btn" title="Delete">
                                                      <svg>
                                                          <use href="{{ asset('admin/svg/icon-sprite.svg#trash1') }}"></use>
                                                      </svg>
                                                  </button>
                                              </form>


                                          </div>
                                      </td>
                                  </tr>
                              @endforeach
                          @else
                              <tr>
                                  <td colspan="3" class="text-center text-muted">
                                      <strong>No blog found</strong>
                                  </td>
                              </tr>
                          @endif
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