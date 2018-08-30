<template>
    <div class="wolf-chat">
        <base-chat-input v-on:send="send" />
    </div>
</template>

<script>
    import BaseChatInput from "./BaseChatInput";
    import axios from "axios";

    export default {
        name: "WolfChatInput",
        components: {BaseChatInput},
        props: {
            message: String,
        },
        methods: {
            send(message) {
                axios.post('../../api/chat/werewolves', {
                    message: message,
                });
            }
        }
    }
</script>

<style scoped>

</style>
