<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Courses
                    </h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/portal/dashboard">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a>
                    </li>
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
                    <div class="list-product-header">
                      <div>
                        <a class="btn btn-primary" href="/portal/courses/add"><i class="fa fa-plus"></i>Add Course</a>
                      </div>
                    </div>
                    <div class="list-product">
                      <table class="table">
                        <thead>
                            <tr>
                                <th width="70%">Course</th>
                                <th width="10%">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $course)
                                <tr>
                                    <td class="d-flex align-items-center gap-3">
                                        @if($course->image)
                                            <img src="{{ asset($course->image) }}" class="rounded" style="border: 2px solid black" width="60">
                                        @endif
                                        <strong>{{ $course->name }}</strong>
                                    </td>
                                    <td>{!! get_status($course->status) !!}</td>
                                    <td class="d-flex gap-2">
                                        <div class="product-action">
                                          <a href="{{ url('/portal/courses/edit/'.$course->id) }}"
                                            class="action-btn edit-btn"
                                            title="Edit">
                                              <svg>
                                                  <use href="{{ asset('admin/svg/icon-sprite.svg#edit-content') }}"></use>
                                              </svg>
                                          </a>
                                          
                                          <form action="{{ route('admin.courses.delete', $course->id) }}" method="POST"
                                                onsubmit="return confirm('Delete this course?')" style="display:inline;">
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
                                    <td colspan="3" class="text-center text-muted">
                                        <strong>No course found</strong>
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