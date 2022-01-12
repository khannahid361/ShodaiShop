@extends('blank')

@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger">
            <p style="text-align: center">{{ session()->get('error') }}</p>
        </div>
    @endif
    <div class="col-12">
        <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white py-3 my-3">
                <div class="row">

                    <!-- Product Images -->
                    <div class="col-lg-5 col-md-12 mb-3">
                        <div class="col-12 mb-3">
                            <div class="img-large border"
                                style="background-image: url({{ asset('storage/images/' . $product->image_path) }})">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-2 col-3">
                                    <div class="img-small border"
                                        style="background-image: url({{ asset('storage/images/' . $product->image_path) }})"
                                        data-src="{{ asset('storage/images/' . $product->image_path) }}">
                                    </div>
                                </div>
                                @foreach ($product->productImages as $image)
                                    <div class="col-sm-2 col-3">
                                        <div class="img-small border"
                                            style="background-image: url({{ asset('storage/images/' . $image->img_path) }})"
                                            data-src="{{ asset('storage/images/' . $image->img_path) }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <!-- Product Images -->

                    <!-- Product Info -->
                    <div class="col-lg-5 col-md-9">
                        <div class="col-12 product-name large">{{ $product->product_name }} -
                            Area 51M Gaming Laptop Welcome to A New ERA with 9TH GEN Intel CORE I9-9900K NVIDIA GEFORCE RTX
                            2080 8GB GDDR6 17.3" FHD 144HZ AG G-SYNC TOBII EYETRACKING (1TB SSD RAID|32GB RAM|10 PRO)
                            <small>By <a href="#">Dell</a></small>
                        </div>
                        <div class="col-12 px-0">
                            <hr>
                        </div>
                        <div class="col-12">
                            <ul>
                                <li>Processor 8th Generation Intel Core i9-8950HK (6-Core, 12MB Cache, Overclocking up to
                                    5.0GHz)</li>
                                <li>Memory 32GB DDR4-2666MHz, 2x16GB Ram Speed Gaming Performance</li>
                                <li>Hard Drive 1TB SSD RAID 0 (2x 512GB PCIe NVME M.2 SSDs) + 1TB (+8GB SSHD) Hybrid Drive
                                </li>
                                <li>17.3" Full HD display 1920 x 1080 resolution boasts impressive color and clarity. IPS
                                    technology for wide viewing angles.</li>
                                <li>Video Card NVIDIA® GeForce® RTX 2080 with 8GB GDDR6</li>
                                <li><strong>Total Available: {{ $product->qty }}</strong></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Product Info -->

                    <!-- Sidebar -->
                    <div class="col-lg-2 col-md-3 text-center">
                        <div class="col-12 border-left border-top sidebar h-100">
                            <div class="row">
                                <div class="col-12">
                                    <span class="detail-price">
                                        {{ $product->price }} tk/-
                                    </span>
                                    <span class="detail-price-old">
                                        {{ $product->price + 100 }} tk/-
                                    </span>
                                </div>
                                <div class="col-xl-5 col-md-9 col-sm-3 col-5 mx-auto mt-3">
                                    <div class="mb-3">
                                        <label for="qty">Quantity</label>
                                        <input type="number" id="qty" min="1" value="1" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-outline-dark" type="button"><i
                                            class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                </div>
                                <div class="col-12 mt-3">
                                    <form method="POST"
                                        action="{{ route('addWishlist', ['productId' => $product->id]) }}">
                                        @csrf
                                        <button class="btn btn-outline-secondary btn-sm" type="submit"><i
                                                class="fas fa-heart me-2"></i>Add to wishlist</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar -->

                </div>
            </div>

            <div class="col-12 mb-3 py-3 bg-white text-justify">
                <div class="row">

                    <!-- Details -->
                    <div class="col-md-7">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 text-uppercase">
                                    <h2><u>Details</u></h2>
                                </div>
                                <div class="col-12" id="details">
                                    <h4>OPERATING SYSTEM</h4>

                                    <p><strong>Available with Windows 10 Home:</strong> Gaming is better than ever on
                                        Windows 10, with games in 4K, DirectX 12, and streaming your gameplay*.</p>
                                    <hr>
                                    <h4>CONSIDER THE GAME CHANGED</h4>

                                    <p>The Alienware Area-51m is unlike any mobile gaming machine ever created. With
                                        unprecedented desktop-level processing power, CPU and GPU upgradability, advanced
                                        cooling and a premium, revolutionary design, a true desktop-gaming experience is now
                                        available in the form of a laptop.</p>
                                    <hr>
                                    <h4>DESKTOP POWER PACKED INTO A LAPTOP</h4>

                                    <p>The Area-51m features a host of firsts for peak performance and power. It’s our
                                        first-ever Alienware laptop to feature 8-core, 16-thread Intel® processors, giving
                                        it a whole new level of compute power versus other gaming laptops. Engineered with
                                        desktop processors, the CPU is enabled with up to 125% rated power, allowing
                                        high-end overclocking. This results in higher performance for megatasking,
                                        CPU-intensive gaming, as well as day-to-day applications.</p>

                                    <p>Lose yourself in vivid, uninterrupted gaming thanks to NVIDIA® GeForce RTX™ graphics
                                        with full-throttle power and up to 30W of overclocking headroom—all on an immersive
                                        144Hz G-SYNC 17" Full HD display. Users can overclock their settings via the new
                                        Alienware Command Center.</p>

                                    <p>The Area-51m is also our first-ever Alienware laptop to support up to 64GB of DDR4
                                        memory, ensuring you have enough RAM for even the most performance-intensive tasks.
                                    </p>
                                    <hr>
                                    <h4>UNPRECEDENTED UPGRADEABILITY</h4>

                                    <p>Gamers have made it clear that they’ve noticed a lack of CPU and GPU upgradability in
                                        gaming laptops.</p>

                                    <p>The Area-51m was engineered with this in mind, finally allowing gamers to harness
                                        power comparable to even the highest-performance desktop, and taking advantage of
                                        latest technologies from NVIDIA® such as ray tracing, DLSS, and AI enhanced
                                        graphics.</p>

                                    <p>CPU upgrades can be done using standard desktop-class processors, while GPU upgrades
                                        can be done via onboard graphics module replacement or with the Alienware Graphics
                                        Amplifier.</p>
                                    <hr>
                                    <h4>ADVANCED ALIENWARE CRYO-TECH COOLING</h4>

                                    <p>Our thermal technology, Advanced Alienware Cryo-Tech v2.0, optimizes component
                                        cooling, which maximizes overall performance and keeps your laptop cool to the
                                        touch. Here’s a closer look at our innovative cooling solution.</p>

                                    <p><strong>Dual-Intake, Dual-Exhaust Airflow Design:</strong> The Area-51m chassis
                                        prioritizes performance with a dual fan design that pulls in cool air from the
                                        bottom and top vents, while exhaling exhaust out the rear and side vents for optimal
                                        core component cooling. (The Intel® Core™ i7-8700 with NVIDIA® GeForce RTX™ 2060
                                        configuration does not have a side-exhaust)</p>

                                    <p><strong>High Voltage Driving Fan:</strong> The fire resistant, liquid-crystal polymer
                                        fan is built with 0.2mm blades, sleeve bearings and 3-phase fan control to create
                                        less friction and circulate air more efficiently. The Area-51m fans occupy an area
                                        of 95x105mm with a thickness ranging from 19mm to 21.5mm and can push over 25 CFM in
                                        open air conditions—something normally seen only in desktops.</p>

                                    <p><strong>Load-balancing Heat Pipes:</strong> The dynamics of thermal activity across
                                        critical components like the GPU and the CPU are intelligently discharged across
                                        various dedicated and shared 8mm and 6mm copper-composite heat pipes.The highest-end
                                        configurations carry 7 total heat pipes.</p>

                                    <p><strong>Copper Fin Stacks:</strong> The Area-51m features best-in-class surface
                                        temperatures, largely due to a thermal module, including four 0.15mm copper
                                        fins.Heat is drawn away from the most critical components to prioritize system
                                        performance and longevity.</p>

                                    <p><strong>Thermal Control:</strong> Cryo-Tech v2.0 ensures that 100% of the system's
                                        GPU thermal design power is enabled, while also ensuring CPU-intensive games benefit
                                        from high performance.</p>

                                    <p><strong>Whisper-quiet:</strong> The cooling system of the Area-51m is so powerful,
                                        virtually no noise is heard while engaged in daily tasks.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Details -->

                    <!-- Ratings & Reviews -->
                    <div class="col-md-5">
                        <div class="col-12 px-md-4 border-top border-left sidebar h-100">

                            <!-- Rating -->
                            <div class="row">
                                <div class="col-12 mt-md-0 mt-3 text-uppercase">
                                    <h2><u>Ratings & Reviews</u></h2>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-4 text-center">
                                            <div class="row">
                                                <div class="col-12 average-rating">
                                                    4.1
                                                </div>
                                                <div class="col-12">
                                                    of 100 reviews
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <ul class="rating-list mt-3">
                                                <li>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-dark" role="progressbar"
                                                            style="width: 45%;" aria-valuenow="45" aria-valuemin="0"
                                                            aria-valuemax="100">45%</div>
                                                    </div>
                                                    <div class="rating-progress-label">
                                                        5<i class="fas fa-star ms-1"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-dark" role="progressbar"
                                                            style="width: 30%;" aria-valuenow="30" aria-valuemin="0"
                                                            aria-valuemax="100">30%</div>
                                                    </div>
                                                    <div class="rating-progress-label">
                                                        4<i class="fas fa-star ms-1"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-dark" role="progressbar"
                                                            style="width: 15%;" aria-valuenow="15" aria-valuemin="0"
                                                            aria-valuemax="100">15%</div>
                                                    </div>
                                                    <div class="rating-progress-label">
                                                        3<i class="fas fa-star ms-1"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-dark" role="progressbar"
                                                            style="width: 7%;" aria-valuenow="7" aria-valuemin="0"
                                                            aria-valuemax="100">7%</div>
                                                    </div>
                                                    <div class="rating-progress-label">
                                                        2<i class="fas fa-star ms-1"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-dark" role="progressbar"
                                                            style="width: 3%;" aria-valuenow="3" aria-valuemin="3"
                                                            aria-valuemax="100">3%</div>
                                                    </div>
                                                    <div class="rating-progress-label">
                                                        1<i class="fas fa-star ms-1"></i>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Rating -->

                            <div class="row">
                                <div class="col-12 px-md-3 px-0">
                                    <hr>
                                </div>
                            </div>

                            <!-- Add Review -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>Add Review</h4>
                                </div>
                                <div class="col-12">
                                    <form>
                                        <div class="mb-3">
                                            <textarea class="form-control" placeholder="Give your review"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex ratings justify-content-end flex-row-reverse">
                                                <input type="radio" value="5" name="rating" id="rating-5"><label
                                                    for="rating-5"></label>
                                                <input type="radio" value="4" name="rating" id="rating-4"><label
                                                    for="rating-4"></label>
                                                <input type="radio" value="3" name="rating" id="rating-3"><label
                                                    for="rating-3"></label>
                                                <input type="radio" value="2" name="rating" id="rating-2"><label
                                                    for="rating-2"></label>
                                                <input type="radio" value="1" name="rating" id="rating-1" checked><label
                                                    for="rating-1"></label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-outline-dark">Add Review</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Add Review -->

                            <div class="row">
                                <div class="col-12 px-md-3 px-0">
                                    <hr>
                                </div>
                            </div>

                            <!-- Review -->
                            <div class="row">
                                <div class="col-12">

                                    <!-- Comments -->
                                    <div class="col-12 text-justify py-2 px-3 mb-3 bg-gray">
                                        <div class="row">
                                            <div class="col-12">
                                                <strong class="me-2">Steve Rogers</strong>
                                                <small>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </small>
                                            </div>
                                            <div class="col-12">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut
                                                ullamcorper quam, non congue odio.
                                                <br>
                                                Fusce ligula augue, faucibus sed neque non, auctor rhoncus enim. Sed nec
                                                molestie turpis. Nullam accumsan porttitor rutrum. Curabitur eleifend
                                                venenatis volutpat.
                                                <br>
                                                Aenean faucibus posuere vehicula.
                                            </div>
                                            <div class="col-12">
                                                <small>
                                                    <i class="fas fa-clock me-2"></i>5 hours ago
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comments -->

                                    <!-- Comments -->
                                    <div class="col-12 text-justify py-2 px-3 mb-3 bg-gray">
                                        <div class="row">
                                            <div class="col-12">
                                                <strong class="me-2">Bucky Barns</strong>
                                                <small>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </small>
                                            </div>
                                            <div class="col-12">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut
                                                ullamcorper quam, non congue odio.
                                                <br>
                                                Aenean faucibus posuere vehicula.
                                            </div>
                                            <div class="col-12">
                                                <small>
                                                    <i class="fas fa-clock me-2"></i>5 hours ago
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comments -->

                                </div>
                            </div>
                            <!-- Review -->

                        </div>
                    </div>
                    <!-- Ratings & Reviews -->

                </div>
            </div>

            <!-- Similar Product -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Similar Products</h2>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <div class="row h-100">
                                        <div class="col-12 p-0 mb-3">
                                            <a href="product.html">
                                                <img src="images/image-1.jpg" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Sony Alpha DSLR Camera</a>
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
                                                <img src="images/image-2.jpg" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Optoma 4K HDR Projector</a>
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
                                                <img src="images/image-3.jpg" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">HP Envy Specter 360</a>
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
                                                <img src="images/image-4.jpg" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="product.html" class="product-name">Dell Alienware Area 51</a>
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
            <!-- Similar Products -->

        </main>
        <!-- Main Content -->
    </div>

@endsection
