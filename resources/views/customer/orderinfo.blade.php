@extends('blank')

@section('content')

    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <h2>My Order Details</h2>
            </div>
        </div>

        <main class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 pd-3 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->cartItems as $cart)
                                    <tr>
                                        <td><img src="{{ asset('storage/images/' . $cart->product->image_path) }}"
                                                alt="">{{ $cart->product->product_name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>{{ $cart->product->price }}tk/-</td>
                                        <td>{{ $cart->quantity * $cart->product->price }}tk/-</td>
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
