@extends('layouts.front.template')

@section('content')

		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{ route('exercice.acceuil') }}">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="#">Products liste</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
                @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error )
        {{ $error }}

        @endforeach
    </div>

    @endif
				<div class="row">

					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
                                        @forelse ($categories as $category )
                                        <li><a href="{{ route('exercice.produits', $category->id) }}">{{ $category->name }}</a></li>
                                        @empty
                                        <li>pas de categories pour le moment</li>

                                        @endforelse


									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->

									<!--/ End Shop By Price -->
								<!-- Single Widget -->

								<!--/ End Single Widget -->
								<!-- Single Widget -->

								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->

								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
@forelse ($products as $product )
<div class="col-lg-4 col-md-6 col-12">
    <div class="single-product">
        <div class="product-img">
            <a href="#">
                <img class="default-img" src="{{ asset('photos/'.$product->photo) }}" alt="#">
                <img class="hover-img" src="{{ asset('photos/'.$product->photo) }}" alt="#">
            </a>
            <div class="button-head">

                <div class="product-action-2">
                    <form action={{ route('exercice.addtocard') }} method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
                </div>
            </div>
        </div>
        <div class="product-content">
            <h3><a href="#">{{ $product->name }}</a></h3>
            <div class="product-price">
                <span>{{ $product->price }} TND</span>
            </div>
        </div>
    </div>
</div>
@empty
<h3>pas de produits pour le moment</h3>
@endforelse


						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->
@endsection
