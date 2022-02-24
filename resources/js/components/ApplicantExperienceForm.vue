<template>
            <v-container>
                <v-row align="center" >
                    <v-col cols="6">
                        <v-text-field
                            v-model="title"
                            :placeholder="placeHolder"
                        ></v-text-field>
                    </v-col>
                    <v-col  cols="3" >
                        <DatePicker v-model="from" place-holder="from" />
                    </v-col>
                    <v-col cols="3" >
                        <DatePicker v-model="to" place-holder="to" />
                    </v-col>
                </v-row>
                <v-row>
                    <v-spacer></v-spacer>
                    <v-col cols="1" >
                        <v-btn color="primary" @click="onAdd" >Add</v-btn>
                    </v-col>
                </v-row>
                <v-row v-for="(item,index) in items" :key="index" >
                    <v-col cols="12" >
                        <v-alert
                            dense
                            type="info"
                            :icon="icon"
                        >
                            <div
                                class="d-flex align-center justify-space-between"
                            >
                                <span>{{item.title}}</span>
                                <div class="d-flex ">
                                    <span class="mr-10 ">{{item.from}} - {{item.to}}</span>
                                    <v-icon @click="deleteItem(index)" >mdi-close-octagon</v-icon>
                                </div>
                            </div>
                        </v-alert>
                    </v-col>
                    <input type="hidden" :name="`${name}[${index}][name]`" :value="item.title" >
                    <input type="hidden" :name="`${name}[${index}][from]`" :value="item.from" >
                    <input type="hidden" :name="`${name}[${index}][to]`" :value="item.to" >
                </v-row>
            </v-container>
</template>
<script>
import DatePicker from "./DatePicker";
export default {
    name: "ApplicantExperienceForm",
    components: {DatePicker},
    data() {
        return {
            items: [
            ],
            title: '',
            grade: null,
            from:'',
            to:''
        };
    },
    methods: {
        onAdd() {
            const item = {
                title: this.title,
                from: this.from,
                to: this.to
            };
            this.items.push(item);
        },
        deleteItem(index) {
            this.items.splice(index, 1);
        },
    },
    props:{
        placeHolder:String,
        name:String,
        icon:String
    }
}
</script>

<style scoped>

</style>
