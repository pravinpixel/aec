@extends('auth.layouts.customer')

@section('customer-content')

<div class="card col-lg-5 col-md-6 col-sm-8 shadow-lg border">
    <div class="card-header text-center pt-3 pb-0 border-0 ">
        <img src="{{ asset("public/assets/images/logo_customer.png") }}" width="150px" class="mb-2">
        <p class="lead p-0" style="font-weight: 400;">Change Account Password</p>
    </div>
    <div class="card-body">
        <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group row m-0 p-2">
                <label for="password" class="p-0 col-md-4 col-form-label text-md-right">Temporary Password</label>
                <div class="col-md-8 p-0">
                    <div class="input-group flex-nowrap border border-dark rounded">
                        <input type="password" name="temporary_password" id="temporary_password" value="{{ old('temporary_password') }}" class="form-control border-0 " onkeypress="return isNumber(event)" required>
                        <div class="input-group-text border-0" data-password="false" role="button">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    @if ($errors->has('temporary_password'))
                        <span class="text-danger">{{ $errors->first('temporary_password') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row m-0 p-2">
                <label for="password" class="p-0 col-md-4 col-form-label text-md-right">New Password</label>
                <div class="col-md-8 p-0">
                    <div class="input-group flex-nowrap border border-dark rounded">
                        <input type="password" name="password" id="password" validate-password class="form-control border-0" required>
                        <div class="input-group-text border-0" data-password="false" role="button">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row m-0 p-2">
                <label for="password-confirm" class="p-0 col-md-4 col-form-label text-md-right">Repeat Password</label>
                <div class="col-md-8 p-0">
                    <div class="input-group flex-nowrap border border-dark rounded">
                        <input type="password" name="password_confirmation" validate-confirm-password id="password-confirm" class="form-control border-0" required autofocus>
                        <div class="input-group-text border-0" data-password="false" role="button">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-8 offset-md-4 p-0 my-2">
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Cancel</a>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
