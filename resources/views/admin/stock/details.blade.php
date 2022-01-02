<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Stock</title>
</head>

<body>
    <h1>Stock Details of {{ $product->product_name }}</h1>
    <table>
        <tr>
            <th>Stock Qty</th>
            <th>Stock Date</th>
            <th>Action</th>
        </tr>
        @forelse ($stocks as $stock)
            <tr>
                <td>{{ $stock->stock }}</td>
                <td>{{ $stock->created_at }}</td>
                <td><a
                        href="{{ route('destroyStock', ['id' => $stock->product_id, 'stockId' => $stock->id]) }}">Delete</a>
                </td>
                <td><a href="{{ route('editStock', ['id' => $stock->product_id, 'stockId' => $stock->id]) }}">Edit</a>
                </td>
            </tr>
        @empty
            <tr>Empty</tr>
        @endforelse
    </table>
</body>

</html>
