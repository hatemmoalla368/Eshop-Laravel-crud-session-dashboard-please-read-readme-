@extends('layouts.front.template')
@section('content')
<!-- Breadcrumbs -->
<style>
    .center-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh; /* Full viewport height */
        text-align: center;
    }

    .button {
        margin-top: 20px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn a {
        color: white;
        text-decoration: none;
    }
</style>


<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Checkout -->
<section class="shop checkout section">
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error )
        {{ $error }}

        @endforeach
    </div>

    @endif
    @if (!Auth::check())
    <form id="myForm" class="form" method="post" action="{{ url('/register') }}">
        @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="checkout-form">
                    <h2>Make Your Checkout Here</h2>
                    <p>Please register in order to checkout more quickly</p>
                    <!-- Form -->

                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>First Name<span>*</span></label>
                                    <input type="text" name="name" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Last Name<span>*</span></label>
                                    <input type="text" name="lastname" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Email Address<span>*</span></label>
                                    <input type="email" name="email" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Phone Number<span>*</span></label>
                                    <input type="number" name="tel" placeholder="" required="required">
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Address <span>*</span></label>
                                    <input type="text" name="adresse" placeholder="" >
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Password<span>*</span></label>
                                    <input type="password" name="password" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label> Confirm Password<span>*</span></label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" autocomplete="new-password">
                            </div>
                        </div>


                        </div>

                    <!--/ End Form -->
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>CART  TOTALS</h2>
                        <div class="content">
                            <ul>
                                <li>Sub Total<span>{{ $total }} TND</span></li>
                               {{--   <li>(+) Shipping<span>$10.00</span></li> --}}
                                <li class="last">Total<span>{{ $total }} TND</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Order Widget -->

                    <!--/ End Order Widget -->
                    <!-- Payment Method Widget -->

                    <!--/ End Payment Method Widget -->
                    <!-- Button Widget -->
                    <div class="single-widget get-button">
                        <div class="content">
                            <div class="button">

                                <button type="submit" class="btn btn-success"> register here!! </button>

                            </div>
                        </div>
                    </div>
                    <!--/ End Button Widget -->

                </div>
            </div>
        </div>
    </div>
</form>
@else
<div class="center-container">
    <p>You are registered.</p>
    <div class="button">
        <button class="btn btn-success" type="submit" form="myForm">
            <a href="{{ route('exercice.addorder') }}">Checkout here</a>
        </button>
    </div>
</div>

@endif

</section>
<!--/ End Checkout -->

<!-- Start Shop Services Area  -->

<!-- End Shop Services -->
@endsection
