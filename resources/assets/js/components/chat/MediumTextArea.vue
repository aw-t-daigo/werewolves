<template>
    <div class="text-area">
        <div class="message-box" v-for="message in messageList">
            <p>
                <small>{{message.playerName}} :</small>
                <span>{{message.message}}</span><br />
                <span v-if="message.medium"><small>GM : </small>{{message.medium}}</span>
            </p>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "MediumTextArea",
        data() {
            return {
                messageList: [],
            }
        },
        mounted() {
            this.getRoomId().then(e => this.connect(e));
        },
        methods: {
            async getRoomId() {
                return axios.get('http://werewolves/api/room-id')
                    .then(resp => {
                        return resp.data;
                    });
            },
            connect(roomId) {
                Echo.channel('werewolves.' + roomId)
                    .listen('PunishmentReceived', e => {
                        this.messageList.push(e.message);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
