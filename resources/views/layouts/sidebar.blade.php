                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ url('/') }}"><span class="fa-solid fa-chalkboard-user"></span> {{ config('app.name') }}</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ url('/') }}"><span class="fa-solid fa-chalkboard-user"></span></a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

                        @canany(['permissions-read', 'roles-read', 'users-read'])
                            <li class="menu-header"><i>Autentikasi</i></li>
                            {{-- @can('permissions-read')
                                <li class="{{ Request::is('permissions*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/permissions') }}"><i class="fas fa-user-cog"></i> <span>Hak Akses</span></a></li>
                            @endcan
                            @can('roles-read')
                                <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/roles') }}"><i class="fas fa-user-lock"></i> <span>Peran</span></a></li>
                            @endcan --}}
                            @can('users-read')
                                <li class="{{ Request::is('users*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/users') }}"><i class="fas fa-user"></i> <span>User</span></a></li>
                            @endcan
                        @endcanany

                        @canany(['students-read', 'lecturers-read', 'studyprograms-read'])
                            <li class="menu-header"><i>Master Data</i></li>
                            @can('lecturers-read')
                                <li class="{{ Request::is('lecturers*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/lecturers') }}"><i class="fas fa-clipboard-user"></i> <span>Dosen</span></a></li>
                            @endcan
                            @can('students-read')
                                <li class="{{ Request::is('students*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/students') }}"><i class="fas fa-user-graduate"></i> <span>Mahasiswa</span></a></li>
                            @endcan
                            @can('studyprograms-read')
                                <li class="{{ Request::is('studyprograms*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/studyprograms') }}"><i class="fas fa-list"></i> <span>Program Studi</span></a></li>
                            @endcan
                        @endcanany

                        @canany(['activities-read'])
                            <li class="menu-header"><i>Kegiatan</i></li>
                            @can('activities-read')
                                @role('administrator')
                                    <li class="{{ Request::is('activities*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/activities') }}"><i class="fas fa-house"></i> <span>KKN</span></a></li>]
                                @else
                                    <li class="{{ Request::is('activities*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/activities') }}"><i class="fas fa-house"></i> <span>KKN</span></a></li>
                                    <li class="{{ Request::is('maps*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/maps') }}"><i class="fas fa-map"></i> <span>Sebaran KKN</span></a></li>
                                @endrole
                            @endcan
                        @endcanany

                    </ul>
                </aside>
