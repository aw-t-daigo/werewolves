<template>
    <div class="wolf-select">
        <select-living-player v-on:api="raid" :option-header="optionHeader"/>
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
            }
        },
        methods: {
            raid(targeted) {
                axios.post('../../api/raid', {
                    player_id: targeted,
                });
            }
        }
    }
</script>

