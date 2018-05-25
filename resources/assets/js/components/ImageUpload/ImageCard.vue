<template>
    <div class="card mb-3">
        <slot></slot>
        <div class="card-body p-2">
            <p v-on:click="toggleConfirm()"
               v-if="confirm == false"
               class="text-danger mb-0 pointer">Delete image</p>

            <p v-if="confirm == true" class="mb-0">
                Are you sure?
                <span class="float-right">
                    <a class="text-primary mr-3 pointer" v-on:click="deleteImage($event)"><strong>Yes</strong></a>
                    <a class="text-danger pointer" v-on:click="toggleConfirm()">Cancel</a>
                </span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['image'],
    data: function()
    {
        return {
            confirm: false
        }
    },
    methods: {
        deleteImage: function(event)
        {
            event.preventDefault()
            this.$emit('delete');
        },
        toggleConfirm: function()
        {
            this.confirm = !this.confirm
        }
    }
}
</script>
