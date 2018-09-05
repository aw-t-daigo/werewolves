<template>
    <div class="_modal">
        <button class="btn btn-primary" id="show-modal" v-on:click="showModal = true">処刑者選択</button>
        <punishment-modal v-show="showModal" v-on:close="showModal = false">
            <h5 slot="header">処刑者選択</h5>
            <punishment-select slot="body"></punishment-select>
        </punishment-modal>
    </div>
</template>

<script>
    import PunishmentModal from "./PunishmentModal";
    import PunishmentSelect from "../select/PunishmentSelect";

    export default {
        name: "ModalTemplate",
        components: {PunishmentSelect, PunishmentModal},
        data() {
            return {
                showModal: false,
            }
        }
    }
</script>

<style scoped>

</style>
