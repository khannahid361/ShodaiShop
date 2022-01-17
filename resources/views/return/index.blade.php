@extends('blank')

@section('content')

    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <h2>My Returns/Refunds</h2>
            </div>
        </div>
        <main class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 pd-3 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Product</th>
                                    <th>Return Quantity</th>
                                    <th>Rate</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($returns as $item)
                                    <tr>
                                        <td>{{ $item->order_id }}</td>
                                        <td><img src="{{ asset('storage/images/' . $item->product->image_path) }}"
                                                alt="">{{ $item->product->product_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->rate }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->status == 0 ? 'Pending' : 'Confrimed' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Item Added !!! </td>
                                    </tr>
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
