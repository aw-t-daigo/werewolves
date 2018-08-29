<template>
    <base-text-area :message-list="messageList"></base-text-area>
</template>

<script>
    import BaseTextArea from "./BaseTextArea";
    import axios from "axios";

    export default {
        name: "CommonTextArea",
        components: {BaseTextArea},
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
