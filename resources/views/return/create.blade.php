@extends('blank')

@section('content')

    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <h2>My Order Return</h2>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                <p style="text-align: center">{{ session()->get('success') }}</p>
            </div>
        @endif
        <main class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 pd-3 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Return</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->cartItems as $cart)
                                    <tr>
                                        <td><img src="{{ asset('storage/images/' . $cart->product->image_path) }}"
                                                alt="">{{ $cart->product->product_name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        @if ($check[0] == 1)
                                            <td>Already Requested for refund</td>
                                        @else
                                            <form method="POST" action="{{ route('storeReturn', $order->id) }}">
                                                @csrf
                                                <td><input type="number" placeholder="Enter Return Quantity .."
                                                        name="return" min="1" max="{{ $cart->quantity }}" id=""></td>
                                                <input type="hidden" name="product_id" value="{{ $cart->product->id }}"
                                                    id="">
                                                <input type="hidden" name="rate" value="{{ $cart->product->price }}"
                                                    id="">
                                                <td> <button type="submit" class="btn btn-outline-success">Request
                                                        Return</button></td>
                                            </form>
                                        @endif
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
