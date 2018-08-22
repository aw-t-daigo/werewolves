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
                axios.post('http://werewolves/api/chat/werewolves', {
                    message: message,
                }).then(response => {
                    // this.message = "";
                })
            }
        }
    }
</script>

<style scoped>

</style>
