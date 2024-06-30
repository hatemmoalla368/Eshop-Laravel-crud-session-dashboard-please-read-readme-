@extends('layouts.template')
@section('title')
<title>page category</title>
@endsection
@section('content')
@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>

@endif
<table class="table table-stripped table-bordered">
    <thead>
        <tr>
            <th>name</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category )

        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <a href={{ route('categories.edit', $category->id) }}><button class="btn btn-success">edit</button></a>
                <form class="d-inline" action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('delete')
                <button class="btn btn-danger" onclick=" return confirm('etes vous sure de supprimer ?')">delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2" class="text-center"> pas de categorie a ce moment</td>
        </tr>

        @endforelse
    </tbody>
</table>
@endsection
