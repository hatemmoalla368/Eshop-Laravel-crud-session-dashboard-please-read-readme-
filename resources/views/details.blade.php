@extends("layouts.template")
@section("content")

@if(Session::has("success"))
<div class="alert alert-success">
{{Session::get("success")}}
</div>
@endif

<h1>Order Details</h1>

<div>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Date:</strong> {{ $order->date }}</p>
    <p><strong>Status:</strong> {{ $order->validated ? 'Validé' : 'Non validé' }}</p>
</div>

<h2>Order Lines</h2>

<table class="table table-stripped table-bordered">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderlines as $orderline)
        <tr>
            <td>{{ $orderline->product_id }}</td>
            <td>{{ $orderline->product_name }}</td>
            <td>{{ $orderline->qte }}</td>
            <td>{{ $orderline->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>

@endsection
