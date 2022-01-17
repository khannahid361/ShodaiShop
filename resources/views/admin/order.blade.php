@extends('admin')

@section('heading')
    <h2 class="text-center">All Order</h2>
@endsection

@section('content')
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Order No</th>
                <th>Order By</th>
                <th>Order Date</th>
                <th>Order Amount</th>
                <th>Shipping Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                    <td>{{ $order->amount }}tk/-</td>
                    <td>{{ $order->address . ',' . $order->area }}</td>
                    <td>{{ $order['status'] == 0 ? 'Pending' : 'Confrimed' }}</td>
                    <td>
                        <form method="POST" action="{{ route('updateOrder', $order->id) }}">
                            @csrf
                            <input type="hidden" name="status" value="{{ $order['status'] == 0 ? 1 : 0 }}" id="">
                            <button class="btn btn-warning"
                                type="submit">{{ $order['status'] == 0 ? 'Confirm' : 'Delay' }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                Nothing ordered. Please Order Items !!!
            @endforelse
        </tbody>
    </table>
@endsection
