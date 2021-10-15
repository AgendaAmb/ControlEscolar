<template>
    <div :class="fieldClass">
        <template v-if="field.type === 'textarea'">
            <label :for="field.name" v-if="field.showLabel !== false">{{ fieldLabel }}</label>
            <textarea v-model="Value" :id="field.name" :name="field.name" :required="field.required" :placeholder="fieldLabel">
            </textarea>
        </template>
        <template v-else>
            <label :for="field.name" v-if="field.showLabel !== false">{{ fieldLabel }}</label>
            <input v-model="Value" :placeholder="fieldLabel" :type="field.type ? field.type : 'text'" :required="field.required" :id="field.name">
        </template>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        name: "EventDialogInput",
        props: {
            value: [ Date, String, Number, Boolean, Array, Object ],
            field: {
                type: Object,
                required: true
            }
        },
        beforeMount() {
            //  Date workaround
            if ( this.field.type === 'date' && this.value ) {
                this.Value = moment(this.value).format().slice(0, 10);
            }

            //  Time workaround
            if ( this.field.type === 'time' && this.value ) {
                this.Value = moment(this.value).format().slice(11, 16);
            }
        },

        computed: {
            Value: {
                get(){
                    return this.value;
                },
                set(newValue) {
                    this.$emit('update:value', newValue);
                }
            },

            isCheckOrRadio() {
                return this.field.type === 'radio' || this.field.type === 'checkbox';
            },
            fieldLabel() {
                return this.field.label ? this.field.label : this.field.name;
            },
            fieldClass() {
                if ( this.overrideInputClass )
                    return this.inputClass;

                let classes = [
                    'v-cal-input',
                    this.inputClass
                ];

                if ( this.isCheckOrRadio ) {

                    if ( !this.field.choices ) {
                        classes.push('is-inline');
                        classes.push('is-' + this.field.type);
                    } else {
                        classes.push('v-cal-input-group');
                    }
                }

                return classes.join(' ');
            }
        }
    }
</script>

<style scoped>
div.v-cal-input > input[type=number]{
    transition: all 0.3s ease-in-out;
    display: block;
    font-family: inherit;
    width: 100%;
    border: 1px solid #E8E9EC;
    border-radius: 4px;
    padding: 10px 12px;
}
</style>