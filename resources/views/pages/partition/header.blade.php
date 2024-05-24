@php
    $user = Auth::user();
    $type = $user->TYPE;
@endphp
@includeFirst(['pages.loader.preloader'])
<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <div class="header-search">
                    <div class="input-group">
                        <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                    </div>
                </div>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                        <h4 class="header">Notifications</h4>
                        <div class="notifications-wrap">
                            <a href="#" class="media">
                                <span class="d-flex">
                                    <i class="ik ik-check"></i>
                                </span>
                                <span class="media-body">
                                    <span class="heading-font-family media-heading">Invitation accepted</span>
                                    <span class="media-content">Your have been Invited ...</span>
                                </span>
                            </a>
                            <a href="#" class="media">
                                <span class="d-flex">
                                    @if ($user->PHOTO)
                                        <img src="images/profil/{{ $user->PHOTO }}" class="rounded-circle" alt="icon-profil">
                                    @else
                                        <img src="images/profil/user.png" class="rounded-circle"  alt="icon-profil"/>
                                    @endif
                                </span>
                                <span class="media-body">
                                    <span class="heading-font-family media-heading">Steve Smith</span>
                                    <span class="media-content">I slowly updated projects</span>
                                </span>
                            </a>
                            <a href="#" class="media">
                                <span class="d-flex">
                                    <i class="ik ik-calendar"></i>
                                </span>
                                <span class="media-body">
                                    <span class="heading-font-family media-heading">To Do</span>
                                    <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @if ($type == 'Super Admin')
                <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal"
                data-target="#appsModal">
                    <i class="ik ik-grid"></i>
                </button>
                @endif
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if ($user->PHOTO)
                            <img class="avatar profilAvatar" src="images/profil/{{ $user->PHOTO }}" alt="icon-profil">
                        @else
                            <img class="avatar profilAvatar" src="images/profil/default/user.png" alt="icon-profil"/>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('profil') }}"><i class="ik ik-user dropdown-icon"></i> Profil</a>
                        <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Paramètres</a>
                        @auth
                            <form action="{{ route('logout') }}" method="post">
                                @method("delete")
                                @csrf
                                <button class="dropdown-item" href="#"><i class="ik ik-power dropdown-icon"></i> Se déconnecter</button>
                            </form>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
