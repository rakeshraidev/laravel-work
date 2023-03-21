<h1>hi </h1>
@if(count($users))
@foreach($users as $key=>$value)
<p>{{$key}} </p>
@endforeach
@else
<p>no user found</p>
@endif

