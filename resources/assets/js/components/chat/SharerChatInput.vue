<template>
    <div class="wolf-chat">
        <base-chat-input v-on:send="send"></base-chat-input>
    </div>
</template>

<script>
    import BaseChatInput from "./BaseChatInput";
    import axios from "axios";

    export default {
        name: "SharerChatInput",
        components: {BaseChatInput},
        props: {
            message: String,
        },
        methods: {
            send(message) {
                axios.post('http://werewolves/api/chat/sharer', {
                    message: message,
                })
            }
        }
    }
</script>

<style scoped>

</style>
