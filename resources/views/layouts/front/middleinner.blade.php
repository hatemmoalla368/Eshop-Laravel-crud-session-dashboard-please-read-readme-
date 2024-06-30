

<div class="middle-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ url('/produits') }}"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
                </div>
                <!--/ End Logo -->
                <!-- Search Form -->
                <div class="search-top">
                    <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                    <!-- Search Form -->
                    <div class="search-top">
                        <form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
                    </div>
                    <!--/ End Search Form -->
                </div>
                <!--/ End Search Form -->
                <div class="mobile-nav"></div>
            </div>
            <!-- resources/views/search.blade.php -->

<!-- resources/views/search.blade.php -->

<!-- resources/views/search.blade.php -->



<div class="col-lg-8 col-md-7 col-12">
    <form class="test" action="{{ route('products.search') }}" method="GET">
    <div class="search-bar-top">
        <div class="search-bar">

                <select name="category">
                    <option value="" selected="selected">All Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <input name="search" placeholder="Search Products Here....." type="search">

                <button type="submit" class="btnn"><i class="ti-search"></i></button>

        </div>
    </div>
</form>
</div>





            <div class="col-lg-2 col-md-3 col-12">
                <div class="right-bar">
                    <!-- Search Form -->

                    @php
    $total = 0;
    $nbproduct = 0;

    // Check if 'panier' exists and is not null
    $panier = session()->get('panier');
    if (is_array($panier)) {
        foreach ($panier as $product) {
            // Ensure $product["qte"] exists and is numeric before adding
            if (isset($product["qte"]) && is_numeric($product["qte"])) {
                $nbproduct += $product["qte"];
            }
        }
    }
@endphp


                    <div class="sinlge-bar shopping">

                        <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ $nbproduct }}</span></a>
                        <!-- Shopping Item -->
                        <div class="shopping-item">
                            <div class="dropdown-cart-header">
                                <span>{{ $nbproduct }} Items</span>
                                <a href="{{ route('exercice.cart') }}">View Cart</a>
                            </div>
                            <ul class="shopping-list">
@php
  $panier = session()->get('panier');

$total= 0;
@endphp
@if (is_array($panier))
    @forelse ($panier as $product)

        @if (isset($product["qte"]) && is_numeric($product["qte"]))
            @php
            $total += $product["qte"] * $product["price"];
            @endphp

        @endif





                                <li>
                                    <form action="{{ route('exercice.removeproduct') }}" method="post">
                                        @csrf


                                        <input type="hidden" name="id" value="{{ $product["id"] }}">
                                    <button><i class="fa fa-remove" type="submit"></i></button>
                                    </form>
                                    <a class="cart-img" href="#"><img src="{{ asset('photos/'.$product["photo"]) }}" alt="#"></a>
                                    <h4><a href="#">{{ $product["name"]}}</a></h4>
                                    <p class="quantity">{{ $product["qte"] }}x - <span class="amount">{{ $product["price"] }} TND</span></p>
                                </li>
                                @empty
                                <li>pas de produits!</li>
                                @endforelse

                            @endif
                            </ul>
                            <div class="bottom">
                                <div class="total">
                                    <span>Total</span>
                                    <span class="total-amount">{{ $total }} TND</span>
                                </div>
                                <a href="{{  route("exercice.checkout")}}" class="btn animate">Checkout</a>
                            </div>
                        </div>
                        <!--/ End Shopping Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
