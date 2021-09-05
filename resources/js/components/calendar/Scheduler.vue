<template>
  <div ref="scheduler"></div>
</template>
 
<script>
import "dhtmlx-scheduler";
export default {
  name: "scheduler",
  props: {
    events: {
      type: Array,
      default() {
        return { events: [] };
      },
    },
  },

  mounted: function () {
    scheduler.skin = "material";
    scheduler.config.header = [
      "day",
      "week",
      "month",
      "date",
      "prev",
      "today",
      "next",
    ];

    scheduler.attachEvent("onEventAdded", (id, ev) => {
      this.$emit("event-updated", id, "inserted", ev);
    });
    
    scheduler.attachEvent("onEventChanged", (id, ev) => {
      this.$emit("event-updated", id, "updated", ev);
    });
    
    scheduler.attachEvent("onEventDeleted", (id, ev) => {
      this.$emit("event-updated", id, "deleted");
    })

    scheduler.init(this.$refs.scheduler, new Date(2020, 0, 20), "week");
    scheduler.parse(this.$props.events);
  },
};
</script>
 
<style>
@import "~dhtmlx-scheduler/codebase/dhtmlxscheduler_material.css";
</style>