<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>GameBlog</title>
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
                
            textarea {
                width:100%;
                height:100px;
            }
            
            
            
        </style>
    </head>
    <body>
        <h1>投稿作成画面</h1>
        <!-- formタグにenctypeを追加 -->
        <form action="/gameposts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="gamepost[title]" placeholder="title..."/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="gamepost[body]" placeholder="body..."></textarea>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <input type="submit" value="投稿"/>
        </form>
        <div class="footer">
            <a href="/gameposts/usermypage/{{ Auth::user()->id }}">戻る</a>
        </div>
    </body>
</html>