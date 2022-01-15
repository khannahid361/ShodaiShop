@extends('blank')

@section('content')

    <div class="col-12">
        <!-- Main Content -->
        <main class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 pd-3 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <h1>Hello User : {{ Auth::user()->name }}</h1>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- Main Content -->
    </div>

@endsection
