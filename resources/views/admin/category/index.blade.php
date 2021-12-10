<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>

<body>
    <h1>Category <a href=" {{ route('category.create') }} ">Add Category</a> </h1>


    <table>
        <tr>
            <th>Category Name</th>
            <th>Category Image</th>
            <th>Action</th>
        </tr>
        @forelse ($categories as $category)
            <tr>
                <td><a
                        href=" {{ route('showCategory', ['id' => $category->id]) }} ">{{ $category->category_name }}</a>
                </td>
                <td>
                    <img src="{{ asset('storage/images/' . $category->cat_image) }}" height="100" width="140" alt="">
                </td>
                <td>
                    <a href=" {{ route('editCategory', ['id' => $category->id]) }} ">Edit</a>
                </td>
                <td>
                    <a href="{{ route('deleteCategory', ['id' => $category->id]) }}">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Category Empty. Please Insert Category</td>
            </tr>
        @endforelse

    </table>

</body>

</html>
