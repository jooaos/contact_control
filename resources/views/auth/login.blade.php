@extends('template.template')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div class="mt-5">
            <h3>
                <span class="badge bg-secondary">Contact Control Platform</span>
            </h3>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sign In</div>
                <div class="card-body">
                    <form action="{{ route('signin') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="form-group row mt-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required
                                    autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>

                        @if ($errors->has('login-error'))
                            <div class="mt-3 text-danger">
                                <h6 class="p-0">{{ $errors->first('login-error') }}</h6>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ route('signup.view') }}"> Go to Sign Up page</a>
                 </div>
            </div>
        </div>
    </div>
@endsection
