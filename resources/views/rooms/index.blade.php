<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Trpg</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Room Name</h1>
        <a href='/rooms/create'>create</a>
        <div class='rooms'>
            @foreach ($rooms as $room)
                <div class='room'>
                    <h2 class='title'>
                        <a href="/rooms/{{$room->id}}">{{ $room->title }}</a>
                        </h2>
                    <p class='pasward'>{{ $room->password }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $rooms->links() }}
        </div>
    </body>
</html>