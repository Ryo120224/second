<script setup>
    import axios from 'axios';
    import ChatForm from './ChatForm.vue';
    import ChatMessages from './ChatMessages.vue';
    import { ref } from 'vue';

    const messages = ref([]);

    axios
        .get("/messages")
        .then(res => {
            messages.value = res.data;
        });
        
    window.Echo
        .channel('chat_test')  // 作成したイベントのチャンネル名と合わせる
        .listen('chat', (e) => {  // 第一引数はイベントのクラス名
            messages.value = createNewMessage({
                body: e.comment.body,
                user_name: e.comment.user_name
            });
        });

    // 新規メッセージ（表示用）の作成
    const createNewMessage = (message) => {
        let newMessages = JSON.parse(JSON.stringify(messages.value));
        newMessages.push(message);
        return newMessages;
    };

    // メッセージをバックエンドに送信
    const addMessage = async (message) => {
        messages.value = createNewMessage({
            body: message.message,
            user_name: "testさん"
        });
        const res = await axios.post("/messages", message);
    };
</script>

<template>
    <div class="py-12 h-[600px]">
        <div class="mx-[8%] bg-white h-full overflow-y-scroll p-3">
            <ChatMessages :messages="messages" />
        </div>
        <div class="mx-[8%] bg-white border-t-2">
            <ChatForm @messagesent="addMessage" />
        </div>
    </div>
</template>