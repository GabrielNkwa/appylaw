<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Mar 2020 10:09:58 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

    <title>{{ app_name() }}</title>
    <!-- Meta -->
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
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Toastr -->
    <link type="text/css" rel="stylesheet" href="/plugins/toastr/toastr.min.css"/>
    <!-- Loader -->
    <link type="text/css" rel="stylesheet" href="/plugins/loader/css-loader.css"/>
    
    
    


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Signin</h4>
                        <form method="post" action="{{ route('app_login_post') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">Email address</label>
                                <input type="text" class="form-control" id="Email" name="email" placeholder="">
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" name="password" placeholder="">
                            </div>
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Save credentials.</label>
                            </div>
                            <button class="btn btn-block btn-primary mb-4">Signin</button>
                        </form>
                        <p class="mb-2 text-muted">Forgot password? <a href="javascript:void(0)" class="f-w-400">Reset</a></p>
                        <p class="mb-0 text-muted">Don’t have an account? <a href="javascript:void(0)" class="f-w-400">Signup</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>
    
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
    @yield('script')



</body>


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Mar 2020 10:10:00 GMT -->
</html>
