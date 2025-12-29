@if ($action == "add")
    @include('admin.include.countries.add')
@elseif ($action == "edit")
    @include('admin.include.countries.edit')
@else
    @include('admin.include.countries.list')
@endif