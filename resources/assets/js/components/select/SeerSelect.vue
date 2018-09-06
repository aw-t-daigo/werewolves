<template>
    <div class="seer-select">
        <select-living-player v-on:api="seer"
                              :option-header="optionHeader"
                              :is-invalid="isInvalid"
        />
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
                isInvalid: ''
            }
        },
        methods: {
            seer(targeted) {
                axios.post('../../api/seer', {
                    player_id: targeted,
                }).then(resp => {
                    this.isInvalid = '';
                }).catch(error => {
                    this.isInvalid = 'is-invalid';
                });
            }
        }
    }
</script>

<style scoped>

</style>
