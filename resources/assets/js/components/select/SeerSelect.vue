<template>
    <div class="seer-select">
        <select-living-player v-on:api="seer" :option-header="optionHeader"></select-living-player>
    </div>
</template>

<script>
    import SelectLivingPlayer from "./SelectLivingPlayer";
    import axios from "axios";

    export default {
        name: "SeerSelect",
        components: {SelectLivingPlayer},
        data() {
            return {
                optionHeader: '占い先選択',
            }
        },
        methods: {
            seer(targeted) {
                axios.post('../../api/seer', {
                    player_id: targeted,
                });
            }
        }
    }
</script>

<style scoped>

</style>
