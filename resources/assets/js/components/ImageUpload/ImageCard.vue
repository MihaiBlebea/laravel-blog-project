<template>
    <div class="card mb-3">
        <slot></slot>
        <div class="card-body p-2">
            <div class="row" v-if="confirm == false">
                <div class="col-sm-9 text-elipsis">
                    <span>{{ image.name }}</span>
                </div>

                <div v-on:click="toggleConfirm()" class="col-sm-3 text-danger">
                    <span class="pointer float-right">
                        Delete
                    </span>
                </div>
            </div>

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
