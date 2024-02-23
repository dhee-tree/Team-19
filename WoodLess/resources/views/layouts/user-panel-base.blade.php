@extends('layouts.base')
@section('title', 'WoodLess - User Panel')

@section('style')
<link rel="stylesheet" href="{{ asset('css/user-panel.css')}}">
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection

@section('content')
    <!-- Code for sidebar -->
    <div class="wrapper">
        <aside id="sidebar">
            <div class="sidebar-list">
                <div class="heading">
                    <p>Hi, Welcome back to your account.</p>
                </div>
                <ul class="sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('user-panel') }}" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('user.purchases') }}" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            My Purchases
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/user-panel/tickets')}}" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Tickets
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('user-details')}}" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            My Details
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('password.change.form') }}" class="sidebar-link">
                            <i class="fa-solid fa-lock" style="color: #e8e8e8;"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class="sidebar-link"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket" style="color:#e8e8e8; margin-right:10px;"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </aside>

        @yield('main')

        <div class="main content">
           @yield('banner')
           @yield('page-content')
        </div> 

    </div>
@endsection
