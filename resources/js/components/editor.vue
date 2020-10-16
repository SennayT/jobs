<template>
    <div style="height: 500px" ref="editor"></div>
</template>

<script>
import Quill from 'quill'
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
export default {
  name: 'editor',
  props: {
    value: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      editor: null
    }
  },
  mounted () {
    this.editor = new Quill(this.$refs.editor, {
      theme: 'snow'
    })

    this.editor.root.innerHTML = this.value

    this.editor.on('text-change', () => this.update())
  },
  methods: {
    update () {
      this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : 'no-val')
    }
  }
}
</script>

<style scoped>

</style>
