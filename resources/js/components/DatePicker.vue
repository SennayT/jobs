<template>
    <v-menu
        ref="menu"
        transition="scale-transition"
        offset-y
        min-width="290px"
        @click="onClick"
        v-model="menu"
        :close-on-content-click="false"
    >
        <template v-slot:activator="{ on, attrs }">
            <v-text-field
                v-model="date"
                :rules="dateRules"
                label="label"
                :placeholder="placeHolder"
                title="title"
                :name="name"
                prepend-icon="mdi-calendar"
                readonly
                v-bind="attrs"
                v-on="on"
            ></v-text-field>
        </template>
        <v-date-picker
            v-model="date"
            @input="onClick"
            no-title
            label="label"
            scrollable

        >
            <v-spacer></v-spacer>
            <v-btn text color="primary" @click="menu = false"> Cancel </v-btn>
            <v-btn text color="primary" @click="$refs.menu.save(date)"> OK </v-btn>
        </v-date-picker>
    </v-menu>
</template>

<script>
export default {
    name: "DatePicker",

    components: {},
    props: {
        value: String,
        errorMessages: Array,
        placeHolder: String,
        name: String,
        label: String,
        title: String,
    },

    data() {
        return {
            menu: false,
            //min: new Date().toISOString().substr(0, 10),
            date: this.value,
            dateRules: [
               // (v) => !!v || "Date is required"
            ],
        };
    },
    methods: {
        onClick() {
            this.$emit("input", this.date);
            // this.value = param;
        },
    },
};
</script>
