<template>
    <div class="wolf-chat">
        <base-chat-input />
        <button v-on:click="send">送信</button>
    </div>
</template>

<script>
    import BaseChatInput from "./BaseChatInput";
    import axios from "axios";

    export default {
        name: "WolfChatInput",
        components: {BaseChatInput},
        methods: {
            send() {
                axios.post('http://werewolves/api/chat/werewolves', {
                    message: this.message,
                }).then(response => {
                    // ここが反応してる
                    console.log(response.data);
                    this.message = "";
                })
            }
        }
    }
</script>

<style scoped>

</style>
