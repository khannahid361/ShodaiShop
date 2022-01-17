@extends('blank')

@section('content')

    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center text-uppercase">
                <h2>Checkout</h2>
            </div>
        </div>

        <main class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 pd-3 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('confirmCheckout') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Customer Name" name="name"
                                    id="">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" placeholder="Ex: absds@email.com" class="form-control" name="email"
                                    id="">
                            </div>
                            <div class="mb-3">
                                <label for="password">Contact</label>
                                <input type="tel" class="form-control" placeholder="Ex: 01345325662" name="contact" id="">
                            </div>
                            <div class="mb-3">
                                <label for="password">Area</label>
                                <select name="area" class="form-control" id="">
                                    <option value="Uttara">Uttara</option>
                                    <option value="Airport">Airport</option>
                                    <option value="Khilkhet">Khilkhet</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password">Shipping Address</label>
                                <textarea name="address" placeholder="Enter Shipping Address here..." class="form-control"
                                    id="" cols="30" rows="13"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="password">Pay Via</label>
                                <input type="radio" name="pay_via" value="Cash On Delivery" id="">Cash On Delivery<input
                                    type="radio" value="Online Payment" name="pay_via" id="">Online Payment
                            </div>
                            <div class="form-group">
                                <div class="float-left">
                                    <button type="submit" class="btn btn-outline-success">Place Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
        <!-- Main Content -->
    </div>

@endsection
