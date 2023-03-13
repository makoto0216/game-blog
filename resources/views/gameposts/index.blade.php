<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @vite('resources/css/app.css')
        <style>
            body {
                background:#D2B48C;
                font-family: 'SimHei', sans-serif;
                color: #555555;
                padding: 0.5em 1em;
                margin: 1em 1em;
                font-weight: bold;
                background: #FFF;
                border: solid 3px #BC8F8F;
                border-radius: 10px;
                }
            
            h1 {
                font-size: 35px;
            }

            .cp_hr01 {
                border-width: 1px 0 0 0;
                border-style: solid;
                border-color: #BC8F8F;
            }
                
        </style>
    </head>
    <body>
        <h1>ゲーム攻略共有サイト</h1>
        <div　class= 'search_box' style='margin: 20px'>
            <form action='{{ route('index') }}' method="GET">
                <input type='text' name='keyword' value='{{ $keyword }}' placeholder='keyword...'>
                <input type='submit' value='検索'/>
            </form>
        </div>
        <hr class="cp_hr01" style='margin: 20px'/>
        <div class = 'search_posts' 'margin-top: 20px; margin-left: 20px;'>
            @forelse ($gameposts as $gamepost)
                <div class='post'style='margin-top: 20px;'>
                    <div class='user' style='font-size: 20px;'>
                            <a href="/gameposts/user/{{ $gamepost->user->id }}">{{ $gamepost->user->name }}</a>
                        </h3>
                    </div>
                    <h3 class='title' style='font-size: 20px;'>
                        <a href="/gameposts/{{ $gamepost->id }}">{{ $gamepost->title }}</a>
                    </h3>
                    <p class='body'>{{ $gamepost->body }}</p>
                </div>
            @empty
                <h3>このキーワードに関連する投稿はありません</h3>
            @endforelse
        </div></hr>
        {{--<div class = 'paginate'>{{ $gameposts->links() }}</div>--}}
        <div class = 'login_user' style='margin-top: 20px;'>
            <p class = 'username'>ログインユーザー：
            <a href="/gameposts/usermypage/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a></p>
        </div>
    </body>
</html>
