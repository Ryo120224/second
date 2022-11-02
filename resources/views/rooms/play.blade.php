<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Play room</title>
    <!--<script defer src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js"></script>-->

    <!-- Styles&Scripts -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <h1>Chat app</h1>
    <div class='room'>
    <h2 class='title'>
    {{ $room->title }}
    </h2>
    </div>
    <div class='play'>
    <div class='characters'>
    <a href='/play/create/{{$room->id}}'>キャラクター追加</a>
    @foreach ($characters as $character)
    <!-- 折り畳み展開ポインタ -->
    <div class=character>
<div onclick="obj=document.getElementById('open').style; obj.display=(obj.display=='none')?'block':'none';">
<a style="cursor:pointer;">▼ クリックで展開</a>
</div>
<!--// 折り畳み展開ポインタ -->

<!-- 折り畳まれ部分 -->
<div id="open" style="display:none;clear:both;">

<!--ここの部分が折りたたまれる＆展開される部分になります。
自由に記述してください。-->
        <a href='/statu/create/{{$character->id}}'>追加</a>
        @foreach($statuses as $status)
        <div class='statu'>
            <h3>{{$status->name}}</h3>
            {{$status->status}}
        </div>
        @endforeach
</div>
<!--// 折り畳まれ部分 -->
</div>
@endforeach
</div>
<div class=chat>
    <div id="chat">
        <!--<input type="text" v-model="addMessage">-->
    </div>
    </div>
    </div>
</body>
</html>