@if ($action == "add")
    @include('admin.include.courses.add')
@elseif ($action == "edit")
    @include('admin.include.courses.edit')
@else
    @include('admin.include.courses.list')
@endif