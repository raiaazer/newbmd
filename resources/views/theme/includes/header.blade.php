<ul class="navbar-nav">
    <li>
        <a href="{{route('birth')}}">

            <span class="title">Birth</span>
        </a>
    </li>
    <li class="opened">
        <a href="{{route('marriage')}}">

            <span class="title">Marriage</span>
        </a>
    </li>
    <li>
        <a href="{{route('death')}}">

            <span class="title">Death</span>
        </a>
    </li>
    <li>
        <a href="{{route('divorce')}}">

            <span class="title">Divorce</span>
        </a>
    </li>

</ul>


<!-- notifications and other links -->
@auth
<ul class="nav nav-userinfo navbar-right">
    <li class="dropdown user-profile">
        <a href="#" data-toggle="dropdown">
            <img src="assets/images/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
            <span>

                <i class="fa-angle-down"></i>
            </span>
        </a>
        <ul class="dropdown-menu user-profile-menu list-unstyled">
            <li>
                <a href="{{ route('edit_user') }}">
                    <i class="fa-user"></i>
                    Profile
                </a>
            </li>
            <li class="last">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    <i class="fa-lock"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </li>
</ul>
@endauth

