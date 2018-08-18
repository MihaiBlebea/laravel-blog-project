<template>
    <div class="input-group">
        <input name='search_term'
               type="text"
               class="form-control"
               placeholder="Search post..."
               v-on:focus="handleFocus"
               v-model="searchTerm">
        <div class="input-group-append d-block animated slideInLeft"
             v-bind:class="{ 'd-md-none': !isFocus }">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </div>
</template>

<script>
export default {
    data: function()
    {
        return {
            isFocus: false,
            searchTerm: ''
        }
    },
    watch: {
        searchTerm: function()
        {
            if(this.searchTerm === '')
            {
                this.handleBlur()
            } else {
                this.handleFocus()
            }
        }
    },
    methods: {
        handleFocus: function()
        {
            this.isFocus = true
        },
        handleBlur: function()
        {
            this.isFocus = false
        }
    }
}
</script>
