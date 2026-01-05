<div class="contact-page pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-12">
                <div class="contact-form-area py-4">
                    <h3 class="mb-1">Reach Us Anytime</h3>
                    <p class="mb-4">Are you ready to schedule your appointment? OR Maybe you still have some questions? Please fill in the form below, one of our executive would be in contact with you</p>
                    <form method="POST" action="{{ route('appointment.store') }}">
                        @csrf

                        <div class="row">

                            <div class="col-lg-12 mb-20">
                                <div class="form-inner">
                                    <label>Name *</label>
                                    <input type="text" name="name" required>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <div class="form-inner">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" required placeholder="0300-1234567">
                                </div>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <div class="form-inner">
                                    <label>Email *</label>
                                    <input type="email" name="email" required>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <div class="form-inner">
                                    <label>Qualification *</label>
                                    <input type="text" name="qualification" required>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-20">
                                <div class="form-inner">
                                    <label>CGPA / Percentage</label>
                                    <input type="text" name="cgpa">
                                </div>
                            </div>

                            <div class="col-lg-12 mb-20">
                                <div class="form-inner">
                                    <label>City</label>
                                    <input type="text" name="city">
                                </div>
                            </div>

                            <div class="col-lg-12 mb-30">
                                <label>Country of Interest *</label>
                                <div class="styled-select-wrapper">
                                    <select name="country_id" class="styled-select" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-30">
                                <div class="form-inner">
                                    <label>Course of Interest</label>
                                    <input type="text" name="course">
                                </div>
                            </div>

                            <div class="col-lg-12 mb-30">
                                <div class="form-inner">
                                    <label>Questions / Comments</label>
                                    <textarea name="comments"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-inner">
                                    <button class="primary-btn1 btn-hover" type="submit">
                                        Submit Now
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div class="toast show align-items-center text-bg-success border-0">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        document.querySelector('.toast')?.remove();
    }, 4000);
</script>
@endif
