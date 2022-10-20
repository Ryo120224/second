<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Trpg</title>
    </head>
    <body>
        <h1>Room create</h1>
        <form action="/rooms" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="room[title]" placeholder="部屋の名前"value="{{old('room.title')}}"/>
                <p class="title__error" style="color:red">{{ $errors->first('room.title') }}</p>
            </div>
            <div class="body">
                <h2>password</h2>
                <input type="text" name="room[password]" placeholder="password"value="{{old('room.password')}}"/>
                <p class="password__error" style="color:red">{{ $errors->first('room.password') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>