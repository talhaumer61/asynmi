<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Newsletter Subscribers</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/portal/dashboard') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Subscribers</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fa fa-envelope me-2 text-primary"></i>Subscriber List</h5>
                <div>
                    <input type="text" id="subscriberSearch" class="form-control form-control-sm" placeholder="Search email..." autocomplete="off">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- The fragment starts here --}}
                    @fragment('table-content')
                    <table class="table table-hover align-middle" id="newsletterTable">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 80px;">Sr#</th>
                                <th>Email Address</th>
                                <th>Date Added</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sr = 0;
                            @endphp
                            @forelse($subscribers as $sub)
                            <tr>
                                <td><span class="text-muted">{{ ++$sr }}</span></td>
                                <td><span class="fw-medium text-dark">{{ $sub->email }}</span></td>
                                <td>{{ $sub->created_at->format('M d, Y - H:i') }}</td>
                                <td class="text-end">
                                    <form action="{{ route('newsletter.destroy', $sub->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this subscriber?');" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No subscribers found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-end pagination-wrapper">
                        {{ $subscribers->appends(request()->input())->links() }}
                    </div>
                    @endfragment
                    {{-- The fragment ends here --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#subscriberSearch').on('keyup', function() {
            let query = $(this).val();
            fetchSubscribers(query);
        });

        // Handle pagination links via AJAX so search persists
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let query = $('#subscriberSearch').val();
            
            $.ajax({
                url: url,
                success: function(data) {
                    $('.table-responsive').html(data);
                }
            });
        });

        function fetchSubscribers(query) {
            $.ajax({
                url: "{{ route('newsletter.index') }}", // Ensure this route name is correct
                type: "GET",
                data: {'search': query},
                success: function(data) {
                    // Update the content inside the table-responsive container
                    $('.table-responsive').html(data);
                }
            });
        }
    });
</script>