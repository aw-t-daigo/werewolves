<template>
    <div class="text-area">
        <div class="message-box" v-for="message in messageList">
            <span>
                <small>{{message.playerName}} :</small>
                <span>{{message.message}}</span>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BaseTextArea",
        props: {
            messageList: Array,
        }
    }
</script>

<style scoped>

</style>
