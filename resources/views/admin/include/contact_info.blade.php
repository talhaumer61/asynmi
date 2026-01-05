@if ($action == "add")
    @include('admin.include.contact_info.add')
@elseif ($action == "edit")
    @include('admin.include.contact_info.edit')
@else
    @include('admin.include.contact_info.list')
@endif