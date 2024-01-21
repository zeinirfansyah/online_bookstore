@extends('layouts.app')
<!-- content -->
@section('content')

<div class="wrapper">
    <!-- navbar -->

    <!-- end navbar -->
    <div class="sidebar">
        <div id="sidebar" class="sidebar">
            <div class="sidebar-brand">
                <a href="/#hero" class="navbar-brand">Online Bookstore</a>
            </div>
            <div class="sidebar-menu">
                <div class="menu-list">
                    <div class="dropdown">
                        <a onclick="toggleDropdown()" class="nav-link">
                            Products
                            <i class="fa-solid fa-caret-down"></i>
                        </a>
                        <div
                            class="dropdown-content ms-2"
                            id="dropdown-content"
                            style="display: none"
                        >
                            <a
                                class="nav-link"
                                href="{{ route('books.index') }}"
                                >Books</a
                            >
                            <a href="" class="nav-link">Utilities</a>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->role === 'manager')
                <hr />
                <div class="menu-list">
                    <a class="nav-link" href="...">User Management</a>
                </div>
                @endif

                <div class="menu-list">
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link"
                        >Logout</a
                    >

                    <form
                        id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        class="d-none"
                    >
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="content">@yield('dashboard_main')</div>
</div>
<script>
    function toggleDropdown() {
        var dropdownContent = document.getElementById("dropdown-content");
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    }
</script>
