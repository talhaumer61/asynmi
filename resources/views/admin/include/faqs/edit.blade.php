<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Edit FAQ</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">FAQs</li>
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
                                  ? route('admin.faqs.update', $faq->id)
                                  : route('admin.faqs.store') }}">
                              @csrf

                              <div class="mb-3">
                                  <label>Question</label>
                                  <input type="text"
                                        name="question"
                                        class="form-control"
                                        value="{{ old('question', $faq->question ?? '') }}">
                              </div>

                              <div class="mb-3">
                                  <label>Answer</label>
                                  <textarea name="answer"
                                            rows="4"
                                            class="form-control">{{ old('answer', $faq->answer ?? '') }}</textarea>
                              </div>

                              <div class="mb-3">
                                  <label>Status</label>
                                  <select name="status" class="form-select">
                                      <option value="1" {{ ($faq->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                      <option value="0" {{ ($faq->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                                  </select>
                              </div>

                              <button class="btn btn-primary">
                                  {{ $action === 'edit' ? 'Update FAQ' : 'Save FAQ' }}
                              </button>

                              <a href="{{ route('admin.faqs') }}" class="btn btn-danger">Cancel</a>

                          </form>

                      </div>
                  </div>
                @endif

              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>