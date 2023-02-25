<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='post_user'>
            <h3 class='username'>{{ $gamepost->user->name }}</h3>
        </div>
        <h3 class='title'>
            {{ $gamepost->title }}
        </h3>
        <div class='content'>
            <div class='content__post'>
                <p>{{ $gamepost->body }}</p>    
            </div>
        </div>
        @foreach($gamepost->comments as $comment)
            <p>{{$comment->body}}</p>
        @endforeach
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>