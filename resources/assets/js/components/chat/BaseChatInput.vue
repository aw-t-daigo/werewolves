<template>
        <input type="text" v-model="message">
</template>

<script>
    export default {
        name: "BaseChatInput",
        data() {
            return {
                message: null,
            }
        },
    }
</script>

<style scoped>

</style>
