@extends('layouts.base')
@section('title', 'WoodLess - User Panel')

@section('content')
<body>
    <!-- Code for sidebar -->
    <div class="wrapper">
        <aside id="sidebar">
            <div class="sidebar">
                <div class="heading">
                    <div>Hi, Welcome back to your account.
                    </div>
                <ul class="sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            My Purchases
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            My Points
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Contact Us
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Sign Out
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Invite A Friend
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
@endsection