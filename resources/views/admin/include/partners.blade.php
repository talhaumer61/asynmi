@if ($action == "add")
    @include('admin.include.partners.add')
@elseif ($action == "edit")
    @include('admin.include.partners.edit')
@else
    @include('admin.include.partners.list')
@endif