<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: arial;
        }
    </style>
</head>
<body>
    <h4>
        {{ $article->titre }}
    </h4>
    <h4>
        {{ $article->titre_fr }}
    </h4>
    <hr>
    <p>
        {!! $article->contenu !!}
    </p>
    <p>
        {!! $article->contenu_fr !!}
    </p>
    <p>
        <strong>Author: </strong> {{ $article->user->name }}
    </p>
    
    
</body>
</html>