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
                axios.post('http://werewolves/api/raid', {
                    player_id: targeted,
                }).then(response => {
                    console.log(response.data);
                })
            }
        }
    }
</script>

