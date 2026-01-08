@if ($action == "add")
    @include('admin.include.faqs.add')
@elseif ($action == "edit")
    @include('admin.include.faqs.edit')
@else
    @include('admin.include.faqs.list')
@endif