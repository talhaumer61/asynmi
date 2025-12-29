@if ($action == "add")
    @include('admin.include.universities.add')
@elseif ($action == "edit")
    @include('admin.include.universities.edit')
@else
    @include('admin.include.universities.list')
@endif