<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                @if(session('success_msg'))
                    <div class="alert alert-success">{{session('success_msg')}}</div>
                @endif
                <div class="card">
                    <div class="card-header"><span class="fw-bold">Profile</span></div>
                    <div class="card-body">
                        <form action="{{route('pro_store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="repeat">
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="name[]" aria-describedby="basic-addon1">
                              </div>
                              <div class="input-group mb-3">
                                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                  <input type="text" class="form-control" placeholder="Email" name="email[]" aria-describedby="basic-addon1">
                              </div>
                            </div>
                            <div class="text-center"><button type="button" class="btn btn-secondary add">Add Field</button></div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".add").click(function(){
        $(".repeat").append('<div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span> <input type="text" class="form-control" placeholder="Username" name="name[]" aria-describedby="basic-addon1"> </div> <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span> <input type="Email" class="form-control" placeholder="Email" name="email[]" aria-describedby="basic-addon1"> </div>');
      });
    });
  </script>
</html>