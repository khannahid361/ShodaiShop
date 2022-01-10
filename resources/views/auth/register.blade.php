@extends('blank')

@section('content')

    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center text-uppercase">
                <h2>Register</h2>
            </div>
        </div>

        <main class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="agree" class="form-check-input" required>
                                    <label for="agree" class="form-check-label ml-2">I agree to Terms and Conditions</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="float-left">
                                    <button type="submit" class="btn btn-outline-dark">Register</button>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('login') }}">Already have an
                                        Account?</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </main>
        <!-- Main Content -->
    </div>

@endsection
