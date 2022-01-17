@extends('admin')

@section('heading')
    <h2>Stock Details of {{ $product->product_name }}</h2>
@endsection

@section('content')
    <table class="table table-bordered table-striped">
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
@endsection
