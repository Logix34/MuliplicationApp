<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="{{url('/back')}}">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multiplication Network">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{url('/')}}/icon.png">
    <!-- Page Title  -->
    <title>Multiplication Network</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{url('/')}}/backend/assets/css/dashlite.css?ver=2.9.0">
    <link id="skin-default" rel="stylesheet" href="{{url('/')}}/backend/assets/css/theme.css?ver=2.9.0">
</head>

<body class="nk-body bg-white npc-default pg-auth ">
<div class="nk-app-root ">
    <!-- main @s -->
    <div class="nk-main  ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar ">
            <div class="nk-content ">
                @yield('content')
                <div class="nk-footer nk-auth-footer-full">
                    <div class="container wide-lg">
                        <div class="row g-3">
                            <div class="col-lg-6 order-lg-last">
                                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{route('terms_conditions')}}">Terms & Condition</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{route('privacy_policy')}}">Privacy Policy</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{route('contact')}}">Help</a>--}}
{{--                                    </li>--}}
                                    {{--                        <li class="nav-item dropup">--}}
                                    {{--                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>English</span></a>--}}
                                    {{--                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">--}}
                                    {{--                                <ul class="language-list">--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#" class="language-item">--}}
                                    {{--                                            <img src="{{url('/')}}/backend/images/flags/english.png" alt="" class="language-flag">--}}
                                    {{--                                            <span class="language-name">English</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#" class="language-item">--}}
                                    {{--                                            <img src="{{url('/')}}/backend/images/flags/spanish.png" alt="" class="language-flag">--}}
                                    {{--                                            <span class="language-name">Español</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#" class="language-item">--}}
                                    {{--                                            <img src="{{url('/')}}/backend/images/flags/french.png" alt="" class="language-flag">--}}
                                    {{--                                            <span class="language-name">Français</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#" class="language-item">--}}
                                    {{--                                            <img src="{{url('/')}}/backend/images/flags/turkey.png" alt="" class="language-flag">--}}
                                    {{--                                            <span class="language-name">Türkçe</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                </ul>--}}
                                    {{--                            </div>--}}
                                    {{--                        </li>--}}
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="nk-block-content text-center text-lg-left">
                                    <p class="site-footer__bottom-text">&copy; {{date('Y')}} Copyright reserved to Multiplication Network</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{url('/')}}/backend/assets/js/bundle.js?ver=2.9.0"></script>
<script src="{{url('/')}}/backend/assets/js/scripts.js?ver=2.9.0"></script>
<!-- select region modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="region">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4">Select Your Country</h5>
                <div class="nk-country-region">
                    <ul class="country-list text-center gy-2">
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/arg.png" alt="" class="country-flag">
                                <span class="country-name">Argentina</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/aus.png" alt="" class="country-flag">
                                <span class="country-name">Australia</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/bangladesh.png" alt="" class="country-flag">
                                <span class="country-name">Bangladesh</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/canada.png" alt="" class="country-flag">
                                <span class="country-name">Canada <small>(English)</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/china.png" alt="" class="country-flag">
                                <span class="country-name">Centrafricaine</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/china.png" alt="" class="country-flag">
                                <span class="country-name">China</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/french.png" alt="" class="country-flag">
                                <span class="country-name">France</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/germany.png" alt="" class="country-flag">
                                <span class="country-name">Germany</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/iran.png" alt="" class="country-flag">
                                <span class="country-name">Iran</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/italy.png" alt="" class="country-flag">
                                <span class="country-name">Italy</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/mexico.png" alt="" class="country-flag">
                                <span class="country-name">México</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/philipine.png" alt="" class="country-flag">
                                <span class="country-name">Philippines</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/portugal.png" alt="" class="country-flag">
                                <span class="country-name">Portugal</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/s-africa.png" alt="" class="country-flag">
                                <span class="country-name">South Africa</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/spanish.png" alt="" class="country-flag">
                                <span class="country-name">Spain</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/switzerland.png" alt="" class="country-flag">
                                <span class="country-name">Switzerland</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/uk.png" alt="" class="country-flag">
                                <span class="country-name">United Kingdom</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{url('/')}}/backend/images/flags/english.png" alt="" class="country-flag">
                                <span class="country-name">United State</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->

</html>