@extends('blank')

@section('content')





    <div class="col-12">
        <!-- Main Content -->
        <main class="row">

            <!-- Slider -->
            <div class="col-12 px-0">
                <div id="slider" class="carousel slide w-100" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        @for ($i = 0; $i < $sliders->count(); $i++)
                            <li data-bs-target="#slider" data-bs-slide-to=" {{ $i }} "
                                class="{{ $i == 0 ? 'active' : '' }}">
                            </li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $val = 0;
                        ?>
                        @foreach ($sliders as $slider)
                            <?php
                            $val++;
                            ?>
                            <div class="carousel-item {{ $val == 1 ? 'active' : '' }}">
                                <img src="{{ asset('storage/images/' . $slider->slider_image) }}" class="slider-img">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Slider -->

            <!-- Featured Products -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Featured Products</h2>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Product -->
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-sm-6 my-3">
                                    <div class="col-12 bg-white text-center h-100 product-item">
                                        <div class="row h-100">
                                            <div class="col-12 p-0 mb-3">
                                                <a
                                                    href="{{ route('productDescription', ['productId' => $product->id]) }}">
                                                    <img src=" {{ asset('storage/images/' . $product->image_path) }} "
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <a href="product.html" class="product-name">
                                                    {{ $product->product_name }}</a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <span class="product-price-old">
                                                    {{ $product->price + 100 }}
                                                </span>
                                                <br>
                                                <span class="product-price">
                                                    {{ $product->price }}
                                                </span>
                                            </div>
                                            <div class="col-12 mb-3 align-self-end">
                                                <a href="{{ route('add.to.cart', $product->id) }}"> <button
                                                        class="btn btn-outline-dark" type="button"><i
                                                            class="fas fa-cart-plus me-2"></i>Add to cart</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Products -->

            <div class="col-12">
                <hr>
            </div>

            <!-- Latest Product -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Latest Products</h2>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <span class="new">New</span>
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="{{ asset('storage/images/image-1.jpg') }}"
                                                    class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Sony Alpha DSLR
                                                Camera</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="product-price-old">
                                                $500
                                            </span>
                                            <br>
                                            <span class="product-price">
                                                $500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i
                                                    class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <span class="new">New</span>
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="{{ asset('storage/images/image-2.jpg') }}"
                                                    class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Optoma 4K HDR
                                                Projector</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="product-price">
                                                $1,500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i
                                                    class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <span class="new">New</span>
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="{{ asset('storage/images/image-3.jpg') }}"
                                                    class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">HP Envy Specter
                                                360</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="product-price-old">
                                                $2,800
                                            </div>
                                            <span class="product-price">
                                                $2,500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i
                                                    class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <span class="new">New</span>
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="{{ asset('storage/images/image-4.jpg') }}"
                                                    class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Dell Alienware Area
                                                51</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="product-price">
                                                $4,500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i
                                                    class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Latest Products -->

            <div class="col-12">
                <hr>
            </div>

            <!-- Top Selling Products -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Top Selling Products</h2>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="{{ asset('storage/images/image-1.jpg') }}"
                                                    class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Sony Alpha DSLR
                                                Camera</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="product-price-old">
                                                $500
                                            </span>
                                            <br>
                                            <span class="product-price">
                                                $500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i
                                                    class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="{{ asset('storage/images/image-2.jpg') }}"
                                                    class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Optoma 4K HDR
                                                Projector</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="product-price">
                                                $1,500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i
                                                    class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="{{ asset('storage/images/image-3.jpg') }}"
                                                    class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">HP Envy Specter
                                                360</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="product-price-old">
                                                $2,800
                                            </div>
                                            <span class="product-price">
                                                $2,500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i
                                                    class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="{{ asset('storage/images/image-4.jpg') }}"
                                                    class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Dell Alienware Area
                                                51</a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="product-price">
                                                $4,500
                                            </span>
                                        </div>
                                        <div class="col-12 mb-3 align-self-end">
                                            <button class="btn btn-outline-dark" type="button"><i
                                                    class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Selling Products -->

            <div class="col-12 py-3 bg-light d-sm-block d-none">
                <div class="row">
                    <div class="col-lg-3 col ms-auto large-holder">
                        <div class="row">
                            <div class="col-auto ms-auto large-icon">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            <div class="col-auto me-auto large-text">
                                Best Price
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col large-holder">
                        <div class="row">
                            <div class="col-auto ms-auto large-icon">
                                <i class="fas fa-truck-moving"></i>
                            </div>
                            <div class="col-auto me-auto large-text">
                                Fast Delivery
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col me-auto large-holder">
                        <div class="row">
                            <div class="col-auto ms-auto large-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="col-auto me-auto large-text">
                                Genuine Products
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content -->
    </div>
@endsection
