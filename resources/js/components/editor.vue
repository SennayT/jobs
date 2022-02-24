<template>
   <div>
       <div  style="height: 500px" ref="editor">
       </div>
   </div>
</template>

<script>
import Quill from 'quill'
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'

export default {
    name: 'editor',
    props: {
        value:String
    },
    data() {
        return {
            editor: null,
        }
    },
    mounted() {
        this.editor = new Quill(this.$refs.editor, {
            theme: 'snow',
        })

        // console.log(this.value)

        this.editor.setText(`${this.value}\n`)

        this.editor.on('text-change', (delta, oldDelta, source) => {
            console.log(`Source is: ${source}`)
            if(source === 'user') {
                this.update()
            }
        })
     //   this.x = this.value
    },
    methods: {
        update() {
            this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : 'EMPTY')
        }
    },
    watch: {
        // value: function(newVal, oldVal) {
        //    // this.editor.setText(newVal)
        // }
    },
    updated() {
       // console.log(`Value is ${this.value}`)
       // this.editor.setText(`${this.value}\n`)
    }
}
</script>

<style scoped>

</style>
