<template>
    <div class="text-area">
        <div class="message-box" v-for="message in messageList">
            <p>
                <small>{{message.playerName}} :</small>
                <span>{{message.message}}</span>
            </p>
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
