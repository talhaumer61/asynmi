@if ($action == "add")
    @include('admin.include.ads.add')
@elseif ($action == "edit")
    @include('admin.include.ads.edit')
@else
    @include('admin.include.ads.list')
@endif