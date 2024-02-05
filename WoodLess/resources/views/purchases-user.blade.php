@extends('layouts.base')
@section('title', 'WoodLess - User Panel')

@section('style')
<link rel="stylesheet" href="{{ asset('css/user-panel.css')}}">
@endsection

@section('content')
    <!-- Code for sidebar -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            <i class="fa-regular fa-circle-check fa-fade"></i> <span>{{ session('success') }}</span>
        </div>
    @endif
    <div class="wrapper">

        <aside id="sidebar">
            <div class="sidebar-list">
                <div class="heading">
                <p>Hi, Welcome to your orders.</p>
                </div>
                <ul class="sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/user-panel/purchases')}}" class="sidebar-link">
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

    </div>

@endsection