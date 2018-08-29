import axios from 'axios';

const store = {
    state: {
        players: [],
        messageList: [],
        playerNum: null,
    },
    async fetchRoomInfo() {
        return axios.get('http://werewolves/api/room-id')
            .then(resp => {
                this.playerNum = resp.data.playerNum;
                return resp.data.roomId;
            })
    },
    fetchLivingPlayer() {
        axios.get('http://werewolves/api/live')
            .then(resp => {
                this.state.players = resp.data;
            })
    },
    pushMessageList(message) {
        this.state.messageList.push(message);
    }
};

export default store;
