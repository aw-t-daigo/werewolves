<template>
    <div class="hunter-select">
        <select-living-player v-on:api="guard" :option-header="optionHeader"></select-living-player>
    </div>
</template>

<script>
    import SelectLivingPlayer from "./SelectLivingPlayer";
    import axios from "axios";

    export default {
        name: "HunterSelect",
        components: {SelectLivingPlayer},
        data() {
            return {
                optionHeader: '護衛先選択',
            }
        },
        methods: {
            guard(targeted) {
                axios.post('http://werewolves/api/guard', {
                    player_id: targeted,
                })
            }
        }
    }
</script>

<style scoped>

</style>
