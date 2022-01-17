<header class="row">
    <!-- Top Nav -->
    <div class="col-12 bg-dark py-2 d-md-block d-none">
        <div class="row">
            <div class="col-auto me-auto">
                <ul class="top-nav">
                    <li>
                        <a href="tel:+123-456-7890"><i class="fa fa-phone-square me-2"></i>+123-456-7890</a>
                    </li>
                    <li>
                        <a href="mailto:mail@ecom.com"><i class="fa fa-envelope me-2"></i>mail@ecom.com</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto ">
                <ul class="top-nav">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                        @endif
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}"><i class="fas fa-user-edit me-2"></i>Register</a>
                            </li>
                        @endif
                    @else
                        <li><a href="{{ route('userDashboard') }}">
                                {{ Auth::user()->name }}'s Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt me-2"></i>Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
    <!-- Top Nav -->

    <!-- Header -->
    <div class="col-12 bg-white pt-4">
        <div class="row">
            <div class="col-lg-auto">
                <div class="site-logo text-center text-lg-left">
                    <a href="/">Shodai Bazar</a>
                </div>
            </div>
            <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                <form action="#">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="search" class="form-control border-dark" placeholder="Search..." required>
                            <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-auto text-center text-lg-left header-item-holder">
                <a href="#" class="header-item">
                    <i class="fas fa-heart me-2"></i><span id="header-favorite">0</span>
                </a>
                <a href="cart.html" class="header-item">
                    <i class="fas fa-shopping-bag me-2"></i><span id="header-qty" class="me-3">2</span>
                    <i class="fas fa-money-bill-wave me-2"></i><span id="header-price">$4,000</span>
                </a>
            </div>
        </div>

        <!-- Nav -->
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="electronics" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Electronics</a>
                            <div class="dropdown-menu" aria-labelledby="electronics">
                                <a class="dropdown-item" href="category.html">Computers</a>
                                <a class="dropdown-item" href="category.html">Mobile Phones</a>
                                <a class="dropdown-item" href="category.html">Television Sets</a>
                                <a class="dropdown-item" href="category.html">DSLR Cameras</a>
                                <a class="dropdown-item" href="category.html">Projectors</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="fashion" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Fashion</a>
                            <div class="dropdown-menu" aria-labelledby="fashion">
                                <a class="dropdown-item" href="category.html">Men's</a>
                                <a class="dropdown-item" href="category.html">Women's</a>
                                <a class="dropdown-item" href="category.html">Children's</a>
                                <a class="dropdown-item" href="category.html">Accessories</a>
                                <a class="dropdown-item" href="category.html">Footwear</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="books" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Books</a>
                            <div class="dropdown-menu" aria-labelledby="books">
                                <a class="dropdown-item" href="category.html">Adventure</a>
                                <a class="dropdown-item" href="category.html">Horror</a>
                                <a class="dropdown-item" href="category.html">Romantic</a>
                                <a class="dropdown-item" href="category.html">Children's</a>
                                <a class="dropdown-item" href="category.html">Non-Fiction</a>
                            </div>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('wishlist') }}">Wishlist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart') }}">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('myOrder') }}">Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('return') }}">Return</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Nav -->

    </div>
    <!-- Header -->

</header>
