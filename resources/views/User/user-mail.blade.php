<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User mail</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 p-3">
                <div class="card">
                    <div class="card-body">
                        <h2>Hi {{$mail_data['name']}}</h2>
                        <p>{{$mail_data['email']}}</p>
                        <p>Message ...</p>
                        <a href="#" class="btn btn-md btn-info">Go To >></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>