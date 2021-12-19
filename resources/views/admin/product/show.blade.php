<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
</head>

<body>

    <table>
        <tr>
            <th>Product Name</th>
            <th>Cover Image</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Stock</th>
            <th>Brand</th>
        </tr>

        <tr>
            <td> {{ $product->product_name }} </td>
            <td>
                <img src="{{ asset('storage/images/' . $product->image_path) }}" height="100" width="140" alt="">
            </td>
            <td>{{ $product->subcategory->category->category_name }}</td>
            <td>{{ $product->subcategory->subcategory_name }}</td>
            <td>{{ $product->opening_stock }}</td>
            <td>{{ $product->brand->brand_name }}</td>
            @foreach ($product->productImages as $image)
                <td>
                    <img src="{{ asset('storage/images/' . $image->img_path) }}" height="100" width="140" alt="">
                </td>
            @endforeach

        </tr>

    </table>

</body>

</html>
