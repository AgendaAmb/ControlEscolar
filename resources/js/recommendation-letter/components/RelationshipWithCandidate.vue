<template>
  <div id="relationshipWithCandidate">
    <hr class="d-block" />
    <h2>Relación con el candidato</h2>
    <div id="RelacionCandidato" class="d-block">
      <div class="d-flex flex-column">
        <label> ¿Desde cuándo conoce al candidato? </label>
        <input
          id="FechaRelacion"
          type="date"
          v-model="timeToKnow"
          class="form-control"
        />

        <label class="mt-4"> ¿Cómo lo conoció? </label>
        <textarea 
          class="form-control" 
          rows="4" 
          v-model="howMeet"
        />

        <label class="mt-4">
          ¿Qué tipo de relación escolar, académica, laboral, etc. ha tenido el
          candidato con usted?
        </label>
        <textarea
          class="form-control"
          rows="4"
          v-model="kindRelationship"
        />

        <label class="mt-4">
          ¿El candidato ha trabajado, estudiado o desempeñado alguna tarea en
          colaboración o directamente para usted? Por favor describa la
          naturaleza de esas tareas
        </label>
        <textarea
          class="form-control"
          rows="4"
          v-model="experienceWithCandidate"
        />

        <label class="mt-4">
          Si el estudiante tomó algún curso con usted ?n qué lugar quedó de
          acuerdo a su calificación final? (Por ejemplo: 30% superior) ¿Cuál es
          el número total de estudiantes que está considerando para el cálculo?
        </label>
        <textarea
          class="form-control"
          rows="4"
          v-model="qualificationStudent"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "relationship-with-candidate",
  props: {
    archive_id: {
      type: Number,
      default: null,
    },

    //cuanto tiempo lleva de conocerlo
    time_to_know: {
      type: String,
      default: null,
    },

    //como lo conocio
    how_meet: {
      type: String,
      default: null,
    },
    //tipo de relacion con participante
    kind_relationship: {
      type: String,
      default: null,
    },

    // experiencia que ha tenido con  el candidato
    experience_with_candidate: {
      type: String,
      default: null,
    },

    //como califica al estudiante si ha sido su profesor o mentor
    qualification_student: {
      type: String,
      default: null,
    },
  },
  computed: {
    timeToKnow: {
      get() {
        return this.time_to_know;
      },
      set(newVal) {
        this.$emit("update:time_to_know", newVal);
      },
    },

    howMeet: {
      get() {
        return this.how_meet;
      },
      set(newVal) {
        this.$emit("update:how_meet", newVal);
      },
    },

    kindRelationship: {
      get() {
        return this.kind_relationship;
      },
      set(newVal) {
        this.$emit("update:kind_relationship", newVal);
      },
    },

    experienceWithCandidate: {
      get() {
        return this.experience_with_candidate;
      },
      set(newVal) {
        this.$emit("update:experience_with_candidate", newVal);
      },
    },

    qualificationStudent: {
      get() {
        return this.qualification_student;
      },
      set(newVal) {
        this.$emit("update:qualification_student", newVal);
      },
    },
  },
};
</script>