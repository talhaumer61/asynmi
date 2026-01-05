@if ($action == "add")
    @include('admin.include.events.add')
@elseif ($action == "edit")
    @include('admin.include.events.edit')
@else
    @include('admin.include.events.list')
@endif