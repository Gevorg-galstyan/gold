<!-- Modal -->
{{--<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<div class="row justify-content-center">--}}
                        {{--<div class="card">--}}
                            {{--<div class="card-header">Login</div>--}}

                            {{--<div class="card-body">--}}
                                {{--<form method="POST" action="{{ route('login') }}" aria-label="Login">--}}
                                    {{--@csrf--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<label for="login" class="col-sm-4 col-form-label text-md-right">Login</label>--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>--}}

                                            {{--@if ($errors->has('login'))--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('login') }}</strong>--}}
                                    {{--</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>--}}

                                        {{--<div class="col-md-6">--}}
                                            {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                            {{--@if ($errors->has('password'))--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row">--}}
                                        {{--<div class="col-md-6 offset-md-4">--}}
                                            {{--<div class="form-check">--}}
                                                {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                                {{--<label class="form-check-label" for="remember">--}}
                                                    {{--Remember Me--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group row mb-0">--}}
                                        {{--<div class="col-md-8 offset-md-4">--}}
                                            {{--<button type="submit" class="btn btn-primary">--}}
                                                {{--Login--}}
                                            {{--</button>--}}

                                            {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                                {{--Forgot Your Password?--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
        {{--<div class="modal-content border-color">--}}
            {{--<div class="modal-header justify-content-center">--}}
                {{--<h5 class="modal-title font-trajan-bold color text-center" id="loginTitle">Login</h5>--}}

            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<form action="{{ route('login') }}" method="post">--}}
                    {{--{{csrf_field()}}--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="text" class="form-control" name="login" id="login-filed" placeholder="Your login">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="password" class="form-control" id="password-filed" name="password" placeholder="Password">--}}
                    {{--</div>--}}
                    {{--<div class="d-flex justify-content-between">--}}
                        {{--<button type="button" class="my-btn ">Sign up</button>--}}
                            {{--<button type="submit" class="my-btn ">Login</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-color">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title font-trajan-bold color text-center" id="loginTitle">Login</h5>

            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="login-filed" placeholder="Your login">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password-filed" placeholder="Password">
                    </div>
                </form>
                <div class="d-flex justify-content-between">
                    <button type="button" class="my-btn ">Sign up</button>
                    <button type="button" class="my-btn ">Login</button>
                </div>

            </div>
        </div>
    </div>
</div>