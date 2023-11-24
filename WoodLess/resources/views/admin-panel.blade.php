@extends('layouts.base')
@section('title', 'WoodLess - Admin Panel')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-panel.css') }}" >
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Heading</div>
                    <a href="" class="nav-link">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Users
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Warehouse
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <!-- User details -->
                    </div>
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Header</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item">Dash</li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p class="mb-0">

                                    </p>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </nav>
        </div>
    </div>
