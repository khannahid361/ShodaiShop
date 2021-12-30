<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>

<body>
    <h1>Product <a href="{{ route('productCreate') }}">Create Product</a></h1>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Subacategory</th>
            <th>Action</th>
            <th></th>
        </tr>
        @forelse ($products as $product)
            <tr>
                <td><a href="{{ route('showProduct', ['id' => $product->id]) }}">{{ $product->product_name }}</a>
                </td>
                <td>{{ $product->subcategory->subcategory_name }}</td>
                <td><a href="{{ route('destroyProduct', ['id' => $product->id]) }}">Delete</a></td>
                <td><a href="{{ route('editProduct', ['id' => $product->id]) }}">Edit-></a></td>
            </tr>
        @empty
            <tr>Empty</tr>
        @endforelse
    </table>
</body>

</html>
