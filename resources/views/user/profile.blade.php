@extends('template.template-logged')

@section('title', 'Search Contact')

@section('profile-page', 'active')

@section('content')
    <div>
        <section>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mt-4">Profile</h3>
                    <p class="lead">
                        - Here you can find your informations and update it
                    </p>
                </div>
            </div>
        </section>
        <section>
            @if (session('positive-status'))
                <div class="alert alert-success">
                    {{ session('positive-status') }}
                </div>
            @endif
            @if (session('negative-status'))
                <div class="alert alert-danger">
                    {{ session('negative-status') }}
                </div>
            @endif
        </section>
        <section>
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="form-group row mt-2">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="birth_date" class="col-md-4 col-form-label text-md-right">Birth Date</label>
                    <div class="col-md-6">
                        <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror"
                            name="birth_date" value="{{ old('birth_date') ?? $user->birth_date }}" required>
                        @error('birth_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" value="{{ old('address') ?? $user->address }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                            name="city" value="{{ old('city') ?? $user->city }}" required>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                    <div class="col-md-6">
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                            name="country" value="{{ old('country') ?? $user->country }}" required>
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="d-flex ms-auto btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
