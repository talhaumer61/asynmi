
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Edit Profile</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('admin/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <!-- Profile Sidebar -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">My Profile</h4>
                        </div>
                        <div class="card-body text-center">
                            <img class="img-100 rounded-circle mb-3"
                                 src="{{ $admin->photo ? asset($admin->photo) : asset('uploads/admins/default.png') }}"
                                 alt="Admin Photo">
                            <h5 class="mb-1">{{ $admin->name }}</h5>
                            <p class="text-muted">{{ $admin->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Edit Form -->
                <div class="col-xl-8">
                    <form class="card" method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Profile</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control" 
                                               value="{{ old('name', $admin->name) }}" required>
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control"
                                               value="{{ old('username', $admin->username) }}" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" name="email" class="form-control"
                                               value="{{ old('email', $admin->email) }}" required>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password (leave blank to keep current)</label>
                                        <input type="password" name="password" class="form-control" placeholder="********">
                                    </div>
                                </div>

                                <!-- Photo -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Profile Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
