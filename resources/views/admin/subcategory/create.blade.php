@extends('admin')

@section('heading')
    <h2>Create Sub-Category</h2>
@endsection

@section('content')
    <form action="/subcategory" method="POST" enctype="multipart/form-data">
        @csrf
        <select class="form-control" name="category_id" id="">
            @forelse ($categories as $category)
                <option value=" {{ $category->id }} "> {{ $category->category_name }} </option>
            @empty
                <option>Category Empty</option>
            @endforelse
        </select>
        <input type="text" class="form-control" placeholder="Input SubCategory" value="" name="subcategory_name">
        <input type="file" name="image" class="form-control" id="">
        <input type="submit" class="btn btn-success" name="submit" value="Add SubCategory">
    </form>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            <p style="background: red; color: white;"> {{ $error }} </p>

        @endforeach

    @endif
@endsection
