@extends('admin')

@section('heading')

    <h2>Edit Category</h2>

@endsection

@section('content')
    <form action="/category/{{ $category->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control" placeholder="Input Category" value="{{ $category->category_name }}"
            name="category_name">
        <input type="file" name="image" class="form-control" id="">
        <input type="submit" name="submit" value="Update Category">
    </form>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            <p style="background: red; color: white;"> {{ $error }} </p>

        @endforeach

    @endif
@endsection
