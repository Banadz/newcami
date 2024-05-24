@php
    $user = Auth::user();
    $type = $user->TYPE;
@endphp
<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="dashbord">
            <div class="logo-img">
               <img src="images/2_1@300x.png" class="header-brand-img" alt="lavalite" width="200%">
            </div>
            {{-- <span class="text">ThemeKit</span> --}}
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Accueil</div>
                <div class="nav-item active">
                    <a href="dashbord"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>
                <div class="nav-lavel">Article & Stock</div>
                @if ($type == 'Admin')
                    <div class="nav-item">
                        <a href="article"><i class="ik ik-box"></i><span>Article</span></a>

                    </div>
                    <div class="nav-item">
                        <a href="demande"><i class="ik ik-navigation"></i><span>Demande</span> <span class="badge badge-success">New</span></a>

                    </div>
                @endif
                @if ($type == 'Super Admin')
                    <div class="nav-item">
                        <a href="article"><i class="ik ik-box"></i><span>Article</span></a>

                    </div>

                    <div class="nav-item">
                        <a href="demande"><i class="ik ik-navigation"></i><span>Demande</span> <span class="badge badge-success">New</span></a>

                    </div>
                @endif
                @if ($type == 'Master')
                    <div class="nav-item">
                        <a href="article"><i class="ik ik-box"></i><span>Article</span></a>

                    </div>

                    <div class="nav-item">
                        <a href="demande"><i class="ik ik-navigation"></i><span>Demande</span> <span class="badge badge-success">New</span></a>

                    </div>
                @endif
                @if ($type == 'User')
                    <div class="nav-item">
                        <a href="newDemande"><i class="ik ik-navigation"></i><span>Demande</span>
                            <span class="badge badge-success">New</span>
                        </a>
                    </div>
                @endif

                <div class="nav-lavel">Matériels & Patrimoine</div>
                @if ($type == 'Admin')
                <div class="nav-item">
                    <a href="materiel"><i class="ik ik-package"></i><span>Matériels</span></a>
                </div>
                @endif
                <div class="nav-item">
                    <a href="pages/form-picker.html"><i class="ik ik-clipboard"></i><span>Détenteur</span> <span class="badge badge-success">New</span></a>
                </div>

                {{-- <div class="nav-lavel">Oragnisation et Paramètre</div>
                <div class="nav-item">
                    <a href="/service"><i class="ik ik-shield"></i><span>Service</span></a>
                    <a href="/division"><i class="ik ik-codepen"></i><span>Division</span></a>
                    <a href="/agent"><i class="ik ik-users"></i><span>Agent</span></a>
                </div> --}}
                @if ($type == 'Super Admin')
                <div class="nav-lavel">Configuration</div>
                <div class="nav-item">
                    <a href="pages/calendar.html"><i class="ik ik-calendar"></i><span>Insertion multiple</span></a>
                </div>
                @endif


            </nav>
        </div>
    </div>
</div>
