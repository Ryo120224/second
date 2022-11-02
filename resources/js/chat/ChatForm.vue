<script setup>
    import { ref } from 'vue';

    // 入力されたメッセージ
    const newName = ref('');
    const newMessage = ref('');

    const emit = defineEmits(["messagesent"]);

    // メッセージの送信
    const sendMessage = () => {
        if (newMessage.value.replace(/\r?\n/g, '').length > 0 ) {
            emit("messagesent", { message: newName.value },{ message: newMessage.value });
            newName.value="";
            newMessage.value = "";
        }
    };
</script>

<template>
    <div class="text-center">
        <textarea
            class="border-0 border-white w-full"
            placeholder="名前を入力"
            v-model="newName"
            @keyup.enter="sendMessage"
        />
        <textarea
            class="border-0 border-white w-full"
            placeholder="メッセージを入力"
            v-model="newMessage"
            @keyup.enter="sendMessage"
        />
    </div>
</template>