<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered mt-5">
                    <tr>
                        <td>Id</td>
                        <td>User Id</td>
                        <td>Title</td>
                        <td>Content</td>
                    </tr>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->user_id}}</td>
                        <td>{{Illuminate\Support\Str::limit($blog->title, 45)}}</td>
                        <td>{{Illuminate\Support\Str::limit($blog->content, 45)}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{$blogs->links()}}
        </div>
    </div>
</body>
</html>