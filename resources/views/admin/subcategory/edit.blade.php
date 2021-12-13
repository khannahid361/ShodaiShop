<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Sub-Category</h1>

    <form action="{{ route('updateSubcatgory', ['id' => $subcategory->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <select name="category_id" id="">
            <option value=" {{ $subcategory->category_id }} ">
                {{ $subcategory->category->category_name }}
            </option>
            @forelse ($categories as $category)
                <option value=" {{ $category->id }} "> {{ $category->category_name }} </option>
            @empty
                <option>Category Empty</option>
            @endforelse
        </select>
        <input type="text" placeholder="Input Sub-Category" value="{{ $subcategory->subcategory_name }}"
            name="subcategory_name">
        <input type="file" name="image" class="form-control" id="">
        <input type="submit" name="submit" value="Update Category">
    </form>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            <p style="background: red; color: white;"> {{ $error }} </p>

        @endforeach

    @endif
</body>

</html>
