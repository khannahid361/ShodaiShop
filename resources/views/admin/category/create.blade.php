@extends('admin')

@section('heading')

    <h2>Ctreate Category</h2>

@endsection

@section('content')
    <form action="/category" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control" placeholder="Input Category" value="" name="category_name">
        <input type="file" name="image" class="form-control" id="">
        <input type="submit" class="btn btn-success" name="submit" value="Add Category">
    </form>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            <p style="background: red; color: white;"> {{ $error }} </p>

        @endforeach

    @endif
@endsection
