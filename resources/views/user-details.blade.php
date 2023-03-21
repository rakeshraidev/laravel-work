<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>User Details</title>
</head>
<body>
    <div class="contraner" style="margin-left: 200px;">
        <div class="row">

           <div class="col-lg-8 col-md-offset-4 style="margin-top: 20px;">
            <h4> User Details</h4>
            <hr/>
{{-- @if(count($users))
@foreach($users as $key=>$value)
<p>{{$key}} </p>
@endforeach
@else
<p>no user found</p>
@endif --}}
<table class="table table-striped">
<tr>
    <td>User Id</td>
    <td>Full Name</td>
    <td>Email Id</td>
    <td>Created Date</td>
    <td></td>
    <td></td>
</tr>
    @foreach($users as $user)
    <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->created_at}}</td>
     <td><button class="btn btn-primary">Edit</button></td>
    <td><button class="btn btn-danger">Delete</button></td>
    {{-- <td>{{$user['name']}}</td>
    <td>{{$user['email']}}</td>
    <td>{{$user['created_at']}}</td> --}}
    {{-- <td><button class="btn btn-primary">Edit</button></td>
    <td><button class="btn btn-danger">Delete</button></td> --}}
    </tr>
    @endforeach
</table> 
</div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
