@extends('admin')

@section('heading')
    <h2 class="text-center">Return</h2>
@endsection

@section('content')
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Order</th>
                <th>Product</th>
                <th>Return Quantity</th>
                <th>Rate</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($returns as $item)
                <tr>
                    <td>{{ $item->order_id }}</td>
                    <td><img height="60" width="85" src="{{ asset('storage/images/' . $item->product->image_path) }}"
                            alt="">{{ $item->product->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->rate }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->status == 0 ? 'Pending' : 'Confrimed' }}</td>
                    <td>
                        <form method="POST" action="{{ route('updateReturn', $item->id) }}">
                            @csrf
                            <input type="hidden" name="status" value="{{ $item->status == 0 ? 1 : 0 }}" id="">
                            <button class="btn btn-warning"
                                type="submit">{{ $item->status == 0 ? 'Confirm' : 'Reject' }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Item Added !!! </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
