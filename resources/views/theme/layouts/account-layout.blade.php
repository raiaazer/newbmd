@extends('theme.layouts.layout')
@section('body')
<div class="container-fluid">
<br>
<div class="page-container page-body">
<div class="sidebar-menu toggle-others">

    <div class="sidebar-menu-inner">
        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li>
                <a href="{{ route('detail') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="title">ORDERS</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="title">MEMBERSHIPS</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-download"></i>
                    <span class="title">DOWNLOADS</span>
                </a>
            </li>
            <li>
                <a href="{{ route('edit_user') }}">
                    <i class="fas fa-user"></i>
                    <span class="title">EDIT DETAILS</span>
                </a>
            </li>
            <li>
                <a href="action="{{ route('logout') }}"">
                    <i class="fa fa-sign-out"></i>
                    <span class="title">LOGOUT</span>
                </a>
            </li>
        </ul>
    </div>

</div>
<div class="container-fluid">
    @yield('account_section')
</div>
</div>

</div>

@endsection
