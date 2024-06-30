@extends("layouts.template")
@section("content")

@if(Session::has("success"))
<div class="alert alert-success">
{{Session::get("success")}}
</div>
@endif

<table class="table table-stripped table-bordered">
    <thead>
        <tr>
            <th>date de checkout</th>
            <th>id de client</th>
            <th>nom du client</th>
            <th>email du client</th>
            <th>telephone du client</th>
            <th>adresse du client</th>
            <th>valider </th>
        </tr>
    </thead>
    <tbody>
@forelse ($orders as $order)
        <tr>
            <td>{{$order->date}}</td>
            <td>{{$order->user_id}}</td>
            <td>{{$order->user_name}}</td>
            <td>{{$order->user_email}}</td>
            <td>{{$order->user_tel}}</td>
            <td>{{$order->user_adresse}}</td>
            <td>
                <form method="POST" action="{{ route('orders.update', $order->id) }}">
                    @csrf
                    @method('PATCH') <!-- Use PATCH method for updating existing resource -->

                    <select name="validated" onchange="this.form.submit()">
                        <option value="non" {{ $order->validated == false ? 'selected' : '' }}> n'est pas validé</option>
                        <option value="oui" {{ $order->validated ? 'selected' : '' }}> validé</option>
                    </select>

                    <!-- Hidden field to send the order ID -->
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                </form>
            </td>

            <td>
                <a href="{{ route('orders.details', $order->id) }}" class="btn btn-info">Details</a>

            </td>


        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">pas d'ordre pour le moment!</td>
        </tr>
@endforelse
    </tbody>
</table>
@endsection
