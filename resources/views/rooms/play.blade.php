<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat app</title>
    <!--<script defer src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js"></script>-->

    <!-- Styles&Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Chat app</h1>
    <div class='room'>
    <h2 class='title'>
    {{ $room->title }}
    </h2>
    </div>
    <div id="chat">
        <!--<input type="text" v-model="addMessage">-->
    </div>
    
</body>
</html>