import Vue from 'vue'
import Periodo from './Periodo.vue';

function open(propsData) {
    const EventDialogComponent = Vue.extend(Periodo);
    return new EventDialogComponent({
        el: document.createElement('div'),
        propsData
    });
}

export default {
    show(params, extraFields) {
        const defaultParam = {
            title: 'Create event',
            inputClass: null,
            overrideInputClass: false,
            createButtonLabel: 'Create',
            //  -------------------------
            startTime: null,
            endTime: null,
            enableTimeInputs: true,
        };

        const propsData = Object.assign(defaultParam, params);

        const defaultFields = [];

        if ( propsData.enableTimeInputs )
            defaultFields.splice(1, 0, {
                label: 'Times',
                fields: [
                    {
                        name: 'startTime',
                        type: 'time',
                        label: 'Start Time',
                        required: true,
                        value: propsData.startTime
                    },
                    {
                        name: 'endTime',
                        type: 'time',
                        label: 'End Time',
                        required: true,
                        value: propsData.endTime
                    }
                ]
            });

        propsData.fields = extraFields ? defaultFields.concat(extraFields) : defaultFields;
        return open(propsData);
    }
}