<template>
  <div class="form-row">
    <div class="form-group col-lg-6">
      <label> Ingresa un correo electrónico </label>
      <input type="text" class="form-control" v-model="EmailR">
    </div>

    <div class="form-group col-lg-6">
      <label> Ingresa un correo de contacto alterno </label>
      <input type="text" class="form-control" v-model="EmailAlterno">
    </div>

    <div class="form-group col-lg-6">
      <label> Contraseña</label>
      <input type="password" class="form-control" v-model="Password">
    </div>

    <div class="form-group col-lg-6">
      <label> Repite tu Contraseña </label>
      <input type="password" class="form-control" v-model="PasswordR">
    </div>
  </div>
</template>

<script>
export default {
  name: "cuenta-externo",

  props: {
    emailR: String,
    emailAlterno: String,
    password: String,
    passwordR: String,
  },

  computed: {
    EmailR: {
      get(){
        return this.emailR;
      },
      set(newVal){
        this.$emit('update:emailR', newVal);
      }
    },
    EmailAlterno: {
      get(){
        return this.emailAlterno;
      },
      set(newVal){
        this.$emit('update:emailAlterno', newVal);
      }
    },
    Password: {
      get(){
        return this.password;
      },
      set(newVal){
        this.$emit('update:password', newVal);
      }
    },
    PasswordR: {
      get(){
        return this.passwordR;
      },
      set(newVal){
        this.$emit('update:passwordR', newVal);
      }
    }
  },
};
</script>