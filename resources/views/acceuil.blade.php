@extends('layouts.front.template')
@section('content')

  <!-- Slider Area -->
  <section class="hero-slider">
    <!-- Single Slider -->
    @include('layouts.front.singleslider')
    <!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->


<!-- Start Small Banner  -->
<section class="small-banner section">
    @include('layouts.front.smallbanner')
</section>
<!-- End Small Banner -->

<!-- Start Product Area -->
@include('layouts.front.productarea')
<!-- End Product Area -->

<!-- Start Midium Banner  -->
@include('layouts.front.midiumbanner')
<!-- End Midium Banner -->

<!-- Start Most Popular -->
@include('layouts.front.mostpopular')
<!-- End Most Popular Area -->

<!-- Start Shop Home List  -->
@include('layouts.front.shophomelist')
<!-- End Shop Home List  -->

<!-- Start Cowndown Area -->
@include('layouts.front.cowndownarea')
<!-- /End Cowndown Area -->

<!-- Start Shop Blog  -->
@include('layouts.front.shopblog')
<!-- End Shop Blog  -->

<!-- Start Shop Services Area -->
@include('layouts.front.shopservices')
<!-- End Shop Services Area -->

<!-- Start Shop Newsletter  -->
@include('layouts.front.shopnewsletter')
<!-- End Shop Newsletter -->
@endsection
