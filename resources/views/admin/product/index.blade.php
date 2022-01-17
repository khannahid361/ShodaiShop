@extends('admin')

@section('heading')
    <h2>Product <a class="btn btn-warning" href="{{ route('productCreate') }}">Create Product</a></h2>
@endsection

@section('content')
    <table class="table table-bordered table-striped">
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
@endsection
