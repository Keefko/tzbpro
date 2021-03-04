
    <nav class="navbar navbar-expand-lg bg-transparent fixed-top" id="navbar">
        <a class="navbar-brand" href="#">TZBpro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <div class="navbar-toggler-inner"></div>
            </div>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php $public_menu = Menu::getByName('Main'); ?>
        @if($public_menu)
            <ul class="navbar-nav ml-auto">
                @foreach($public_menu as $menu)
                    @if( $menu['child'] )
                        <li class="nav-item dropdown">
                            <a href="{{ $menu['link'] }}" title="" class="nav-link">{{ $menu['label'] }}</a>
                            <ul class="dropdown-menu">
                                @foreach( $menu['child'] as $child )
                                    <li class=""><a href="{{ $child['link'] }}" title="" class="dropdown-item">{{ $child['label'] }}</a></li>
                                @endforeach
                            </ul><!-- /.sub-menu -->
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ $menu['link'] }}" title="" class="nav-link">{{ $menu['label'] }}</a>
                        </li>
                    @endif
                @endforeach

                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard') }}">Admin panel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            Odhlásiť sa
                        </a>
                    </li>

                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif

            </ul>
        @endif
    </div><!-- /.navbar-collapse -->
</nav>

