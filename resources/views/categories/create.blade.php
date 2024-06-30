@extends('layouts.template')
@section('title')
<title>page d'ajout de category</title>
@endsection
@section('content')
@if ($errors->any())
<ul class="alert alert-danger">
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif
<form action={{ route("categories.store") }} method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
    <label class="form-label" for="name">nom de la categorie</label>
    <input class="form-control" type="text" name="name" id="name">
</div>
<div class="col-md-12">
    <button class="btn btn-primary mt-3" type="submit">ajouter</button>
    <button class="btn btn-secondary mt-3" type="reset">annuller</button>
</div>
</div>

</form>
@endsection
