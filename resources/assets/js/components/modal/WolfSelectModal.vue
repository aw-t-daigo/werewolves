<template>
    <div class="_modal">
        <button class="btn btn-primary" id="show-modal" v-on:click="showModal = true">{{ header }}</button>
        <punishment-modal v-show="showModal" v-on:close="showModal = false">
            <h5 slot="header">{{ header }}</h5>
            <wolf-select slot="body"></wolf-select>
        </punishment-modal>
    </div>
</template>

<script>
    import WolfSelect from "../select/WolfSelect";
    import PunishmentModal from "./PunishmentModal"

    export default {
        name: "WolfSelectModal",
        components: {
            WolfSelect,
            PunishmentModal,
        },
        data() {
            return {
                showModal: false,
                header: '襲撃先選択',
            }
        }
    }
</script>

<style scoped>

</style>
