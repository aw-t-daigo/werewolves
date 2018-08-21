<template>
    <div class="modal">
        <button id="show-modal" v-on:click="showModal = true">処刑者選択</button>
        <punishment-modal v-if="showModal" v-on:close="showModal = false"/>
    </div>
</template>

<script>
    import PunishmentModal from "./PunishmentModal";

    export default {
        name: "ModalTemplate",
        components: {PunishmentModal},
        component: {
            PunishmentModal
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
