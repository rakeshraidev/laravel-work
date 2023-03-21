<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>Login Page</title>
</head>

<body>
    <div class="contraner" style="margin-left: 200px;">
        <div class="row">

           <div class="col-lg-4 col-md-offset-4 style="margin-top: 20px;">
            <h4> Welcome to dashbaord</h4>
            <hr/>

            <table  border="1" class="table">
                <tr>
                  <td width="163">Name</td>
                  <td width="198">Email</td>
                  <td width="198">Email</td>
                </tr>
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td><a href="logout">logout</td>
                </tr>
              </table>
              
  
</div>

</div>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
