<template>
    <v-container>
        <validation-observer ref="observer" v-slot="{invalid}">
            <v-form ref="form" @submit.prevent="submit" method="post" :action="href">
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
                                name="email"
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
                                name="title"
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
                                name="address"
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
                                :close-on-content-click="false"
                                :return-value.sync="deadline"
                                transition="scale-transition"
                                offset-y
                                min-width="290px"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="deadline"
                                        label="Deadline"
                                        name="deadline"
                                        prepend-icon="mdi-calendar"
                                        readonly
                                        :error-messages="errors"
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                </template>
                                <v-date-picker
                                    v-model="deadline"
                                    no-title
                                    scrollable
                                    :min="min"
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
                                        @click="$refs.menu.save(deadline)"
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
                        <Editor v-on:input="handleQuillInput" :value="details"/>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12">
                        <input type="hidden" name="details" :value="details_value">
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12">
                        <v-btn type="submit" :disabled="invalid">Submit</v-btn>
                    </v-col>
                </v-row>
            </v-form>
        </validation-observer>

    </v-container>
</template>

<script>
import {ValidationProvider, ValidationObserver} from 'vee-validate'
import Editor from './editor'

export default {
    name: 'job-form',
    props: {
        href: String,
        email_prop: String,
        title_prop: String,
        address_prop: String,
        details: String,
        deadline_prop: String,
    },
    data: () => {
        return {
            email: '',
            title: '',
            deadline: '',
            address: '',
            details_value: '',
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
        handleQuillInput(text) {
            console.log('text')
            this.details_value = text
        },
        submit() {
            this.$refs.observer.validate();
            this.$refs.form.$el.submit();
        }
    },
    mounted() {

       // console.log(this.details_prop)
        //this.details = this.details_prop ? this.details_prop : ''
      //  this.details_value = this.details ? this.details : 'write here'
        this.title = this.title_prop ? this.title_prop : ''
        this.email = this.email_prop ? this.email_prop : ''
        this.address = this.address_prop ? this.address_prop : ''
        this.deadline = this.deadline_prop ? this.deadline_prop : ''
    }
}
</script>

<style scoped>

</style>
