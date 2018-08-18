<template>
    <div>
        <textarea class="form-control"
                  :style="textarea"
                  :name="inputName"
                  rows="10"
                  ref="editor"
                  v-model="content">
        </textarea>
    </div>
</template>

<script>
export default {
    props: {
        inputName: {
            type: String,
            required: true
        },
        inputContent: {
            type: String,
            required: false
        }
    },
    data: function()
    {
        return {
            content: null,
            textarea: {
                height: '100px',
                overflow: 'hidden'
            }
        }
    },
    watch: {
        content: function() {
            this.handleInputResize()
        }
    },
    methods: {
        handleInputResize: function() {
            let textarea = this.$refs.editor
            if(textarea.scrollHeight > textarea.clientHeight)
            {
                this.textarea.height = textarea.scrollHeight + 'px'
            }
        }
    },
    mounted()
    {
        this.content = this.inputContent
    }
}
</script>
