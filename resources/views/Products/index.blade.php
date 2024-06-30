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
            <th>Name</th>
            <th>Photo</th>
            <th>Price</th>
            <th>Description</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
@forelse ($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td><img src={{asset('photos/'.$product->photo)}} width="80" /></td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->category->name}}</td>
            <td>
                <a href="{{route('products.edit',$product->id)}}"><button class="btn btn-success">edit</button>
                <form class="d-inline" method="post" action="{{route('products.destroy',$product->id)}}">
                   @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger" onclick="return confirm('etes vous sure de supprimer?')">delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">pas de produits pour le moment!</td>
        </tr>
@endforelse
    </tbody>
</table>
@endsection
