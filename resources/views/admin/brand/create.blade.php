@extends('admin')

@section('heading')
    <h2>Create Brand</h2>
@endsection

@section('content')
    <form action="/brand" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control" placeholder="Input Brand" value="" name="brand_name">
        <input type="file" name="image" class="form-control" id="">
        <input type="submit" class="btn btn-success" name="submit" value="Add Brand">
    </form>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            <p style="background: red; color: white;"> {{ $error }} </p>

        @endforeach

    @endif
@endsection
