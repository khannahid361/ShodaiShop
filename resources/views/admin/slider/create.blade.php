@extends('admin')

@section('heading')
    <h2>Create Slider</h2>
@endsection

@section('content')
    <form action="/slider" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea class="form-control" name="title" placeholder="Enter Title"></textarea>
        <input type="file" name="image" class="form-control" id="">
        <input type="submit" class="btn btn-success" name="submit" value="Add slider">
    </form>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            <p style="background: red; color: white;"> {{ $error }} </p>

        @endforeach

    @endif
@endsection
