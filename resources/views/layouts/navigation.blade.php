<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('companies.index') }}">CompanyApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ request()->routeIs('companies.index') ? 'active' : '' }}"">
                <a class="nav-link" href="{{ route('companies.index') }}">Companies <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ request()->routeIs('employees.index') ? 'active' : '' }}"">
                <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">{{ __('Log Out') }}</a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>