@extends('layouts.app')
@section('title')
    @lang('app.login')
@endsection
@section('content')
    <div class="container-xl py-4">
        <div class="h5 text-center mb-3">
            @lang('app.login')
        </div>
        <div class="row justify-content-center">
            <div class="col-8 col-md-6 col-xl-4">
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="phone" class="form-label">@lang('app.phone') <span class="text-danger">*</span></label>
                        <div class="row g-1">
                            <div class="col-auto">
                                <button type="button" class="btn btn-light" id="btn-password" value="0">+993</button>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required autofocus>
                            </div>
                        </div>
                        @error('phone')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">@lang('app.password') <span class="text-danger">*</span></label>

                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>

                        <script>
                            document.getElementById('btn-password').addEventListener('click', function () {
                                if (this.value === '0') {
                                    this.value = '1';
                                    this.firstElementChild.className = 'text-primary bi-eye-fill';
                                    this.parentElement.previousElementSibling.firstElementChild.setAttribute('type', 'text');
                                } else {
                                    this.value = '0';
                                    this.firstElementChild.className = 'bi-eye-slash-fill';
                                    this.parentElement.previousElementSibling.firstElementChild.setAttribute('type', 'password');
                                }
                            })
                        </script>
                        @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm w-100">
                        @lang('app.login')
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection