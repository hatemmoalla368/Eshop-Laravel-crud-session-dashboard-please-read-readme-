@extends('layouts.front.template')
@section('content')
<style>
   

    .center-container {
        text-align: center;
        background-color: #fff; /* White background for the container */
        padding: 20px;
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        margin: 20px; /* Margin from all sides */
    }

    h1 {
        color: #28a745; /* Green color for success message */
        margin-bottom: 10px;
    }

    h2 {
        color: #333; /* Darker color for order ID */
    }
</style>
<div class="center-container">
    <h1>Votre commande a été effectuer Avec Success</h1>
    <h2>l'id de votre commande est {{ $order_id }}</h2>
</div>

@endsection
