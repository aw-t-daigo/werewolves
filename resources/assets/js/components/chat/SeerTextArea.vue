<template>
    <base-text-area :message-list="state.messageList"></base-text-area>
</template>

<script>
    import BaseTextArea from "./BaseTextArea";
    import store from '../../store.js';

    export default {
        name: "SeerTextArea",
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
                    .listen('PunishmentReceived', e => {
                        store.pushMessageList(e.message);
                        store.fetchLivingPlayer();
                    })
                    .listen('SeerReceived', e => {
                        store.pushMessageList(e.message);
                    });
            },
        },
    }
</script>

<style scoped>

</style>
