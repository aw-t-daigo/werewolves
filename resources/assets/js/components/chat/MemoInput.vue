<template>
    <div class="common-memo">
        <base-chat-input v-on:send="memo"></base-chat-input>
    </div>
</template>

<script>
    import BaseChatInput from "./BaseChatInput";
    import store from '../../store.js';

    export default {
        name: "MemoInput",
        components: {BaseChatInput},
        props: {
            message: String,
        },
        methods: {
            memo(message) {
                const memo = {
                    message: message,
                    playerName: 'MEMO',
                };
                store.pushMessageList(memo);
            }
        }
    }
</script>

<style scoped>

</style>
