<template>
    <div class="base-chat">
        <input type="text" v-model="message">
        <button v-on:click="send">送信</button>
    </div>
</template>

<script>
    export default {
        name: "BaseChatInput",
        data() {
            return {
                message: null,
            }
        },
        methods: {
            send() {
                this.$emit('send', this.message);
                this.message = "";
            },
        },
    }
</script>

<style scoped>

</style>
