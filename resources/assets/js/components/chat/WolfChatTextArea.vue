<template>
    <base-text-area :message-list="messageList"></base-text-area>
</template>

<script>
    import BaseTextArea from "./BaseTextArea";
    import axios from 'axios';

    export default {
        name: "WolfChatTextArea",
        components: {BaseTextArea},
        data() {
            return {
                messageList: [],
                roomId: null,
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
                this.roomId = roomId;
                Echo.channel('werewolves.' + this.roomId)
                    .listen('WerewolvesReceived', e => {
                        // TODO: 全体チャンネル追加
                        this.messageList.push(e.message);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
