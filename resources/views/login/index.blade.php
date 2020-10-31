{{-- Extends layout --}}
@extends('layout.public')

{{-- Content --}}
@section('content')

<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
        <!--begin::Aside Top-->
        <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
            <!--begin::Aside header-->
            <a href="#" class="text-center mb-10">
                <img src="assets/media/logos/logo-letter-1.png" class="max-h-70px" alt="" />
            </a>
            <!--end::Aside header-->
            <!--begin::Aside title-->
            <h3 class="text-center font-size-h4 font-size-h1-lg" style="color: #986923;">@lang('lang.passionword')</h3>
            <!--end::Aside title-->
        </div>
        <!--end::Aside Top-->
        <!--begin::Aside Bottom-->
        <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url({{asset('media/svg/illustrations/login-visual-1.svg')}})"></div>
        <!--end::Aside Bottom-->
    </div>
    <!--begin::Aside-->
    <!--begin::Content-->
    <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
        <!--begin::Content body-->
        <div class="d-flex flex-column-fluid flex-center">
            <!--begin::Signin-->
            <div class="login-form login-signin">
                <!--begin::Form-->
                <form class="form" novalidate="novalidate" id="kt_login_signin_form" method="POST" action="{{ route('restlogin') }}">
                    @csrf
                    <!--begin::Title-->
                    <div class="pb-13 pt-lg-0 pt-5">
                        <h3 class="text-dark font-size-h4 font-size-h1-lg">@lang('lang.welcome')</h3>
                        <span class="text-muted font-weight-bold font-size-h4">@lang('lang.systemdescription')</span>
                    </div>
                    @if ($message = Session::get('error'))
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            {{ $message }}
                        </div>
                    @endif                         
                    <!--begin::Title-->
                    <!--begin::Form group-->
                    <div class="form-group">
                        <label class="font-size-h6 text-dark">@lang('lang.email')</label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="email" autocomplete="off" />
                        @error('email')
                        <div style="color:#F64E60">{{ $message }}</div>
                        @enderror                                
                    </div>
                    <!--end::Form group-->
                    <!--begin::Form group-->
                    <div class="form-group">
                        <div class="d-flex justify-content-between mt-n5">
                            <label class="font-size-h6 text-dark pt-5">@lang('lang.password')</label>
                            <!-- <a href="javascript:;" class="text-primary font-size-h6 text-hover-primary pt-5" id="kt_login_forgot">Forgot Password ?</a> -->
                        </div>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off" />
                        @error('password')
                        <div style="color:#F64E60">{{ $message }}</div>
                        @enderror                           
                    </div>
                    <!--end::Form group-->
                    <!--begin::Action-->
                    <div class="pb-lg-0 pb-5">
                        <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-size-h6 px-8 py-4 my-3 mr-3">@lang('lang.login')</button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Signin-->
        </div>
        <!--end::Content body-->
        <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
            <a href="#" class="text-primary font-weight-normal">@lang('lang.poweredby')</a>
        </div>        
    </div>
    <!--end::Content-->
</div>

@endsection

{{-- Styles Section --}}
@section('styles')    
<link href="{{ asset('css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')    
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
    </script>
@endsection
