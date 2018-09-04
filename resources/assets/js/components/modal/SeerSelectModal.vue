<template>
    <div class="_modal">
        <button class="btn btn-primary"id="show-modal" v-on:click="showModal = true">{{ header }}</button>
        <punishment-modal v-show="showModal" v-on:close="showModal = false">
            <h5 slot="header">{{ header }}</h5>
            <seer-select slot="body"></seer-select>
        </punishment-modal>
    </div>
</template>

<script>
    import PunishmentModal from "./PunishmentModal";
    import SeerSelect from "../select/SeerSelect";

    export default {
        name: "SeerSelectModal",
        components: {SeerSelect, PunishmentModal},
        data() {
            return {
                showModal: false,
                header: '占い先選択',
            }
        }
    }
</script>

<style scoped>

</style>
