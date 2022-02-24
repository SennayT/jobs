<template>

    <div>
        <v-dialog
            v-model="dialog"
            persistent
            max-width="290"
        >
            <template v-slot:activator="{ on, attrs }">
                <v-btn
                    color="error"
                    dark
                    v-bind="attrs"
                    v-on="on"
                >
                    Reject
                </v-btn>
            </template>
            <v-card>
                <v-card-title class="text-h5">
                    Delete this user
                </v-card-title>
                <v-card-text>Once you reject this user, their information will be unavailable
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        text
                        @click="dialog = false"
                    >
                        Cancel
                    </v-btn>
                    <v-btn
                        color="error"
                        text
                        @click="onDelete"
                    >
                        Delete
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
       <form ref="form" method="post" :action="action">
           <slot></slot>
       </form>
    </div>

</template>


<script>
export default {
    name: "DeleteDialog",
    data() {
        return {
            dialog: false,
        }
    },
    props:{
        action:String
    },
    methods:{
        onDelete() {
            this.dialog = false
            this.$refs.form.submit()
        }
    }
}
</script>

<style scoped>

</style>
