<div class="d-flex" id="wrapper">

@include('dashboard.partials._menu')

<!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button id="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </button>

            <div class="ml-auto">
                <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Odhlásiť sa</a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </nav>

        <div class="container-fluid dashboard">
            @include('dashboard.partials._messages')
