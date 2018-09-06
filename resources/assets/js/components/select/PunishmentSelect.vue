<template>
    <div class="punish-select">
        <select-living-player v-on:api="punishment"
                              :option-header="optionHeader"
                              :is-invalid="isInvalid"
        />
    </div>
</template>

<script>
    import SelectLivingPlayer from "./SelectLivingPlayer";
    import axios from "axios";

    export default {
        name: "PunishmentSelect",
        components: {SelectLivingPlayer},
        data() {
            return {
                optionHeader: '処刑者選択',
                isInvalid: '',
            }
        },
        methods: {
            punishment(targeted) {
                axios.post('../../api/punishment', {
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
