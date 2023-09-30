<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div style="display: flex; column-gap: 10px; align-items: center" class="info">
                <a class="d-block">{{$admin->name}} {{$admin->surname}}</a>
                <a onclick="return toHref(event)" style="font-size: 10px;" href="{{route('admin.logout')}}" class="btn btn-primary">çıxış et</a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.settings.index')}}" class="nav-link">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <p>
                            Tənzimləmələr
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.admins.index')}}" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <p>
                            Adminlər
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>
                            İstifadəçilər
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.categories.index')}}" class="nav-link">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <p>
                            Kategoriyalar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.home-categories.index')}}" class="nav-link">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <p>
                            Ana səhifə kateqoriyaları
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.movies.index')}}" class="nav-link">
                        <i class="fa fa-film" aria-hidden="true"></i>
                        <p>
                            Filmlər
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.series.index')}}" class="nav-link">
                        <i class="fas fa-tv"></i>

                        <p>
                            Seriallar
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('admin.documentals.index')}}" class="nav-link">
                        <i class="fas fa-tv"></i>

                        <p>
                            Sənədli filmlər
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('admin.oneseriedocumentals.index')}}" class="nav-link">
                        <i class="fas fa-tv"></i>

                        <p>
                            Bir bölmlük Sənədli filmlər
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.headersliders.index')}}" class="nav-link">
                        <i class="fab fa-slideshare"></i>

                        <p>
                            Ana səhifə slider
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('admin.pages_photos.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Page fotoları
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('admin.advertaisment.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Reklam bannerləri
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
