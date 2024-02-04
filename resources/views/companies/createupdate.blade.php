<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4 offset-md-2">

                <div class="card mt-5">
                    <div class="card-body">

                        @if (isset($user))
                            <form class="col-12" method="post" action="{{ route('companies.update', $user->id) }}">
                        @else
                            <form class="col-12" method="post" action="{{ route('companies.store') }}">
                        @endif
                        @csrf
                            <h4>@if (isset($user)) Edit @else Add @endif companie</h4>
                            <div class="mb-12">
                                <label for="ticker" class="form-label">Simbol companie</label>
                                <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}" />
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-12">
                                <label for="name" class="form-label">Nume companie</label>
                                <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? '') }}" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid col-6 mb-12 mx-auto">
                                <button type="submit" class="btn btn-default">Salve</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>