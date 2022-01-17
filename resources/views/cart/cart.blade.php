@extends('blank')

@section('content')
    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center text-uppercase">
                <h2>Shopping Cart</h2>
            </div>
        </div>

        <main class="row">
            <div class="col-12 bg-white py-3 mb-3">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 mx-auto table-responsive">
                        <div class="col-12">
                            <table class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Details</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Amount</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (session('cartItems'))
                                        @foreach (session('cartItems') as $key => $value)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/images/' . $value['image_path']) }}"
                                                        class="img-fluid">
                                                    {{ $value['name'] }}
                                                </td>
                                                <td>
                                                    {{ $value['details'] }}
                                                </td>
                                                <td>
                                                    {{ $value['price'] }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('update.cart', ['id' => $key]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <select name="quantity" id="quantity" onchange="this.form.submit()">
                                                            @for ($i = 1; $i <= 10; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ $value['quantity'] == $i ? 'selected' : '' }}>
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    {{ $value['price'] * $value['quantity'] }}
                                                </td>
                                                <td>
                                                    <a role="button" href="{{ route('removeCart', $key) }}"><button
                                                            class="btn btn-link text-danger"><i
                                                                class="fas fa-times"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td align="center" colspan="6">
                                                <p>No Item In Cart</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        @if (session('cartItems'))
                            <div class="col-12 text-right">
                                <a href="{{ route('checkOut') }}" class="btn btn-outline-success">Checkout</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </main>
        <!-- Main Content -->
    </div>

@endsection
