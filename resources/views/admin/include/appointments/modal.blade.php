<div class="modal-header">
    <h5 class="modal-title">Appointment Detail</h5>
    <button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <table class="table table-bordered">
        <tr><th>Name</th><td>{{ $appointment->name }}</td></tr>
        <tr><th>Email</th><td>{{ $appointment->email }}</td></tr>
        <tr><th>Phone</th><td>{{ $appointment->phone }}</td></tr>
        <tr><th>Qualification</th><td>{{ $appointment->qualification }}</td></tr>
        <tr><th>CGPA</th><td>{{ $appointment->cgpa ?? '-' }}</td></tr>
        <tr><th>City</th><td>{{ $appointment->city }}</td></tr>
        <tr><th>Country</th><td>{{ $appointment->country->name ?? '-' }}</td></tr>
        <tr><th>Course</th><td>{{ $appointment->course ?? '-' }}</td></tr>
        <tr><th>Comments</th><td>{{ $appointment->comments ?? '-' }}</td></tr>
        <tr><th>Submitted At</th><td>{{ $appointment->created_at->format('d M Y h:i A') }}</td></tr>
    </table>
</div>
