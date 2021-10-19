import Vue from 'vue'
import Entrevista from './Entrevista.vue';

function open(propsData) {
    const EventDialogComponent = Vue.extend(Entrevista);
    return new EventDialogComponent({
        el: document.createElement('div'),
        propsData
    });
}

export default {
    show(params, appliants, rooms, date) {
        const defaultParam = {
            inputClass: null,
            overrideInputClass: false,
            //  -------------------------
            startTime: null,
            endTime: null,
            enableTimeInputs: true,
        };

        const propsData = Object.assign(defaultParam, params);
        propsData.fields = [];
        propsData.date = date.toLocaleDateString();
        propsData.appliants = appliants;
        propsData.rooms = rooms;
        return open(propsData);
    }
}