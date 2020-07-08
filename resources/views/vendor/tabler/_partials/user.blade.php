<div class="dropdown d-none d-md-flex">
    <a class="nav-link icon" data-toggle="dropdown">
        <i class="fe fe-bell"></i>
        <span class="nav-unread"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a href="javascript:void(0)" class="dropdown-item">Lorem ipsum dolor sit amet, consectetur </a>
        <div class="dropdown-divider"></div>
        <a href="javascript:void(0)" class="dropdown-item">Lorem ipsum dolor sit amet, consectetur </a>
        <div class="dropdown-divider"></div>
        <a href="javascript:void(0)" class="dropdown-item text-center">Lihat lainnya...</a>
    </div>
</div>

<div class="dropdown">
    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
        <span class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
        <span class="ml-2 d-none d-lg-block">
            <span class="text-default">{{ $user->name }}</span>
            <small class="text-muted d-block mt-1">{{ $user->email }}</small>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a class="dropdown-item" href="{!! url(config('tabler.urls.profile')) !!}">
            <i class="dropdown-icon fe fe-user"></i> Profile
        </a>
        <a class="dropdown-item" href="{!! url(config('tabler.urls.settings')) !!}">
            <i class="dropdown-icon fe fe-settings"></i> Setting
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="dropdown-icon fe fe-log-out"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>
