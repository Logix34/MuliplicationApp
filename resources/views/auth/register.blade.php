@extends('layouts.app')

@section('content')
    @php
        $project_id = $_GET['project_id'] ?? '';
    @endphp
    <!-- content @s -->
    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
        <div class="brand-logo pb-4 text-center">
            <a href="/" class="logo-link">
                <img class="logo-light logo-img logo-img-lg" src="{{url('/')}}/icon.png" srcset="./images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img logo-img-lg" src="{{url('/')}}/icon.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
            </a>
        </div>
        <div class="card">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Register</h4>
                        <div class="nk-block-des">
                            <p>Create New Account</p>
                        </div>
                    </div>
                </div>
                <form  method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <div class="form-control-wrap">
                            <input type="hidden" name="project_id" value="{{$project_id}}">
                            <input id="name" type="text" placeholder="Enter full name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <div class="form-control-wrap">
                            <input id="email" type="email" placeholder="Enter email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Passcode</label>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input id="password" type="password" placeholder="Enter Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Confirm Password</label>
                        <div class="form-control-wrap">

                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">

                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="/login"><strong>Sign in instead</strong></a>
                </div>
                {{--                <div class="text-center pt-4 pb-3">--}}
                {{--                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>--}}
                {{--                </div>--}}
                {{--                <ul class="nav justify-center gx-8">--}}
                {{--                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>--}}
                {{--                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>--}}
                {{--                </ul>--}}
            </div>
        </div>
    </div>
    <!-- wrap @e -->
@endsection
