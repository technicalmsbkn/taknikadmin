<!DOCTYPE html>
<html lang="en">
    {{--begin::Head--}}
    <head>
        <meta charset="utf-8"/>
        <title>
            Taknik Admin
        </title>
        <meta content="Taknik Admin | Login" name="description"/>
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
        {{--begin::Fonts--}}
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"/>
        {{--end::Fonts--}}
        {{--begin::Page Custom Styles(used by this page)--}}
        <link href="assets/css/pages/login/login-2.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        {{--end::Page Custom Styles--}}
        {{--begin::Global Theme Styles(used by all pages)--}}
        <link href="assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        {{--end::Global Theme Styles--}}
        {{--begin::Layout Themes(used by all pages)--}}
        <link href="assets/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        {{--end::Layout Themes--}}
        {{-- <link href="logo.png" rel="shortcut icon"/> --}}
    </head>
    {{--end::Head--}}
    {{--begin::Body--}}
    <body class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading" id="kt_body">
        {{--begin::Main--}}
        <div class="d-flex flex-column flex-root">
            {{--begin::Login--}}
            <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
                {{--begin::Aside--}}
                <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
                    {{--begin: Aside Container--}}
                    <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
                        {{--begin::Logo--}}
                        <a class="text-center pt-2" href="#">
                            {{-- <img alt="" class="max-h-75px" src="logo.png"/> --}}
                        </a>
                        {{--end::Logo--}}
                        {{--begin::Aside body--}}
                        <div class="d-flex flex-column-fluid flex-column flex-center">
                            {{--begin::Signin--}}
                            <div class="login-form login-signin py-11">
                                @if(count($errors)>0)
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                                </div>
                                @endif
                                {{--begin::Form--}}
                                <form action="/login" class="form" id="kt_login_signin_form" method="post" novalidate="novalidate">
                                    @csrf
                                    {{--begin::Title--}}
                                    <div class="text-center pb-8">
                                        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">
                                            Sign In
                                        </h2>
                                        {{--
                                        <span class="text-muted font-weight-bold font-size-h4">
                                            Or
                                            <a class="text-primary font-weight-bolder" href="" id="kt_login_signup">
                                                Create An Account
                                            </a>
                                        </span>
                                        --}}
                                    </div>
                                    {{--end::Title--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            E-Mail
                                        </label>
                                        <input autocomplete="off" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" name="email" type="text"/>
                                    </div>
                                    {{--end::Form group--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between mt-n5">
                                            <label class="font-size-h6 font-weight-bolder text-dark pt-5">
                                                Password
                                            </label>
                                            <a class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" href="javascript:;" id="kt_login_forgot">
                                                Forgot Password ?
                                            </a>
                                        </div>
                                        <input autocomplete="off" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" name="password" type="password"/>
                                    </div>
                                    {{--end::Form group--}}
                                    {{--begin::Action--}}
                                    <div class="text-center pt-2">
                                        <button class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3" id="kt_login_signin_submit" type="submit">
                                            Sign In
                                        </button>
                                    </div>
                                    {{--end::Action--}}
                                </form>
                                {{--end::Form--}}
                            </div>
                            {{--end::Signin--}}
                            {{--begin::Signup--}}
                            <div class="login-form login-signup pt-11">
                                {{--begin::Form--}}
                                <form class="form" id="kt_login_signup_form" novalidate="novalidate">
                                    {{--begin::Title--}}
                                    <div class="text-center pb-8">
                                        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">
                                            Sign Up
                                        </h2>
                                        <p class="text-muted font-weight-bold font-size-h4">
                                            Enter your details to create your account
                                        </p>
                                    </div>
                                    {{--end::Title--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" name="fullname" placeholder="Fullname" type="text"/>
                                    </div>
                                    {{--end::Form group--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" name="email" placeholder="Email" type="email"/>
                                    </div>
                                    {{--end::Form group--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" name="password" placeholder="Password" type="password"/>
                                    </div>
                                    {{--end::Form group--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" name="cpassword" placeholder="Confirm password" type="password"/>
                                    </div>
                                    {{--end::Form group--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group">
                                        <label class="checkbox mb-0">
                                            <input name="agree" type="checkbox"/>
                                            I Agree the
                                            <a href="#">
                                                terms and conditions
                                            </a>
                                            .
                                            <span>
                                            </span>
                                        </label>
                                    </div>
                                    {{--end::Form group--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                                        <button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" id="kt_login_signup_submit" type="button">
                                            Submit
                                        </button>
                                        <button class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" id="kt_login_signup_cancel" type="button">
                                            Cancel
                                        </button>
                                    </div>
                                    {{--end::Form group--}}
                                </form>
                                {{--end::Form--}}
                            </div>
                            {{--end::Signup--}}
                            {{--begin::Forgot--}}
                            <div class="login-form login-forgot pt-11">
                                {{--begin::Form--}}
                                <form action="password/email" class="form" id="kt_login_forgot_form" method="post" novalidate="novalidate">
                                    {{--begin::Title--}}
                                    <div class="text-center pb-8">
                                        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">
                                            Forgotten Password ?
                                        </h2>
                                        <p class="text-muted font-weight-bold font-size-h4">
                                            Enter your email to reset your password
                                        </p>
                                    </div>
                                    {{--end::Title--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" name="email" placeholder="Email" type="email"/>
                                    </div>
                                    {{--end::Form group--}}
                                    {{--begin::Form group--}}
                                    <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                                        <button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" id="kt_login_forgot_submit" type="button">
                                            Submit
                                        </button>
                                        <button class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" id="kt_login_forgot_cancel" type="button">
                                            Cancel
                                        </button>
                                    </div>
                                    {{--end::Form group--}}
                                </form>
                                {{--end::Form--}}
                            </div>
                            {{--end::Forgot--}}
                        </div>
                        {{--end::Aside body--}}
                        {{--begin: Aside footer for desktop--}}
                        <div class="text-center">
                            {{--
                            <button class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-h6" type="button">
                                <span class="svg-icon svg-icon-md">
                                    begin::Svg Icon | path:assets/media/svg/social-icons/google.svg
                                    <svg fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.9895 10.1871C19.9895 9.36767 19.9214 8.76973 19.7742 8.14966H10.1992V11.848H15.8195C15.7062 12.7671 15.0943 14.1512 13.7346 15.0813L13.7155 15.2051L16.7429 17.4969L16.9527 17.5174C18.879 15.7789 19.9895 13.221 19.9895 10.1871Z" fill="#4285F4">
                                        </path>
                                        <path d="M10.1993 19.9313C12.9527 19.9313 15.2643 19.0454 16.9527 17.5174L13.7346 15.0813C12.8734 15.6682 11.7176 16.0779 10.1993 16.0779C7.50243 16.0779 5.21352 14.3395 4.39759 11.9366L4.27799 11.9466L1.13003 14.3273L1.08887 14.4391C2.76588 17.6945 6.21061 19.9313 10.1993 19.9313Z" fill="#34A853">
                                        </path>
                                        <path d="M4.39748 11.9366C4.18219 11.3166 4.05759 10.6521 4.05759 9.96565C4.05759 9.27909 4.18219 8.61473 4.38615 7.99466L4.38045 7.8626L1.19304 5.44366L1.08875 5.49214C0.397576 6.84305 0.000976562 8.36008 0.000976562 9.96565C0.000976562 11.5712 0.397576 13.0882 1.08875 14.4391L4.39748 11.9366Z" fill="#FBBC05">
                                        </path>
                                        <path d="M10.1993 3.85336C12.1142 3.85336 13.406 4.66168 14.1425 5.33717L17.0207 2.59107C15.253 0.985496 12.9527 0 10.1993 0C6.2106 0 2.76588 2.23672 1.08887 5.49214L4.38626 7.99466C5.21352 5.59183 7.50242 3.85336 10.1993 3.85336Z" fill="#EB4335">
                                        </path>
                                    </svg>
                                    end::Svg Icon
                                </span>
                                Sign in with Google
                            </button>
                            --}}
                        </div>
                        {{--end: Aside footer for desktop--}}
                    </div>
                    {{--end: Aside Container--}}
                </div>
                {{--begin::Aside--}}
                {{--begin::Content--}}
                <div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
                    {{--begin::Title--}}
                    {{--end::Title--}}
                    {{--begin::Image--}}
                    <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(assets/media/svg/illustrations/login-visual-2.svg);">
                    </div>
                    {{--end::Image--}}
                </div>
                {{--end::Content--}}
            </div>
            {{--end::Login--}}
        </div>
        {{--end::Main--}}
        {{--begin::Global Config(global config for global JS scripts)--}}
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
};
        </script>
        {{--end::Global Config--}}
        {{--begin::Global Theme Bundle(used by all pages)--}}
        <script src="assets/plugins/global/plugins.bundle.js?v=7.0.6">
        </script>
        <script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6">
        </script>
        <script src="assets/js/scripts.bundle.js?v=7.0.6">
        </script>
        {{--end::Global Theme Bundle--}}
        {{--begin::Page Scripts(used by this page)--}}
        <script src="assets/js/pages/custom/login/login-general.js?v=7.0.6">
        </script>
        {{--end::Page Scripts--}}
    </body>
    {{--end::Body--}}
</html>