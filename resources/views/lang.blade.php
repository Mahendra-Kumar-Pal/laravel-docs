<!DOCTYPE html>
<html>
<head>
    <title>How to Create Multi Language Website in Laravel - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    @if (Route::has('login'))
    &emsp;<a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="float:right">Index</a>&emsp;
    &emsp;<a href="{{ route('home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline float-right" style="float:right">Home</a>&emsp;
    @endif
    <div class="container pt-10">
        <div class="row">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong>Select Language: </strong>
            </div>
            <div class="col-md-4">
                <select class="form-control changeLang">
                    <option>Select Language</option>
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                    <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option>
                </select>
            </div>
        </div>
        <h1>{{ __('messages.title') }}</h1>
    </div>
</body>
<script type="text/javascript">
    var url = "{{ route('changeLang') }}";
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
</script>
</html>