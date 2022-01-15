@extends('blank')

@section('content')

    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <h2>My Orders</h2>
            </div>
        </div>

        <main class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 pd-3 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th>Order Date</th>
                                    <th>Order Amount</th>
                                    <th>Shipping Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td><a href="{{ route('viewOrder', $order->id) }}">{{ $order->id }}</a></td>
                                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->amount }}tk/-</td>
                                        <td>{{ $order->address . ',' . $order->area }}</td>
                                        <td>{{ $order['status'] == 0 ? 'Pending' : 'Confrimed' }}</td>
                                    </tr>
                                @empty
                                    Nothing ordered. Please Order Items !!!
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
        <!-- Main Content -->
    </div>

@endsection
