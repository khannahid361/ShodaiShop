@extends('blank')

@section('content')

    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center text-uppercase">
                <h2>Login</h2>
            </div>
        </div>

        <main class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label ml-2">Remember Me</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-dark">Login</button>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('register') }}">Don't have an Account?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>

    @endsection
