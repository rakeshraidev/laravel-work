<h2>welcome to greetings</h2>
@if(count($users))
@foreach($users as $key=>$value)
<p> {{$key}} </p>
@endforeach

@else
<p>no users found</p>
@endif