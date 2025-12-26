@if ($action == "add")
    @include('admin.include.blogs.add')
@elseif ($action == "edit")
    @include('admin.include.blogs.edit')
@else
    @include('admin.include.blogs.list')
@endif