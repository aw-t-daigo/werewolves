<template>
    <div class="_modal">
        <button class="btn btn-primary" id="show-modal" v-on:click="showModal = true">襲撃先選択</button>
        <punishment-modal v-show="showModal" v-on:close="showModal = false">
            <h5 slot="header">襲撃先選択</h5>
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
            }
        }
    }
</script>

<style scoped>

</style>
