<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Trpg</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='rooms'>
            <div class='room'>
                <h2 class='title'>
                    {{ $room->title }}
                </h2>
            </div>
        </div>
        <form action="/enter/{{$room->id}}" method="POST">
            @csrf
            <div class="test">
                <h3>password</h3>
                <input type="text" name="wpass" placeholder="please write password!!"value="{{old('wpass')}}"/>
                <p class="password__error" style="color:red">{{ $errors->first('wpass') }}</p>
            </div>
            <input type="submit" value="enter"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>