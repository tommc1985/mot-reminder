<!-- Main Nav -->
<header class="fullwidth-sm header sb-slide">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="logo">
            <span>MPK Autos</span>
        </a>

        <nav class="nav nav-primary">
            <a href="{{ route('dashboard') }}" class="active">Home</a>
            <a href="{{ route('mots.index') }}">MOTs</a>
            <a href="{{ route('messages.index') }}">Messages</a>
            <a href="{{ route('auth.logout') }}">Logout</a>
        </nav>

        <a href="#" class="nav-mobile-toggle sb-toggle-right">
            <i class="icon-navicon"></i>
        </a>
    </div>
</header>

<div class="sb-slidebar sb-right">
    <nav class="nav-mobile">
        <ul>
            <li><a href="{{ route('dashboard') }}" class="">Home</a>
                <span class="nav-mobile-close"><i class="icon-close"></i></span>
            </li>
            <li><a href="{{ route('mots.index') }}" class="">MOTs</a></li>
            <li><a href="{{ route('messages.index') }}" class="">Messages</a></li>
            <li><a href="{{ route('auth.logout') }}" class="">Logout</a></li>
        </ul>
    </nav>
</div>