<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ $title }}
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/rtl/scss/light/assets/authentication/auth-boxed.scss'])
        @vite(['resources/rtl/scss/dark/assets/authentication/auth-boxed.scss'])
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    @auth
        <div></div>
    @else
        <div class="auth-container d-flex mt-4">
            <div class="container mx-auto align-self-center">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                        <div class="card mt-3 mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h2>التسجيل</h2>
                                    </div>
                                    <form method="POST" action="/register">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">الاسم</label>
                                                <input type="text" name="name"
                                                    class="form-control add-billing-address-input"
                                                    placeholder="قم بادخال الاسم">
                                                @error('name')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">البريد الالكتروني</label>
                                                <input type="email" class="form-control text-right" name="email"
                                                    placeholder="قم بادخال البريد الالكتروني">
                                                @error('email')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">كلمة المرور</label>
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="قم بادخال كلمة المرور">
                                                @error('password')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">تأكيد كلمة المرور</label>
                                                <input type="password" class="form-control" name="password_confirmation"
                                                    placeholder="قم بتأكيد كلمة المرور">
                                                @error('password_confirmation')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <button type="submit" class="btn btn-secondary w-100"
                                                    style="text-transform:uppercase">
                                                    تسجيل
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-12">
                                        <div class="text-center">
                                            <p class="mb-0">لديك حساب مسبقا؟ <a href="/sign-in" class="text-warning">
                                                    {{ __('trans.sign_in') }}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth


    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles></x-slot>

    {{-- </x-slot> --}}
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-rtl.base-layout>
