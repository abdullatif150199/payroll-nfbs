<div class="dropdown d-none d-md-flex">
    <a class="nav-link icon" data-toggle="dropdown">
        <i class="fe fe-bell"></i>
        {{-- <span class="nav-unread"></span> --}}
        @if (Auth::user()->unreadNotifications->count() > 0)
        <span class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        @forelse (Auth::user()->unreadNotifications as $notif)
        <a href="#" data-id="{{ $notif->id }}" data-link="{{ $notif->data['link'] }}"
            class="dropdown-item mark-as-read bg-blue-lightest">
            {!! $notif->data['message'] !!}
        </a>
        @empty
        <div class="text-center">tidak ada notifikasi terbaru</div>
        @endforelse
    </div>
</div>

<div class="dropdown">
    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
        <span class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
        <span class="ml-2 d-none d-lg-block">
            <span class="text-default">{{ Auth::user()->name }}</span>
            <small class="text-muted d-block mt-1">{{ Auth::user()->email }}</small>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a class="dropdown-item" href="{!! url(config('tabler.urls.profile')) !!}">
            <i class="dropdown-icon fe fe-user"></i> Profile
        </a>
        @if (!Auth::user()->hasRole('user'))
        <a class="dropdown-item" href="{{ route('dash.home') }}">
            <i class="dropdown-icon fe fe-grid"></i> Dashboard
        </a>
        @endif
        <a class="dropdown-item" href="{!! route('profile.password') !!}">
            <i class="dropdown-icon fe fe-lock"></i> Ganti Password
        </a>
        @if (!Auth::user()->hasRole('user'))
        <a class="dropdown-item" href="{!! url(config('tabler.urls.settings')) !!}">
            <i class="dropdown-icon fe fe-settings"></i> Setting
        </a>
        @endif
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="dropdown-icon fe fe-log-out"></i> Keluar
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('mark-as-read') }}", {
            method: 'POST',
            data: {
                id
            }
        });
    }

    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                window.location.href = $(this).data('link');
            });
        });

        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.bg-blue-lightest').remove();
            })
        });
    })
</script>
@endpush
