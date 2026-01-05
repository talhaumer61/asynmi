<div class="page-body">
<div class="container-fluid">

<div class="card">
<div class="card-body">

<div class="d-flex justify-content-between mb-3">
    <h4>Contact Information</h4>

    @if(!$contact)
        <a href="{{ route('admin.contact-info','add') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Contact Info
        </a>
    @else
        <a href="{{ route('admin.contact-info','edit') }}" class="btn btn-warning">
            Edit Contact Info
        </a>
    @endif
</div>

@if($contact)
<table class="table table-bordered">
    <tr><th>Email 1</th><td>{{ $contact->email1 }}</td></tr>
    <tr><th>Email 2</th><td>{{ $contact->email2 }}</td></tr>
    <tr><th>Phone</th><td>{{ $contact->phone }}</td></tr>
    <tr><th>WhatsApp</th><td>{{ $contact->whatsapp }}</td></tr>
    <tr>
        <th>Addresses</th>
        <td>
            @foreach($contact->addresses as $addr)
                <strong>{{ $addr['city'] }}</strong> — {{ $addr['address'] }} <br>
            @endforeach
        </td>
    </tr>
</table>
@endif

</div>
</div>
</div>
</div>
