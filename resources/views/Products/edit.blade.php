@extends("layouts.template")
@section("content")

<form action="{{route("products.update", $product->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
<div class="row">
<div class="col-md-6">
    @if($errors->any())
    <ul class="alert alert-danger ps-5">
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </ul>
    @endif
</div>
<div class="col-md-6"></div>
<div class="col-md-6">
    <label class="form-label" for="name">Nom produit</label>
<input class="form-control" type="text" value="{{$product->name}}" name="name" id="name" required>
</div>
<div class="col-md-6">
    <label class="form-label" for="price">Prix produit</label>
<input class="form-control" type="number" step="0.001" value="{{number_format($product->price,3,'.','')}}" name="price" id="price" required>
</div>
<div class="col-md-6">
    <label class="form-label" for="photo">Photo produit</label>
    <img src="{{ asset('photos/'. $product->photo) }}" width="150" class="m-3">
<input class="form-control" type="file" name="photo" id="photo" >
</div>
<div class="col-md-6">
    <label class="form-label" for="description">Description produit</label>
<textarea class="form-control" name="description" id="description" required>{{$product->description}}</textarea>
</div>
<div class="col-md-6">
    <label class="form-label" for="category_id">Categorie</label>
    <select class="form-control" name="category_id" id="category_id" required>
        <option value="">---- Choisir une categorie ----</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}" @if ($category->id==$product->category_id) selected @endif>{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="col-md-12">
<button type="submit" class="btn btn-primary mt-3">modifier</button>
<button type="reset" class="btn btn-secondary mt-3">Annuler</button>
</div>
</div>
</form>
@endsection
