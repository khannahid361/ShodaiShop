<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Stock</title>
</head>

<body>
    <h1>Product Stock<a href="{{ route('stockCreate') }}">Create Product</a></h1>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Current Stock</th>
            <th>Cost Price</th>
            <th>Selling Price</th>
            <th>Stock Details</th>
        </tr>
        @forelse ($products as $product)
            <tr>
                <td><a href="{{ route('showProduct', ['id' => $product->id]) }}">{{ $product->product_name }}</a>
                </td>
                <td>{{ $product->qty }}</td>
                <td>{{ $product->qty * $product->cost }}</td>
                <td>{{ $product->qty * $product->price }}</td>
                <td><a href="{{ route('stockDetails', ['id' => $product->id]) }}">Stock Details</a></td>
            </tr>
        @empty
            <tr>Empty</tr>
        @endforelse
    </table>
</body>

</html>
