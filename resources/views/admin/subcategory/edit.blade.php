@extends('admin')

@section('heading')
    <h2>Edit Sub-Category</h2>
@endsection

@section('content')
    <form action="{{ route('updateSubcatgory', ['id' => $subcategory->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <select class="form-control" name="category_id" id="">
            <option value=" {{ $subcategory->category_id }} ">
                {{ $subcategory->category->category_name }}
            </option>
            @forelse ($categories as $category)
                <option value=" {{ $category->id }} "> {{ $category->category_name }} </option>
            @empty

            @endforelse
        </select>
        <input type="text" class="form-control" placeholder="Input Sub-Category"
            value="{{ $subcategory->subcategory_name }}" name="subcategory_name">
        <input type="file" name="image" class="form-control" id="">
        <input type="submit" class="btn btn-success" name="submit" value="Update Category">
    </form>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            <p style="background: red; color: white;"> {{ $error }} </p>

        @endforeach

    @endif
@endsection
