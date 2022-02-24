<template>
    <div>
        <v-app>
            <v-main>

                <v-container>
                    <validation-observer
                        ref="observer"
                        v-slot="{invalid}"
                    >
                        <v-form method="post" :action="address" ref="form" @submit.prevent="submit">
                            <slot></slot>
                            <v-row>
                                <v-col cols="6">
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="First Name"
                                        rules="required"
                                    >
                                        <v-text-field
                                            required
                                            v-model="firstName"
                                            :error-messages="errors"
                                            label="First Name"
                                            title="First Name"
                                            name="first_name"
                                            placeholder="Enter First Name"
                                        ></v-text-field>
                                    </validation-provider>
                                </v-col>

                                <v-col cols="6">
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Last Name"
                                        rules="required"
                                    >
                                        <v-text-field
                                            required
                                            v-model="lastName"
                                            :error-messages="errors"
                                            label="Last Name"
                                            title="Last Name"
                                            name="last_name"
                                            placeholder="Enter Last Name"
                                        ></v-text-field>
                                    </validation-provider>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="6">
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Email"
                                        rules="required|email"
                                    >
                                        <v-text-field
                                            required
                                            v-model="email"
                                            :error-messages="errors"
                                            label="Email"
                                            title="Email"
                                            name="email"
                                            placeholder="Enter Email"
                                        ></v-text-field>
                                    </validation-provider>
                                </v-col>

                                <v-col cols="6">
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Phone Number"
                                        rules="required"
                                    >
                                        <v-text-field
                                            required
                                            v-model="phone"
                                            :error-messages="errors"
                                            label="Phone Number"
                                            title="Phone Number"
                                            name="phone"
                                            placeholder="Enter Phone Number"
                                            type="text"
                                        ></v-text-field>
                                    </validation-provider>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="6">
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Age"
                                        rules="required"
                                    >
                                        <v-text-field
                                            required
                                            v-model="age"
                                            :error-messages="errors"
                                            label="Age"
                                            title="Age"
                                            name="age"
                                            placeholder="Enter Age"
                                            type="number"
                                        ></v-text-field>
                                    </validation-provider>
                                </v-col>

                                <v-col cols="6">
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Gender"
                                        rules="required"
                                    >
                                        <v-select
                                            :items="genders"
                                            name="gender"
                                            placeholder="Gender"
                                            v-model="gender"
                                            required
                                            :error-messages="errors"
                                            label="Gender"
                                            title="Gender"
                                        ></v-select>
                                    </validation-provider>

                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="6">
                                    <validation-provider
                                        v-slot="{errors}"
                                        name="Education Level"
                                        rules="required"
                                    >
                                        <v-select
                                            :items="educationLevels"
                                            name="maximum_education"
                                            placeholder="Education Level"
                                            v-model="educationLevel"
                                            required
                                            :error-messages="errors"
                                            label="Education Level"
                                            title="Education Level"
                                        ></v-select>
                                    </validation-provider>
                                </v-col>

                            </v-row>
                            <v-row>
                                <v-col cols="12" >
                                    <p>Please enter your education history</p>
                                </v-col>
                            </v-row>
                            <v-row>
                                <ApplicantExperienceForm place-holder="Institution Name" name="edu"  icon="mdi-school"/>
                            </v-row>


                            <v-row>
                                <v-col cols="12" >
                                    <p>Please enter any training you have taken</p>
                                </v-col>
                            </v-row>
                            <v-row>
                                <ApplicantExperienceForm place-holder="Training Name" name="train"  icon="mdi-school"/>
                            </v-row>

                            <v-row>
                                <v-col cols="12" >
                                    <p>Please enter your employment history</p>
                                </v-col>
                            </v-row>
                            <v-row>
                                <ApplicantExperienceForm place-holder="Employer" name="work"  icon="mdi-school"/>
                            </v-row>

                            <v-row>
                                <v-col cols="6">
                                    <v-btn :disabled="invalid" type="submit">Submit</v-btn>
                                </v-col>
                            </v-row>

                        </v-form>
                    </validation-observer>
                </v-container>
            </v-main>
        </v-app>
    </div>
</template>

<script>
import {
    required, digits, min, email,
} from 'vee-validate/dist/rules';
import {
    extend, ValidationObserver, ValidationProvider, setInteractionMode,
} from 'vee-validate';
import ApplicantExperienceForm from "./ApplicantExperienceForm";

setInteractionMode('eager');

extend('positive', (value) => {
    if (value < 0) return true;
    return 'Must be negative';
});

extend('digits', {
    ...digits,
    message: '{_field_} needs to be {length} digits. ({_value_})',
});
extend('required', {
    ...required,
    message: '{_field_} can not be empty',
});

extend('min', {
    ...min,
    message: '{_field_} may not be less than {length} characters',
});

extend('email', {
    ...email,
    message: 'Email must be valid',
});

export default {
    data() {
        return {
            firstName: '',
            lastName: '',
            email: '',
            phone: null,
            gender: '',
            age: null,
            genders: ['Male', 'Female'],
            educationLevel: '',
            educationLevels: ['Some High school Education', 'High school Diploma', 'Diploma', 'Bachelors Degree', 'Masters', 'PHD'],
        };
    },
    props: {
        address: String
    },
    components: {
        ApplicantExperienceForm,
        ValidationProvider,
        ValidationObserver,
    },
    methods: {
        submit() {
            this.$refs.observer.validate();
            this.$refs.form.$el.submit();
        },
        clear() {
            this.firstName = '';
            this.lastName = '';
            this.email = '';
            this.gender = '';
            this.educationLevel = '';
            this.phone = null;
            this.age = null;
            this.$refs.observer.reset();
        },
    },
};
</script>

<style lang="scss">

</style>
