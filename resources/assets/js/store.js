import axios from 'axios';

const store = {
    state: {
        players: [],
        messageList: [],
        canStart: false,
    },
    async fetchRoomInfo() {
        return axios.get('../../api/room-id')
            .then(resp => {
                this.state.canStart = resp.data.canStart;
                return resp.data.roomId;
            })
    },
    fetchLivingPlayer() {
        axios.get('../../api/live')
            .then(resp => {
                this.state.players = resp.data;
            })
    },
    pushMessageList(message) {
        this.state.messageList.push(message);
    },
    startGame() {
        if (this.state.canStart) {
            axios.post('../../api/start');
        }
    }
};

export default store;
