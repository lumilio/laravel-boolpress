<nav  class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="me-3" href="{{ url('/') }}"><i style='font-size:30px;' class="fas fa-home"></i></a>
        <a class="text-black me-3" href="{{route('guest.products.index')}}">Products</a>
        <a class="text-black me-3" href="{{route('guest.posts.index')}}">Blog</a>
        <a class="text-black me-3" href="{{route('guest.contact.us')}}">Contact Us</a>    <!-- start mailable -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- left Side Of Navbar -->
            <ul class="navbar-nav d-flex ms-auto">
            </ul>
            <!-- right Side Of Navbar -->
            <ul class="navbar-nav m-0 d-flex flex-end">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                    @else
                    <li class=" nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"href="{{ route('admin.dashboard') }}">My Admin</a>
                            <a class="dropdown-item" href="{{url('/')}}">Pagina vetrina Home</a>
                            <a class="dropdown-item" href="#">Modifica profilo admin</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>