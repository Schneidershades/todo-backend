<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mailerlite Subscribers Manager</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">  

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
<div class="wrapper">
    <div class="auth-form-container">
        <form action="{{route('validate-api-key')}}" method="post">
            <div class="auth-form-header">
                Mailerlite
            </div>
            <div class="auth-form-body">
                <label for="api-key-field" class="api-key-label">API Key</label>
                <input type="text" name="api_key" id="api-key-field" required>
            </div>
            <div class="auth-form-footer">
                <button class="submit-button" type="submit">Authorise</button>
                @if($errors->any())
                    <span class="err-message">{{$errors->first()}}</span>
                @endif
                @if(session()->has('error'))
                    <span class="err-message">{{session()->get('error')}}</span>
                @endif
            </div>
        </form>
    </div>
</div>
</body>
</html>
