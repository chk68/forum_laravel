<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/forum-logo.png') }}" alt="Your brand logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-navbar-collapse" aria-controls="app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto mb-2 mb-md-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Рубрики</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/channels/create"><i class="fa fa-plus"></i>&nbsp;Нова рубрика</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @forelse ($channels as $channel)
                            <li><a class="dropdown-item" href="/threads/{{ $channel->slug }}"><i class="fa fa-hashtag"></i>{{ $channel->name }}</a></li>
                        @empty
                            <li class="dropdown-item">Поки немає рубрик</li>
                        @endforelse
                    </ul>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Теми форуму</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/threads/create"><i class="fa fa-plus"></i> &nbsp;&nbsp;Нова тема</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/"><i class="fa fa-globe"></i>&nbsp;&nbsp;Всі теми</a></li>
                        @auth
                            <li><a class="dropdown-item" href="/rules"><i class="fa fa-info"></i>&nbsp;&nbsp;Правила</a></li>

                        @endauth
                    </ul>
                </li>




            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li class="nav-item ms-3 dropdown">
                    <form action="{{ route('search')}}" method="GET" class="d-flex">
                        <input type="text" name="query" placeholder="Пошук...">
                        <button type="submit">Знайти</button>
                    </form>
                </li>
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Увійти</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Зарєструватися</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-cog" style="margin-right: 5px;"></i>{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('user', Auth::user()) }}">Моя активність</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Мій профіль</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
