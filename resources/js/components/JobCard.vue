<template>

    <v-container>
        <v-card elevation="1">
            <v-card-title>{{ title }}</v-card-title>
            <v-card-text>
                <slot></slot>
            </v-card-text>
            <v-card-actions>
                <v-btn type="link" :href="link" color="primary">{{ linkText }}</v-btn>
            </v-card-actions>
        </v-card>
    </v-container>

</template>

<script>
export default {
    name: "JobCard",
    props: {
        title: String,
        details: String,
        link: String,
        linkText: String,
    },

}
</script>

<style scoped>

</style>
