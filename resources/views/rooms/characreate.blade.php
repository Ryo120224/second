<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Trpg</title>
    </head>
    <body>
        <h1>追加キャラクター</h1>
        <form action="/character/{{$room->id}}" method="POST">
            @csrf
            <div class="title">
                <h2>名前</h2>
                <input type="text" name="character[name]" placeholder="名前"value="{{old('character.name')}}"/>
                <p class="title__error" style="color:red">{{ $errors->first('character.name') }}</p>
            </div>
            <input type="submit" value="cstore"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>