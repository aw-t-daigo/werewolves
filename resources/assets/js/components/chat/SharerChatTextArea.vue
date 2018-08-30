<template>
    <base-text-area :message-list="state.messageList"></base-text-area>
</template>

<script>
    import BaseTextArea from "./BaseTextArea";
    import store from "../../store";

    export default {
        name: "SharerTextArea",
        components: {BaseTextArea},
        data() {
            return {
                state: store.state,
            }
        },
        mounted() {
            store.fetchRoomInfo()
                .then(e => this.connect(e))
                .then(() => store.startGame());
        },
        methods: {
            async connect(roomId) {
                Echo.channel('werewolves.' + roomId)
                    .listen('SharerReceived', e => {
                        store.pushMessageList(e.message);
                    })
                    .listen('PunishmentReceived', e => {
                        store.pushMessageList(e.message);
                        store.fetchLivingPlayer();
                    });
            }
        }
    }
</script>

<style scoped>

</style>
