@extends('layouts.base')
@section('title', 'WoodLess - Admin Panel')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Welcome Admin!</h2>
            </div>
        </div>
    </div>
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
                </div>
            </nav>
        </div>
    </div>
