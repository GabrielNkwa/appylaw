<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>{{ app_name() }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="{{ app_name() }}" />
    <!-- Hotjar Tracking Code for http://ableproadmin.com/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1629434,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <!-- Favicon icon -->
    <link rel="icon" href="/image/appyicon.png" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Toastr -->
    <link type="text/css" rel="stylesheet" href="/plugins/toastr/toastr.min.css"/>
    <!-- Loader -->
    <link type="text/css" rel="stylesheet" href="/plugins/loader/css-loader.css"/>
    <!-- Summernote css -->
    <link href="/plugins/summernote/summernote-bs4.css" rel="stylesheet">
    
    

</head>
<body class="">
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div " >
                
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="/assets/images/user/user.png" alt="User-Profile-Image">
                        <div class="user-details">
                            <div id="more-details">Admin <i class="fa fa-caret-down"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ route('profile') }}" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                            <li class="list-inline-item"><a onclick="return confirm('are you sure you want to logout of the system')" href="{{ route('app_logout') }}" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fa fa-th-large"></i>
                            </span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    </li>
                    @if(user()->tenant_id == 1)
                    <li class="nav-item">
                        <a href="{{ route('admins') }}" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fa fa-folder-open"></i>
                            </span>
                            <span class="pcoded-mtext">Admins</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('users') }}" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fa fa-users"></i>
                            </span>
                            <span class="pcoded-mtext">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category') }}" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fa fa-sort-amount-down"></i>
                            </span>
                            <span class="pcoded-mtext">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('document') }}" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fa fa-book"></i>
                            </span>
                            <span class="pcoded-mtext">Document</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('event') }}" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <span class="pcoded-mtext">Events</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blogs') }}" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fa fa-file"></i>
                            </span>
                            <span class="pcoded-mtext">Blogs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lawyer') }}" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fa fa-address-book"></i>
                            </span>
                            <span class="pcoded-mtext">Lawyers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mailer') }}" class="nav-link ">
                            <span class="pcoded-micon">
                                <i class="fa fa-mail-bulk"></i>
                            </span>
                            <span class="pcoded-mtext">Mailer</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        
            
                <div class="m-header">
                    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                    <a href="#!" class="b-brand">
                        <!-- ========   change your logo hear   ============ -->
                        <img src="/image/appylogo.png" alt="" class="logo">
                    </a>
                    <a href="#!" class="mob-toggler">
                        <i class="feather icon-more-vertical"></i>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                            <div class="search-bar">
                                <form action="{{ route('document') }}">
                                    <input name="search" type="text" class="form-control border-0 shadow-none" placeholder="Search document">
                                    <button type="submit" class="close" aria-label="Close">
                                        <span aria-hidden="true"><i class="fas fa-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <div class="dropdown drp-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-notification">
                                    <div class="pro-head">
                                        <img src="/assets/images/user/user.png" class="img-radius" alt="User-Profile-Image">
                                        <span>{{ user()->name }}</span>
                                        <a onclick="return confirm('are you sure you want to logout of the system')" href="{{ route('app_logout') }}" class="dud-logout" title="Logout">
                                            <i class="feather icon-log-out"></i>
                                        </a>
                                    </div>
                                    <ul class="pro-body">
                                        <li><a href="{{ route('profile') }}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                        <li><a onclick="return confirm('are you sure you want to logout of the system')" href="{{ route('app_logout') }}" class="dropdown-item"><i class="feather icon-lock"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                
            
    </header>
    <!-- [ Header ] end -->
    
    

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        @yield('content')

    </div>
</div>
<!-- Button trigger modal -->

    <!-- Required Js -->
    <script src="/assets/js/vendor-all.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/ripple.js"></script>
    <script src="/assets/js/pcoded.min.js"></script>

<!--Summernote js-->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<script>

    jQuery(document).ready(function(){

        $('.summernote').summernote({
            height: 200,                 // set editor height
            color: '#000',
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor

            focus: true                 // set focus to editable area after initializing summernote
        });

    });
</script>
<script>
    $(document).ready(function() {
        checkCookie();
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var ticks = getCookie("modelopen");
        if (ticks != "") {
            ticks++ ;
            setCookie("modelopen", ticks, 1);
            if (ticks == "2" || ticks == "1" || ticks == "0") {
                $('#exampleModalCenter').modal();
            }
        } else {
            // user = prompt("Please enter your name:", "");
            $('#exampleModalCenter').modal();
            ticks = 1;
            setCookie("modelopen", ticks, 1);
        }
    }
</script>
    
    <!-- Toastr Script -->
    <script src="/plugins/toastr/toastr.min.js"></script>
    
    <script type="text/javascript">
    function toast(type, body){
        toastr.options.closeButton = true;
        toastr.options.positionClass = 'toast-top-right';    
        toastr[type](body);
    }
    </script>

    @if(session()->has('message'))
        <script>
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-top-right';    
            toastr["{{ session()->get('message')['type'] }}"]("{{ session()->get('message')['body'] }}");
        </script>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';    
                toastr["error"]("{{ $error }}");
            </script>
        @endforeach
    @endif
    @yield('scripts')


</body>


<!-- Mirrored from ableproadmin.com/bootstrap/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Mar 2020 10:07:24 GMT -->
</html>
