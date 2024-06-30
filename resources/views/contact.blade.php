@extends('layouts.template')
@section('title')
<title>page contact</title>
@endsection
@section('content')

<form action="{{ route('exercice.post') }}" method="post">
    @csrf
    <label class="form-label" for="nom">votre nom</label>
    <input class="form-control" type="text" name="nom" id="nom" required>

    <label class="form-label" for="prenom">votre prenom</label>
    <input class="form-control" type="text" name="prenom" id="prenom" required>

    <label class="form-label" for="email">votre email</label>
    <input class="form-control" type="email" name="email" id="email" required>

    <label class="form-label" for="age">votre age</label>
    <input class="form-control" type="date" name="age" id="age" required>
    <button class="btn btn-primary mt-3" type="submit">envoyer</button>
</form>
@endsection
