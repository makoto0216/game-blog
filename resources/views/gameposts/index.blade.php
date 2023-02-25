<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ゲーム攻略共有サイト</h1>
        <div class='posts'>
            @foreach ($gameposts as $gamepost)
                <div class='post'>
                    <div class='user'>
                    <h3 class='username'>{{ $gamepost->user->name }}</h3>
                </div>
                    <h3 class='title'>
                        <a href="/gameposts/{{ $gamepost->id }}">{{ $gamepost->title }}</a>
                    </h3>
                    <p class='body'>{{ $gamepost->body }}</p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>{{ $gameposts->links() }}</div>
    </body>
</html>