<template>
    <div class="input-group">
        <input type="text" class="form-control form-control-lg" v-model="message">
        <span class="input-group-btn">
            <button class="btn btn-primary btn-lg" v-on:click="send">送信</button>
        </span>
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
