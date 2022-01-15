@extends('blank')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            <p style="text-align: center">{{ session()->get('success') }}</p>
        </div>
    @endif
    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center text-uppercase">
                <h2>My Wishlist</h2>
            </div>
        </div>

        <main class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">

                            <!-- Product -->
                            @foreach ($wishlists as $wishlist)
                                <div class="col-lg-3 col-sm-6 my-3">
                                    <div class="col-12 bg-white text-center h-100 product-item">
                                        <div class="row h-100">
                                            <div class="col-12 p-0 mb-3">
                                                <a
                                                    href="{{ route('productDescription', ['productId' => $wishlist->product->id]) }}">
                                                    <img src=" {{ asset('storage/images/' . $wishlist->product->image_path) }} "
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <a href="product.html" class="product-name">
                                                    {{ $wishlist->product->product_name }}</a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <span class="product-price-old">
                                                    {{ $wishlist->product->price + 100 }}
                                                </span>
                                                <br>
                                                <span class="product-price">
                                                    {{ $wishlist->product->price }}
                                                </span>
                                            </div>
                                            <div class="col-12 mb-3 align-self-end">
                                                <form method="POST"
                                                    action="{{ route('deleteWishlist', ['wishlistId' => $wishlist->id]) }}">
                                                    @csrf
                                                    <button class="btn btn-outline-dark" type="submit"><i
                                                            class="fas fa-trash-alt me-2"></i>Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- Main Content -->
    </div>

@endsection
