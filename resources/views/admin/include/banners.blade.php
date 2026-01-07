@if ($action == "add")
    @include('admin.include.banners.add')
@elseif ($action == "edit")
    @include('admin.include.banners.edit')
@else
    @include('admin.include.banners.list')
@endif