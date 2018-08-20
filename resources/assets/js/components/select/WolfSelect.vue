<template>
    <div class="wolf-select">
        <select-living-player :option-header="optionHeader"/>
        <button v-on:click="raid">決定</button>
    </div>
</template>

<script>
    import SelectLivingPlayer from "./SelectLivingPlayer";

    export default {
        components: {SelectLivingPlayer},
        name: "WolfSelect",
        data() {
            return {
                optionHeader: '襲撃先選択',
            }
        },
        methods: {
            raid() {
                axios.post('http://werewolves/api/raid', {
                    player_id: this.targeted,
                }).then(response => {
                    console.log(response.data.success);
                    // TODO: チャット画面と連携
                })
            }
        }
    }
</script>

