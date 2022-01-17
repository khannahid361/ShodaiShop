@extends('admin')

@section('heading')
    <h2>Product Stock<a class="btn btn-success" href="{{ route('stockCreate') }}">Create Product</a></h2>
@endsection

@section('content')
    <table class="table table-bordered table-striped">
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
@endsection
