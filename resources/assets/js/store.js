import axios from 'axios';

const store = {
    state: {
        players: [],
        messageList: [],
        canStart: false,
    },
    async fetchRoomInfo() {
        return axios.get('http://werewolves/api/room-id')
            .then(resp => {
                this.state.canStart = resp.data.canStart;
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
    },
    startGame() {
        if (this.state.canStart) {
            axios.post('http://werewolves/api/start');
        }
    }
};

export default store;
