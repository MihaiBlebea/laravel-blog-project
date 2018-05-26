<template>
    <div class="card mb-3">
        <slot></slot>
        <div class="card-body p-2">
            <p v-if="confirm == false">
                <span>{{ image.name }}</span>

                <span v-on:click="toggleConfirm()"
                      class="text-danger mb-0 pointer float-right">Delete</span>
            </p>

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
