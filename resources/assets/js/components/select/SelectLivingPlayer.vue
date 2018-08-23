<template>
    <div id="base-select">
        <select name="raid_target" v-model="targeted">
            <option disabled value="">{{optionHeader}}</option>
            <option
                v-for="player in players"
                :key="player.player_id"
                v-bind:value="player.player_id"
            >
                {{player.player_name}}
            </option>
        </select>
        <button v-on:click="$emit('api', targeted)">決定</button>
    </div>
</template>
<script>
    import axios from "axios";

    export default {
        name: 'select-living-player',
        props: {
            optionHeader: String,
        },
        data() {
            return {
                players: [],
                targeted: null
            }
        },
        mounted() {
            axios.get('http://werewolves/api/live')
                .then((response) => {
                    this.players = response.data;
                })
        },
    }
</script>
