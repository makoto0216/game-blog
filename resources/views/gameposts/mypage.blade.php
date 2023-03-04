<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h2>マイページ</h2>
        <h2 class = 'username'>{{ $user->name }}</h2>
        <p class = 'profile'>{{ $user->profile->body }}</p>
        <div class='posts'>
            @foreach ($user->gameposts as $gamepost)
                <div class='post'>
                    <div class='user'>
                        <h3 class='name'>{{ $user->name }}</h3>
                    </div>
                    <h3 class='title'>
                        <a href="/gameposts/{{ $gamepost->id }}">{{ $gamepost->title }}</a>
                    </h3>
                    <p class='body'>{{ $gamepost->body }}</p>
                </div>
            @endforeach
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>