<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite('resources/css/app.css')
    </head>
    <body>
        <h1 class = "text-center">ゲーム攻略共有サイト</h1>
        <div class='posts'>
            @foreach ($gameposts as $gamepost)
                <div class='post'>
                    <div class='user'>
                        <h3 class='name'>
                            <a href="/gameposts/user/{{ $gamepost->user->id }}">{{ $gamepost->user->name }}</a>
                        </h3>
                    </div>
                    <h3 class='title'>
                        <a href="/gameposts/{{ $gamepost->id }}">{{ $gamepost->title }}</a>
                    </h3>
                    <p class='body'>{{ $gamepost->body }}</p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>{{ $gameposts->links() }}</div>
        <div class = 'login_user'>
            <p class = 'username'>ログインユーザー：
            <a href="/gameposts/usermypage/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a></p>
        </div>
    </body>
</html>
