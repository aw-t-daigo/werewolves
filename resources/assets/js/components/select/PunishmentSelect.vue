<template>
    <div class="punish-select">
        <select-living-player :option-header="optionHeader"/>
        <button v-on:click="punishment">決定</button>
    </div>
</template>

<script>
    import SelectLivingPlayer from "./SelectLivingPlayer";

    export default {
        name: "PunishmentSelect",
        components: {SelectLivingPlayer},
        data() {
            return {
                optionHeader: '処刑者選択',
            }
        },
        methods: {
            punishment() {
                axios.post('http://werewolves/api/punishment', {
                    player_id: this.targeted,
                }).then(response => {
                    console.log(response.data);
                    // TODO: チャット連携
                })
            }
        }
    }
</script>

<style scoped>

</style>
