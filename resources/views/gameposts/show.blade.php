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
            @if($gamepost->image_url)
                <div>
                    <img src="{{ $gamepost->image_url }}" alt="画像が読み込めません。"/>
                </div>
            @endif
            <div class="comment_confirmation">
            <p class="post_content"><?= nl2br($gamepost['text']) ?></p>
            <form action="/gameposts/comments" method="POST">
                @csrf
            <input
                    name="gamepost_id"
                    type="hidden"
                    value="{{ $gamepost->id }}"
                >
            <textarea name="comment[body]" placeholder="コメントを入力してください"></textarea>
                <input type="submit" value="コメント"/>
            </form>
        </div>
        </div>
        <div class='comments'>
            <div class='comment'>
            @foreach($gamepost->comments as $comment)
                <div class='user'>
                    <h3 class='name'>{{ $comment->user->name }}</h3>
                </div>
                <p>{{$comment->body}}</p>
            @endforeach
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>