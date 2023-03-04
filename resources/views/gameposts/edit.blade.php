<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
<body>
    <h1 class="title">プロフィール編集画面</h1>
    <div class="content">
        <form action="/gameposts/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content'>
                <h2>プロフィール</h2>
                <input type='text' name='profile[body]' value="{{ $profile->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>