@extends('layouts.front.template')
@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error )
        {{ $error }}

        @endforeach
    </div>

    @endif
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">

                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">TOTAL</th>

                    </thead>
                    <tbody>
                        @php
                            $total = 0
                        @endphp
                        {{--  @if (is_array($orders)) --}}
                        @forelse ($orders as $order )

                        @if (isset($order["qte"]) && is_numeric($order["qte"]))
                        @php
            $total += $order["qte"] * $order["price"];
            @endphp

@endif

                        <tr>

                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#">{{ $order['product_name'] }}</a></p>

                            </td>
                            <td class="price" data-title="Price"><span>{{ $order['price'] }} TND </span></td>
                            <td class="qty" data-title="Qty"><!-- Input Order -->
                                {{ $order['qte'] }}
                            </td>
                            <td class="total-amount" data-title="Total"><span>{{ $order['price'] * $order['qte'] }}</span></td>
                          {{--    <td class="action" data-title="Remove">
                                <form action="{{ route('exercice.removeproduct') }}" method="post">
                                    @csrf


                                    <input type="hidden" name="id" value="{{ $order["id"] }}">
                                <button><i class="fa fa-remove" type="submit"></i></button>
                                </form>
                            </td>  --}}




                    </tr>
                    @empty



                    @endforelse




                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>total de vos orders<span>{{ $total }} TND</span></li>
                                    {{--  <li>Shipping<span>Free</span></li>--}}


                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->
@endsection
