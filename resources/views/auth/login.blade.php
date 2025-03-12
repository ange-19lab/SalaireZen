<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salaire</title>
</head>
<body>
    
<link href="https://fonts.googleapis.com/css?family+Open+Sans:700,600" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{asset('css/auth.css')}}">

<form method="post" action="{{route('handleLogin')}}">

       @csrf
       @method('POST')

       <div class="box">
        <h1>Espace de Connexion</h1>
 
        <!-- {{Hash::make('azerty')}} -->
           @if (Session::get('error_msg'))
                 <b style="font-size:10px; color:rgb(175, 50, 50)"> {{ Session::get('error_msg') }}</b>
           @endif

        <input type="email" name="email" class="email" />

        <input type="password" name="password" class="email" />

        <div class="btn-container">
            <button type="submit"> Connexion </button>
        </div>

       </div>

</form>

</body>
</html>
