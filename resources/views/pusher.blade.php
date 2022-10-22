<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat app</title>
    <script defer src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js"></script>

    <!-- Styles&Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Chat app</h1>

    {{-- エンターキーによるボタン押下を行うために、
         <button type="button">ではなく、<form>と<button type="submit">を使用。
         ボタン押下(=submit)時にページリロードが行われないように、
         onsubmitの設定の最後に"return false;"を追加。
         (return false;の結果として、submitが中断され、ページリロードは行われない。）--}}
    <!--<form method="post" action="" onsubmit="return false;">-->
    <!--    ニックネーム : <input type="text" id="input_nickname" autocomplete="off" />-->
    <!--    <br />-->
    <!--    メッセージ : <input type="text" id="input_message" autocomplete="off" />-->
    <!--    <button type="submit">送信</button>-->
    <!--</form>-->
<div class="py-12 h-[600px]" x-data="messages">

        {{-- メッセージ表示部分 --}}
        <div class="mx-[8%] bg-white h-full overflow-y-scroll p-3">
            <ul class="chat">
                <template x-for="message in showMessages">
                    <li class="left clearfix">
                        <div class="clearfix">
                            <div class="header">
                                <strong x-text="message.user_name"></strong>
                            </div>
                            <div class="mb-2 text-white">
                                <p x-text="message.body" class="bg-[#6CC655] inline p-1 mb-2 rounded"></p>
                            </div>
                        </div>
                    </li>
                </template>
            </ul>
        </div>

        {{-- メッセージ入力部分 --}}
        <div class="mx-[8%] bg-white border-t-2">
            <div class="text-center">
                <textarea
                    class="border-0 border-white w-full"
                    placeholder="メッセージを入力"
                    x-model="newMessage"
                    @keyup.enter="sendMessage(newMessage)"
                ></textarea>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('messages', () => ({
                newMessage: '',   // 入力箇所のメッセージ内容
                showMessages: [], // メッセージ一覧

                // ページ表示時に実行（メッセージ一覧の取得）
                async init() {
                    const res = await window.axios.get('/messages');
                    this.showMessages = res.data;
                    window.Echo
                    .private('chat_test')  // 作成したイベントのチャンネル名と合わせる
                    .listen('chat', async (e) => {  // 第一引数はイベントのクラス名
                    console.log('test')
                    const res = await axios.get('/messages');
                    this.showMessages = res.data;
        });

                },

                // メッセージの保存
                async sendMessage(message) {
                    const res = await window.axios.post('/messages', { user_name:"ryo",body:message });
                    this.showMessages = res.data;
                    this.newMessage = '';
                },
            }))
        });
    </script>

</body>
</html>