
<h3><b>Account Information</b></h3>
<div class="form-group row">

    <div class="col-md-6">
        <label for="username" class="col-md-4">{{ __('Username') }}</label>
            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

            @if ($errors->has('username'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
    </div>

    <div class="col-md-6">
        <label for="email" class="col-md-4">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

</div>

<div class="form-group row">
    
    <div class="col-md-6">
    <label for="password" class="col-md-4">{{ __('Password') }}</label>

        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-6">
    <label for="password-confirm" class="col-md-8">{{ __('Confirm Password') }}</label>

    
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>