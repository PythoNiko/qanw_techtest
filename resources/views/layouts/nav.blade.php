<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">{{config('app.name')}}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{Request::is('albums*') ? 'active' : null}}">
                <a class="nav-link" href="{{route('albums.index')}}">Albums</a>
            </li>
            <li class="nav-item {{Request::is('users*') ? 'active' : null}}">
                <a class="nav-link" href="{{route('users.index')}}">Users</a>
            </li>
        </ul>
    </div>
</nav>
