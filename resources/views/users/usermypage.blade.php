<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>GameBlog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h2>マイページ</h2>
        <h2 class = 'username'>{{ $user->name }}</h2>
        <p class = 'profile'>{{ $user->profile->body }}</p>
        <div class = 'profile_edit'>
            <p>プロフィール：<a href="/profile/{{ $user->profile->id }}/edit">編集</a></p>
        </div>
        <div class = 'user_edit'>
            <p>ユーザー情報：<a href="/profile">編集</a></p>
        </div>
        <a href='/gameposts/create'>投稿作成</a>
        <div class="gameposts">
            @foreach ($user->gameposts as $gamepost)
                <div class='gamepost'>
                    <div class='user'>
                        <h3 class='name'>{{ $user->name }}</h3>
                    </div>
                    <h3 class='title'>
                        <a href="/gameposts/{{ $gamepost->id }}">{{ $gamepost->title }}</a>
                    </h3>
                    <p class='body'>{{ $gamepost->body }}</p>
                    <form action="/gameposts/delete/{{ $gamepost->id }}" id="form_{{ $gamepost->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $gamepost->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <script>
            function deletePost(id) {
            'use strict'
            
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>