<template>
    <div class="text-area">
        <div class="message-box" v-for="message in state.messageList">
            <p>
                <small>{{message.playerName}} :</small>
                <span>{{message.message}}</span><br/>
                <span v-if="message.medium"><small>GM : </small>{{message.medium}}</span>
            </p>
        </div>
    </div>
</template>

<script>
    import store from '../../store.js';

    export default {
        name: "MediumTextArea",
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
                    });
            }
        }
    }
</script>

<style scoped>

</style>
