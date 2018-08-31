<template>
    <div class="hunter-select">
        <select-living-player v-on:api="guard" :option-header="optionHeader"></select-living-player>
    </div>
</template>

<script>
    import SelectLivingPlayer from "./SelectLivingPlayer";
    import axios from "axios";
    import store from '../../store.js';

    export default {
        name: "HunterSelect",
        components: {SelectLivingPlayer},
        data() {
            return {
                optionHeader: '護衛先選択',
                state: store.state
            }
        },
        methods: {
            guard(targeted) {
                axios.post('../../api/guard', {
                    player_id: targeted,
                })
                    .then(e => {
                        store.pushMessageList(e.data);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
