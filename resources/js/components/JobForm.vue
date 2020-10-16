<template>
    <v-container>
      <validation-observer v-slot="{invalid}">
      <form method="post" :action="href">
        <slot></slot>
        <v-row>
          <v-col cols="6">
            <validation-provider
              v-slot="{errors}"
              immediate
              name="email"
              rules="required|email"
            >
              <v-text-field
                v-model="email"
                :error-messages="errors"
                label="E-mail"
                required
              ></v-text-field>
            </validation-provider>
          </v-col>
          <v-col cols="6">
            <validation-provider
              v-slot="{errors}"
              name="title"
              rules="required"
            >
              <v-text-field
                v-model="title"
                :error-messages="errors"
                label="Job Title"
                required
              ></v-text-field>
            </validation-provider>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="6">
            <validation-provider
              v-slot="{errors}"
              name="address"
              rules="required"
            >
              <v-text-field
                v-model="address"
                :error-messages="errors"
                label="Address"
                required
              ></v-text-field>
            </validation-provider>
          </v-col>
          <v-col cols="6">
            <validation-provider
              name="deadline"
              v-slot="{errors}"
              rules="required"
            >
              <v-menu
                ref="menu"
                v-model="menu"
                :close-on-content-click="false"
                :return-value.sync="date"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    v-model="date"
                    label="Deadline"
                    prepend-icon="mdi-calendar"
                    readonly
                    :error-messages="errors"
                    v-bind="attrs"
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker
                  v-model="date"
                  :min="min"
                  no-title
                  scrollable
                >
                  <v-spacer></v-spacer>
                  <v-btn
                    text
                    color="primary"
                    @click="menu = false"
                  >
                    Cancel
                  </v-btn>
                  <v-btn
                    text
                    color="primary"
                    @click="$refs.menu.save(date)"
                  >
                    OK
                  </v-btn>
                </v-date-picker>
              </v-menu>
            </validation-provider>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <Editor v-on:input="handleQuillInput" v-model="details"/>
          </v-col>
        </v-row>
          <v-row>
              <v-col cols="12">
                  <input type="hidden" name="details" value="details of form">
              </v-col>
          </v-row>
        <v-row>
          <v-col cols="12">
            <v-btn type="submit" :disabled="invalid">Submit</v-btn>
          </v-col>
        </v-row>
      </form>
      </validation-observer>
    </v-container>
</template>

<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import Editor from './editor'
export default {
  name: 'job-form',
  props: {
    href: String,
    emailProp: String,
    jobTitleProp: String,
    addressProp: String,
    detailsProp: String
  },
  data: () => {
    return {
      email: '',
      title: '',
      deadline: '',
      address: '',
      details: '',
      date: new Date().toISOString().substr(0, 10),
      min: new Date().toISOString().substr(0, 10),
      menu: false,
      modal: false,
      menu2: false
    }
  },
  components: {
    Editor,
    ValidationProvider,
    ValidationObserver
  },
  methods: {
    handleQuillInput (text) {
    }
  },
  mounted () {
    this.title = this.jobTitleProp ? this.jobTitleProp : ''
    this.email = this.emailProp ? this.emailProp : ''
    this.address = this.addressProp ? this.addressProp : ''
    this.details = this.detailsProp ? this.detailsProp : ''
  }
}
</script>

<style scoped>

</style>
