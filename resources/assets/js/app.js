/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const input = new Vue({
    el: '#input',
    components: {
        'wolf-chat-input': require('./components/chat/WolfChatInput.vue'),
        'seer-select': require('./components/select/SeerSelect.vue'),
        'hunter-select': require('./components/select/HunterSelect.vue'),
        'sharer-chat-input': require('./components/chat/SharerChatInput.vue'),
        'memo-input': require('./components/chat/MemoInput.vue'),
    },
});

const modal = new Vue({
    el: '#modal-button',
    components: {
        'modal-template': require('./components/modal/ModalTemplate.vue'),
        'wolf-select-modal': require('./components/modal/WolfSelectModal.vue'),
    },

});

const chat = new Vue({
    el: '#chat',
    components: {
        'wolf-chat-text-area': require('./components/chat/WolfChatTextArea'),
        'common-text-area': require('./components/chat/CommonTextArea.vue'),
        'seer-text-area': require('./components/chat/SeerTextArea.vue'),
        'medium-text-area': require('./components/chat/MediumTextArea.vue'),
        'sharer-text-area': require('./components/chat/SharerChatTextArea'),
    }
});
