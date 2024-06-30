@extends('layouts.template')
@section('title')
<title>page about</title>
@endsection
@section('content')
<p>c’est la page présentation</p>

@php
    $no1=10;
    $no2=15;
    $moy=($no1+$no2)/2;
    $tab=[];
@endphp

{{ $moy }}<br>
@forelse ( $tab as $note )
{{ $note."//" }}
@empty
<p>aucune note</p>
@endforelse
@endsection

