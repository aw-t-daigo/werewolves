<template>
    <div id="base-select">
        <div class="input-group">
            <select class="form-control" name="raid_target" v-model="targeted" :class="isInvalid">
                <option disabled value="">{{optionHeader}}</option>
                <option
                    v-for="player in state.players"
                    :key="player.player_id"
                    v-bind:value="player.player_id"
                >
                    {{player.player_name}}
                </option>
            </select>
            <span class="input-group-btn">
                <button class="btn btn-primary" v-on:click="$emit('api', targeted)">決定</button>
            </span>
            <div class="invalid-feedback">
                そのプレイヤーは選択できません
            </div>
        </div>
    </div>
</template>
<script>
    import store from "../../store.js";

    export default {
        name: 'select-living-player',
        props: {
            optionHeader: String,
            isInvalid: String,
        },
        data() {
            return {
                state: store.state,
                targeted: ''
            }
        },
    }
</script>
