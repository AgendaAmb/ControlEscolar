<template>
    <div class="form-row my-2">
        <div class="col-12">
            <label>
                <p>Practical experience, Software, Equipment handling, Field work, Sampling, etc</p>
            </label>
            <textarea class="form-control" rows="10" v-model="MessageReview" placeholder="..." />
        </div>
    </div>
</template>
  
<script>
export default {
    name: "environment-related-skills",

    props: {
        archive_id: {
            type: Number,
            default: 0
        },

        message_review: {
            type: String,
            default: "",
        },

        id: {
            type: Number,
            default: 0,
        }
    },

    data() {
        return {
        };
    },

    computed: {
        MessageReview: {
            get() {
                return this.message_review;
            },
            set(newVal) {
                this.$emit("update:message_review", newVal);
            },
        },
    },

    methods: {


    },
};
</script>