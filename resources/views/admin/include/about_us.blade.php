@if ($action == "add")
    @include('admin.include.about_us.add')
@elseif ($action == "edit")
    @include('admin.include.about_us.edit')
@else
    @include('admin.include.about_us.list')
@endif