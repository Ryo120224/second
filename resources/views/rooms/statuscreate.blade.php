<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Trpg</title>
    </head>
    <body>
        <h1>追加ステータス</h1>
        <form action="/status/{{$room->id}}/{{$character->id}}" method="POST">
            @csrf
            <div class="title">
                <h2>ステータス名</h2>
                <input type="text" name="status[name]" placeholder="名前"value="{{old('status.name')}}"/>
                <p class="title__error" style="color:red">{{ $errors->first('status.name') }}</p>
            </div>
            <div class="status">
                <h2>ステータス</h2>
                <input type="integer" name="status[status]" placeholder="status"value="{{old('status.status')}}"/>
                <p class="title__error" style="color:red">{{ $errors->first('status.status') }}</p>
            </div>
            <input type="submit" value="sstore"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>