<template>
    <div class="text-area">
        <div class="message-box" v-for="message in messageList">
            <p>
                <small>{{message.playerName}} :</small>
                <span>{{message.message}}</span>
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BaseTextArea",
        // props: {
        //     messageList: Array
        // },
        data() {
            return {
                messageList: [],
            }
        },
        mounted() {
            const roomId = this.getRoomId();
            Echo.channel('werewolves.' + roomId)
                .listen('WerewolvesReceived', e => {
                    // TODO: messageの整形
                    this.messageList.push(e.message);
                })
        },
        methods: {
            getRoomId() {
                // TODO: cookieから何とかしてroomIdを取得する
            //     const cookies = document.cookie.split('; ');
            //     for (cookie of cookies) {
            //
            //     }
                return 9;
            }
        }
    }
</script>

<style scoped>

</style>
