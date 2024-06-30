@foreach ( $inputs as $ind=>$val )
@if ($ind!= "_token")
<p>votre {{ $ind }} est : {{ $val }}</p>
@endif

@endforeach
