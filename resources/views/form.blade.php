@extends('layouts.template')
@section('content')
<form action="{{ route('order.post') }}" method="post">
    @csrf
    <label for="date">date</label>
    <input type="date" name="date" id="date" required>

    <label for="num">num</label>
    <input type="number" name="num" id="num" required>
    <button type="submit">envoyer</button>
</form>
@endsection
