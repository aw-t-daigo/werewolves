<template>
    <div class="_modal">
        <button class="btn btn-primary" id="show-modal" v-on:click="showModal = true">{{ header }}</button>
        <punishment-modal v-show="showModal" v-on:close="showModal = false">
            <h5 slot="header">{{ header }}</h5>
            <hunter-select slot="body"></hunter-select>
        </punishment-modal>
    </div>
</template>

<script>
    import HunterSelect from "../select/HunterSelect";
    import PunishmentModal from "./PunishmentModal";

    export default {
        name: "HunterSelectModal",
        components: {
            HunterSelect,
            PunishmentModal,
        },
        data() {
            return {
                showModal: false,
                header: '護衛先選択',
            }
        }
    }
</script>

<style scoped>

</style>
