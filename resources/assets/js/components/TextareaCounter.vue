<template>
    <div>
        <textarea class="form-control"
                  name="intro"
                  id="intro"
                  rows="6" v-model="content">
        </textarea>
        <p v-bind:class="{ 'text-danger': error }">{{ charCountMax - charCount }} characters left</p>
    </div>
</template>

<script>
export default {
    props: ['content-input', 'max'],
    data: function()
    {
        return {
            content: null,
            charCount: 0,
            charCountMax: parseInt(this.max),
            error: false
        }
    },
    watch: {
        content: function(event)
        {
            this.charCount = event.length
            if(this.charCount > this.charCountMax)
            {
                this.error = true
            } else {
                this.error = false
            }
        }
    },
    computed: {
        parseInputContent: function()
        {
            return (this.contentInput !== '') ? JSON.parse(this.contentInput) : null;
        }
    }
}
</script>
