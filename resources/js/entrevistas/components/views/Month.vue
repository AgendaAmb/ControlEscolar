<template>
  <section class="v-cal-content">
    <div class="v-cal-weekdays">
      <div
        class="v-cal-weekday-item"
        v-for="(weekday, index) in weekdays"
        :key="index"
      >
        {{ weekday }}
      </div>
    </div>

    <div v-for="(row, index) in calendar" :key="index" class="v-cal-days">
      <div
        v-for="(day, index) in row"
        :key="index"
        :ref="'days.day_' + day.d.format('DDD')"
        class="v-cal-day v-cal-day--month"
        :class="monthClass(day)"
        @click="dayClicked(day)"
      >
        <span :class="circleClass(day)">
          <p>{{ day.d.date() }}</p>
        </span>

        <p v-if="hasEvents(day)" class="event-count mt-4">
          {{ interviewCount(day) }}
        </p>
      </div>
    </div>
  </section>
</template>

<style scoped>
.circled {
  background-color: #fff;
  border-radius: 50%;
  margin: 0 auto;
  width: 30px;
  height: 30px;
}

.circled-blocked {
  background-color: #eaf0f4;
  color: #eaf0f4;
}

.circled-unconfirmed-interviews {
  background-color: #fecc56;
  color: white;
}

.circled > p {
  justify-content: center;
  align-items: center;
  display: flex;
  height: 100%;
  margin: 0;
}

.event-count {
  display: block;
  width: 85%;
  margin-left: auto;
  margin-right: auto;
  border-radius: 20px;
  background-color: #115089;
  color: white;
  text-align: center;
  font-family: "Myriad Pro Bold";
  padding: 2px 1px;
}
</style>

<script>
import moment from "moment";
import EventItem from "../EventItem";
import IsView from "../mixins/IsView";

export default {
  name: "month",
  mixins: [IsView],
  components: { EventItem },
  data() {
    return {
      weekdays: moment.weekdaysShort(),
      calendar: [],
    };
  },
  mounted() {
    this.buildCalendar();
  },
  methods: {
    monthClass(day) {
      return {
        "is-today": day.isToday,
        "is-past": day.isPast,
        "is-disabled": day.isDisabled,
        "is-different-month": day.isDifferentMonth,
      };
    },

    dayClicked(day) {
      this.$emit("day-clicked", day.d.toDate());
    },

    buildCalendar() {
      this.calendar = [];

      let temp = moment(this.activeDate).date(1);
      const monthStart = moment(temp);
      let m = temp.month();
      let now = moment();

      this.days = [];
      let comitelogged = comite;
     
      do {
        const day = moment(temp);
        let newDay = {
          d: day,
          isPast: temp.isBefore(now, "day"),
          isToday: temp.isSame(now, "day") && !this.isDayDisabled(temp),
          isDisabled: this.isDayDisabled(temp),
          events: this.events
            .filter((e) => moment(e.date).isSame(day, "day"))
            .filter((e) => {
              if (comitelogged.length > 1) {
                if (
                  comitelogged[0].academic_comitte_id !==
                  comitelogged[1].academic_comitte_id
                ) {
                  return [1, 2, 3, 4].includes(this.changeComite(e.program));
                }
              } else if (comitelogged[0].academic_comitte_id === 2) {
                // Comité 2
                return [1, 2, 3].includes(this.changeComite(e.program));
              } else if (comitelogged[0].academic_comitte_id === 1) {
                // Comité 1
                return this.changeComite(e.program) === 4;
              }
            })
            .sort((a, b) => {
              if (!a.startTime) return -1;
              if (!b.startTime) return 1;
              return (
                moment(a.startTime, "HH:mm").format("HH") -
                moment(b.startTime, "HH:mm").format("HH")
              );
            }),
        };
        this.days.push(newDay);

        temp.add(1, "day");
      } while (temp.month() === m);
      let items = [];

      let paddingOffset = 1;
      // Some padding at the beginning
      for (let p = 0; p < moment(this.activeDate).date(1).weekday(); p++) {
        const day = moment(monthStart).subtract(paddingOffset, "day");

        items.unshift({
          d: day,
          isPast: true,
          isToday: false,
          isDifferentMonth: true,
          isDisabled: this.isDayDisabled(day),
        });

        paddingOffset++;
      }

      // Merge in the array of days
      items.push.apply(items, this.days);

      // Some padding at the end if required
      if (items.length % 7) {
        for (let p = 7 - (items.length % 7); p > 0; p--) {
          items.push({
            d: moment(temp),
            isPast: true,
            isToday: false,
            isDifferentMonth: true,
            isDisabled: this.isDayDisabled(temp),
          });
          temp.add(1, "day");
        }
      }

      // Split the array into "chunks" of seven
      this.calendar = items
        .map(function (e, i) {
          return i % 7 === 0 ? items.slice(i, i + 7) : null;
        })
        .filter(function (e) {
          return e;
        });
    },

    circleClass(day) {
      return {
        "v-cal-day__number": true,
        circled: true,
        "circled-blocked": this.isDayDisabled(day.d),
        "circled-unconfirmed-interviews": this.hasEvents(day),
      };
    },

    interviewCount(day) {
      if (day.events.length === 1) return "1 entrevista programada";

      return day.events.length + " entrevistas programadas";
    },

    hasEvents(day) {
      if (!("events" in day)) return false;

      return day.events.some((event) => event.displayText !== "");
    },

    changeComite(comite) {
      let academicProgramID = 0;
      switch (comite) {
        case "Maestría en ciencias ambientales":
          academicProgramID = 1;
          break;
        case "Doctorado en ciencias ambientales":
          academicProgramID = 2;
          break;
        case "Maestría en ciencias ambientales, doble titulación":
          academicProgramID = 3;
          break;
        case "Maestría Interdisciplinaria en ciudades sostenibles":
          academicProgramID = 4;
          break;
      }

      return academicProgramID;
    },
  },
};
</script>
