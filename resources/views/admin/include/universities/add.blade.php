<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h4>Add University</h4>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/portal/dashboard">
                <svg class="stroke-icon">
                  <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                </svg>
              </a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Universities</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Container-fluid -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">

            <form method="POST" action="{{ route('admin.universities.store') }}" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <!-- University Name -->
                <div class="col-md-6 mb-3">
                  <label>University Name</label>
                  <input type="text"
                         name="name"
                         class="form-control"
                         required
                         pattern="^[A-Za-z\s\.\-]+$"
                         title="Only letters, spaces, dots and hyphens allowed">
                </div>
                <!-- Status -->
                <div class="col-md-6 mb-3">
                  <label>Status</label>
                  <select name="status" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <!-- Country -->
                <div class="col-md-6 mb-3">
                  <label>Country</label>
                  <select name="country_id" class="form-select" required>
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                  </select>
                </div>
  
                <!-- City -->
                <div class="col-md-6 mb-3">
                  <label>City</label>
                  <input type="text"
                         name="city"
                         class="form-control"
                         pattern="^[A-Za-z\s]+$"
                         title="Only letters and spaces allowed">
                </div>
              </div>

              <div class="row">
                <!-- Ranking -->
                <div class="col-md-4 mb-3">
                  <label>World Ranking</label>
                  <input type="text"
                         name="ranking"
                         class="form-control"
                         placeholder="120-240"
                         pattern="^\d{1,4}-\d{1,4}$"
                         title="Format: 120-240">
                </div>
  
                <!-- Tuition Fee -->
                <div class="col-md-4 mb-3">
                  <label>Tuition Fee (Annual)</label>
                  <input type="text"
                         name="tuition_fee"
                         class="form-control"
                         placeholder="7000-20000"
                         pattern="^\d{3,6}-\d{3,6}$"
                         title="Format: 7000-20000">
                </div>
                
                <!-- IELTS -->
                <div class="col-md-4 mb-3">
                  <label>IELTS Score</label>
                  <input type="text"
                         name="ielts_score"
                         class="form-control"
                         placeholder="6.0 or 6.5"
                         pattern="^[0-9]\.[0-9]$"
                         title="Format: 6.0 or 6.5">
                </div>
              </div>

              {{-- Admission Link --}}
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label>Admission URL</label>
                  <input type="text"
                         name="adm_url"
                         class="form-control">
                </div>
              </div>

              <!-- Intake Months (Checkboxes) -->
              <div class="mb-3">
                <label class="d-block mb-2">Intake Months</label>

                <div class="row">
                  @php
                    $months = [
                      'Jan' => 'January',
                      'Feb' => 'February',
                      'Mar' => 'March',
                      'Apr' => 'April',
                      'May' => 'May',
                      'Jun' => 'June',
                      'Jul' => 'July',
                      'Aug' => 'August',
                      'Sep' => 'September',
                      'Oct' => 'October',
                      'Nov' => 'November',
                      'Dec' => 'December',
                    ];
                  @endphp

                  @foreach($months as $key => $month)
                    <div class="col-md-3 col-sm-4 col-6 mb-2">
                      <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               name="intake_months[]"
                               value="{{ $key }}"
                               id="month{{ $key }}">
                        <label class="form-check-label" for="month{{ $key }}">
                          {{ $month }}
                        </label>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>

              <!-- Image -->
              <div class="mb-3">
                <label>University Image / Logo</label>
                <div class="col">
                    <div class="fake-dropzone text-center mb-3">
                        <i class="bx bxs-cloud-upload"></i>
                        <h6>Upload Service Icon</h6>
                        <input type="file" class="form-control mt-3" name="image" accept=".jpg,.jpeg,.png,.svg">
                    </div>
                </div>
              </div>

              <button class="btn btn-primary">Save University</button>
              <a href="{{ route('admin.universities') }}" class="btn btn-danger">Cancel</a>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
