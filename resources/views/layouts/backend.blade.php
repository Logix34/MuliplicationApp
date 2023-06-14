<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="description" content="Multiplication Network">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{url('/')}}/icon.png">
    <!-- Page Title  -->
    <title>Multiplication Network</title>
    <!-- StyleSheets  -->
    @yield('css')
    <link rel="stylesheet" href="{{url('/backend')}}/assets/css/dashlite.css?ver=2.9.0">
    <link id="skin-default" rel="stylesheet" href="{{url('/backend')}}/assets/css/theme.css?ver=2.9.0">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" type="text/css" href="{{url('/backend')}}/assets/css/libs/fontawesome-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Themify Icons -->
    <link rel="stylesheet" type="text/css" href="{{url('/backend')}}/assets/css/libs/themify-icons.css">

    <link rel="stylesheet" href="{{url('/backend')}}/assets/css/prolinkz.github.io_MultiplicationNetwork_assets_css_icons.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" type="text/css" href="{{url('/backend')}}/assets/css/libs/bootstrap-icons.css">
    <style>
        a.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
            <div class="nk-sidebar-element nk-sidebar-head">
                <div class="nk-sidebar-brand">
                    <a href="/" class="logo-link nk-sidebar-logo">
                        <img class="logo-light logo-img" src="{{url('/')}}/icon.png" srcset="{{url('/')}}/icon.png 2x" alt="logo">
                        <img class="logo-dark logo-img" src="{{url('/')}}/icon.png" srcset="{{url('/')}}/icon.png 2x" alt="logo-dark">
                        <img class="logo-small logo-img logo-img-small" src="{{url('/')}}/icon.png" srcset="{{url('/')}}/icon.png 2x" alt="logo-small">
                    </a>
                </div>
                <div class="nk-menu-trigger mr-n2">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                </div>
            </div><!-- .nk-sidebar-elementa -->
            <div class="nk-sidebar-element">
                <div class="nk-sidebar-content">
                    <div class="nk-sidebar-menu" data-simplebar>
                        <ul class="nk-menu">
                            <li class="nk-menu-item">
                                <a href="{{route('dashboard')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Dashboard</span>
                                </a>
                            </li>
                            @can('view_projects')
                                <li class="nk-menu-item">
                                    <a href="{{route('projects.all')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Projects</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_planters')
                                <li class="nk-menu-item">
                                    <a href="{{route('planters.all')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Planters</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_users')
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Users</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('view_users')
                                            <li class="nk-menu-item">
                                                <a href="{{route('user.all')}}" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                                    <span class="nk-menu-text">Users</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('view_roles')
                                            <li class="nk-menu-item">
                                                <a href="{{route('role.all')}}" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                                    <span class="nk-menu-text">Roles</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('view_permissions')
                                            <li class="nk-menu-item">
                                                <a href="{{route('permission.all')}}" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                                    <span class="nk-menu-text">Permissions</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                            @endcan
                            @can('view_coordinators')
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Setup</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('view_coordinators')
                                            <li class="nk-menu-item">
                                                <a href="{{route('coordinators.all')}}" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                                    <span class="nk-menu-text">Coordinators</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('view_programs')
                                            <li class="nk-menu-item">
                                                <a href="{{route('programs.all')}}" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                                    <span class="nk-menu-text">Programs</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                            @endcan
                            @role('Church Planter')
                                <li class="nk-menu-item">
                                    <a href="{{route('user.profile')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Profile</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('reports.abc.all')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Abc Report</span>
                                    </a>
                                </li>
                            @endrole
                            @unlessrole('super_admin')
{{--                            <li class="nk-menu-item">--}}
{{--                                <a href="{{route('user.business')}}" class="nk-menu-link">--}}
{{--                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>--}}
{{--                                    <span class="nk-menu-text">Profile</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            {{-- <li class="nk-menu-item">
                                <a href="{{route('user.feedback')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                                    <span class="nk-menu-text">Feedback</span>
                                </a>
                            </li> --}}
                            @endunlessrole


                        </ul><!-- .nk-menu -->
                    </div><!-- .nk-sidebar-menu -->
                </div><!-- .nk-sidebar-content -->
            </div><!-- .nk-sidebar-element -->
        </div>
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fixed is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger d-xl-none ml-n1">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand d-xl-none">
                            <a href="/" class="logo-link">
                                <img class="logo-light logo-img" src="{{url('/')}}/icon.png" srcset="{{url('/')}}/icon.png 2x" alt="logo">
                                <img class="logo-dark logo-img" src="{{url('/')}}/icon.png" srcset="{{url('/')}}/icon.png 2x" alt="logo-dark">
                            </a>
                        </div><!-- .nk-header-brand -->
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
{{--                                <li class="dropdown chats-dropdown hide-mb-xs">--}}
{{--                                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">--}}
{{--                                        <div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">--}}
{{--                                        <div class="dropdown-head">--}}
{{--                                            <span class="sub-title nk-dropdown-title">Recent Chats</span>--}}
{{--                                            <a href="#">Setting</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="dropdown-body">--}}
{{--                                            <ul class="chat-list">--}}
{{--                                                <li class="chat-item">--}}
{{--                                                    <a class="chat-link" href="html/apps-chats.html">--}}
{{--                                                        <div class="chat-media user-avatar">--}}
{{--                                                            <span>IH</span>--}}
{{--                                                            <span class="status dot dot-lg dot-gray"></span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="chat-info">--}}
{{--                                                            <div class="chat-from">--}}
{{--                                                                <div class="name">Iliash Hossain</div>--}}
{{--                                                                <span class="time">Now</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat-context">--}}
{{--                                                                <div class="text">You: Please confrim if you got my last messages.</div>--}}
{{--                                                                <div class="status delivered">--}}
{{--                                                                    <em class="icon ni ni-check-circle-fill"></em>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li><!-- .chat-item -->--}}
{{--                                                <li class="chat-item is-unread">--}}
{{--                                                    <a class="chat-link" href="html/apps-chats.html">--}}
{{--                                                        <div class="chat-media user-avatar bg-pink">--}}
{{--                                                            <span>AB</span>--}}
{{--                                                            <span class="status dot dot-lg dot-success"></span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="chat-info">--}}
{{--                                                            <div class="chat-from">--}}
{{--                                                                <div class="name">{{Auth::user()->name}}</div>--}}
{{--                                                                <span class="time">4:49 AM</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat-context">--}}
{{--                                                                <div class="text">Hi, I am Ishtiyak, can you help me with this problem ?</div>--}}
{{--                                                                <div class="status unread">--}}
{{--                                                                    <em class="icon ni ni-bullet-fill"></em>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li><!-- .chat-item -->--}}
{{--                                                <li class="chat-item">--}}
{{--                                                    <a class="chat-link" href="html/apps-chats.html">--}}
{{--                                                        <div class="chat-media user-avatar">--}}
{{--                                                            <img src="{{url('/backend')}}/images/avatar/b-sm.jpg" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="chat-info">--}}
{{--                                                            <div class="chat-from">--}}
{{--                                                                <div class="name">George Philips</div>--}}
{{--                                                                <span class="time">6 Apr</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat-context">--}}
{{--                                                                <div class="text">Have you seens the claim from Rose?</div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li><!-- .chat-item -->--}}
{{--                                                <li class="chat-item">--}}
{{--                                                    <a class="chat-link" href="html/apps-chats.html">--}}
{{--                                                        <div class="chat-media user-avatar user-avatar-multiple">--}}
{{--                                                            <div class="user-avatar">--}}
{{--                                                                <img src="{{url('/backend')}}/images/avatar/c-sm.jpg" alt="">--}}
{{--                                                            </div>--}}
{{--                                                            <div class="user-avatar">--}}
{{--                                                                <span>AB</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="chat-info">--}}
{{--                                                            <div class="chat-from">--}}
{{--                                                                <div class="name">Softnio Group</div>--}}
{{--                                                                <span class="time">27 Mar</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat-context">--}}
{{--                                                                <div class="text">You: I just bought a new computer but i am having some problem</div>--}}
{{--                                                                <div class="status sent">--}}
{{--                                                                    <em class="icon ni ni-check-circle"></em>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li><!-- .chat-item -->--}}
{{--                                                <li class="chat-item">--}}
{{--                                                    <a class="chat-link" href="html/apps-chats.html">--}}
{{--                                                        <div class="chat-media user-avatar">--}}
{{--                                                            <img src="{{url('/backend')}}/images/avatar/a-sm.jpg" alt="">--}}
{{--                                                            <span class="status dot dot-lg dot-success"></span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="chat-info">--}}
{{--                                                            <div class="chat-from">--}}
{{--                                                                <div class="name">Larry Hughes</div>--}}
{{--                                                                <span class="time">3 Apr</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat-context">--}}
{{--                                                                <div class="text">Hi Frank! How is you doing?</div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li><!-- .chat-item -->--}}
{{--                                                <li class="chat-item">--}}
{{--                                                    <a class="chat-link" href="html/apps-chats.html">--}}
{{--                                                        <div class="chat-media user-avatar bg-purple">--}}
{{--                                                            <span>TW</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="chat-info">--}}
{{--                                                            <div class="chat-from">--}}
{{--                                                                <div class="name">Tammy Wilson</div>--}}
{{--                                                                <span class="time">27 Mar</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="chat-context">--}}
{{--                                                                <div class="text">You: I just bought a new computer but i am having some problem</div>--}}
{{--                                                                <div class="status sent">--}}
{{--                                                                    <em class="icon ni ni-check-circle"></em>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li><!-- .chat-item -->--}}
{{--                                            </ul><!-- .chat-list -->--}}
{{--                                        </div><!-- .nk-dropdown-body -->--}}
{{--                                        <div class="dropdown-foot center">--}}
{{--                                            <a href="html/apps-chats.html">View All</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="dropdown notification-dropdown">--}}
{{--                                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">--}}
{{--                                        <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">--}}
{{--                                        <div class="dropdown-head">--}}
{{--                                            <span class="sub-title nk-dropdown-title">Notifications</span>--}}
{{--                                            <a href="#">Mark All as Read</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="dropdown-body">--}}
{{--                                            <div class="nk-notification">--}}
{{--                                                <div class="nk-notification-item dropdown-inner">--}}
{{--                                                    <div class="nk-notification-icon">--}}
{{--                                                        <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="nk-notification-content">--}}
{{--                                                        <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>--}}
{{--                                                        <div class="nk-notification-time">2 hrs ago</div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="nk-notification-item dropdown-inner">--}}
{{--                                                    <div class="nk-notification-icon">--}}
{{--                                                        <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="nk-notification-content">--}}
{{--                                                        <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>--}}
{{--                                                        <div class="nk-notification-time">2 hrs ago</div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="nk-notification-item dropdown-inner">--}}
{{--                                                    <div class="nk-notification-icon">--}}
{{--                                                        <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="nk-notification-content">--}}
{{--                                                        <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>--}}
{{--                                                        <div class="nk-notification-time">2 hrs ago</div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="nk-notification-item dropdown-inner">--}}
{{--                                                    <div class="nk-notification-icon">--}}
{{--                                                        <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="nk-notification-content">--}}
{{--                                                        <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>--}}
{{--                                                        <div class="nk-notification-time">2 hrs ago</div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="nk-notification-item dropdown-inner">--}}
{{--                                                    <div class="nk-notification-icon">--}}
{{--                                                        <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="nk-notification-content">--}}
{{--                                                        <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>--}}
{{--                                                        <div class="nk-notification-time">2 hrs ago</div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="nk-notification-item dropdown-inner">--}}
{{--                                                    <div class="nk-notification-icon">--}}
{{--                                                        <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="nk-notification-content">--}}
{{--                                                        <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>--}}
{{--                                                        <div class="nk-notification-time">2 hrs ago</div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div><!-- .nk-notification -->--}}
{{--                                        </div><!-- .nk-dropdown-body -->--}}
{{--                                        <div class="dropdown-foot center">--}}
{{--                                            <a href="#">View All</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                                <li class="dropdown user-dropdown">
                                    <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm">
                                                <em class="icon ni ni-user-alt"></em>
                                            </div>
                                            <div class="user-info d-none d-xl-block">
                                                @php
                                                $roles=Auth::user()->getRoleNames()->toArray();
                                                @endphp
                                                <div class="user-status user-status-active">@foreach($roles as $key=>$role) {{str_replace('_',' ',$role)}} @if($key+1!=count($roles)) ,@endif @endforeach</div>
                                                <div class="user-name dropdown-indicator">{{Auth::user()->name}}</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{Auth::user()->name}}</span>
                                                    <span class="sub-text">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="{{route('user.profile')}}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
{{--                                                <li><a href="html/ecommerce/user-profile.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>--}}
{{--                                                <li><a href="html/ecommerce/user-profile.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>--}}
{{--                                                <li><a href="html/ecommerce/user-profile.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>--}}
                                                <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="javascript:void(0)" onclick="$('#logout-form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                            </ul>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-header-wrap -->
                </div><!-- .container-fliud -->
            </div>
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-footer">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright"> &copy; {{date('Y')}} Copyright reserved to Multiplication Network</a>
                        </div>
{{--                        <div class="nk-footer-links">--}}
{{--                            <ul class="nav nav-sm">--}}
{{--                                <li class="nav-item dropup">--}}
{{--                                    <a herf="#" class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>English</span></a>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">--}}
{{--                                        <ul class="language-list">--}}
{{--                                            <li>--}}
{{--                                                <a href="#" class="language-item">--}}
{{--                                                    <span class="language-name">English</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" class="language-item">--}}
{{--                                                    <span class="language-name">Español</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" class="language-item">--}}
{{--                                                    <span class="language-name">Français</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" class="language-item">--}}
{{--                                                    <span class="language-name">Türkçe</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="#" data-toggle="modal" data-target="#region" class="nav-link"><em class="icon ni ni-globe"></em><span class="ml-1">Select Region</span></a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<div class="nk-add-product toggle-slide toggle-slide-right" data-content="formTier" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="ajax_form">
        <div class="d-flex justify-content-center">  <div class="spinner-border" role="status">    <span class="sr-only">Loading...</span>  </div></div>
    </div>
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{url('/backend')}}/assets/js/bundle.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/scripts.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/charts/chart-ecommerce.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/example-toastr.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/example-sweetalert.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/libs/datatable-btns.js?ver=2.9.0"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    $( document ).ready(function() {
        // $.fn.successToast('aaaaaa');
        if ('{{session()->has('success')}}'){
            $.fn.successToast('{{ session()->get('success') }}');
        }else if('{{session()->has('error')}}'){
            $.fn.errorToast('{{ session()->get('error') }}');
        }else if('{{$errors->any()}}'){
            var arrayFromPHP = <?php echo json_encode($errors->all()); ?>;
            $( arrayFromPHP ).each(function( index ) {
                $.fn.errorToast(this);
            });
        }
    });
    function openToast(status, message){
        if (status === 'success'){
            $.fn.successToast(message);
        }else if(status === 'error'){
            $.fn.errorToast(message);
        }
    }
    function get_form(model, mode, id = ''){
        var url = '/'+model+'/form/'+mode+'/'+id;
        $.get(url, function (data) {
            $('.ajax_form').html(data);
        })
    }
    function delete_record(model,record_id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                var url = '/'+model+'/delete/'+record_id;
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax(
                    {
                        url: url,
                        type: 'DELETE',
                        data: {
                            "id": record_id,
                            "_token": token,
                        },
                        success: function () {
                            Swal.fire('Deleted!', 'Record has been deleted.', 'success');
                            location.reload()
                        }
                    });
            }
        });
    }
    function get_data(route){
        $.get(route, function (data) {
            $('#modal_data').html(data);
        })
    }
</script>
@yield('script')
</body>

</html>



