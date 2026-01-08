<h4 class="mb-3">Query Details</h4>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ $query->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $query->email }}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{ $query->phone ?? '-' }}</td>
    </tr>
    <tr>
        <th>Subject</th>
        <td>{{ $query->subject ?? '-' }}</td>
    </tr>
    <tr>
        <th>Message</th>
        <td>{{ $query->message }}</td>
    </tr>
    <tr>
        <th>Submitted At</th>
        <td>{{ $query->created_at->format('d M Y, h:i A') }}</td>
    </tr>
</table>
