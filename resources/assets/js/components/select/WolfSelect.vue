<template>
    <div class="wolf-select">
        <select-living-player v-on:api="raid"
                              :option-header="optionHeader"
                              :is-invalid="isInvalid"
        />
    </div>
</template>

<script>
    import SelectLivingPlayer from "./SelectLivingPlayer";
    import axios from "axios";

    export default {
        components: {SelectLivingPlayer},
        name: "WolfSelect",
        data() {
            return {
                optionHeader: '襲撃先選択',
                isInvalid: '',
            }
        },
        methods: {
            raid(targeted) {
                axios.post('../../api/raid', {
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

