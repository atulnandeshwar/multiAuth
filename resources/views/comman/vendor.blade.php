@auth('vendor')   
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        
                        <a class="dropdown-item" href="{{ route('vendor.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('vendor.logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                    </div>
                    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="get" class="d-none">
                            @csrf
                        </form>
                    </div> --}}
                </li>
            @else
                
                    @if (Route::has('vendor.login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vendor.login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('vendor.register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vendor.register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                
            @endauth