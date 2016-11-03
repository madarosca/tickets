<?php

function activateTab($route) {

    $current_route = Route::getCurrentRoute()->uri();

    $active = 'class="active"';

    if ($current_route == $route) {
        return $active;
    }

    return '';
    
}
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}" class="logo"></img> Ticket Management</a>
        </div>

        <!-- Navbar Right -->
            
            @if (Auth::guest())
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" <?= activateTab('users/register') ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member
                    <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/users/register">Register</a></li>
                    <li><a href="/login">Login</a></li>
                </ul>
            </li>
            @else
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            <li><a href="/home" <?= activateTab('home') ?>>Home</a></li>
            <li><a href="/tickets" <?= activateTab('tickets') ?>>View tickets</a></li>
            <li><a href="/tickets/create" <?= activateTab('tickets/create') ?>>Create ticket</a></li>
            <li class="dropdown">
                <a href="#" <?= activateTab('profile/edit') ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="/profile/edit">My Profile</a>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endif
            </ul>
        </div>
    </div>
</nav>
