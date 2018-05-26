<template>
    <div class="modal fade" id="image-details-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="row" v-if="imageObj !== null">
                        <div class="col-md-6">
                            <img :src="path(imageObj)" style="width: 100%">
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image name:</label>
                                <input type="text"
                                       class="form-control"
                                       v-model="imageObj.name">
                             </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">Close</button>

                    <button type="button"
                            class="btn btn-primary"
                            data-dismiss="modal"
                            v-on:click="saveUpdate()">Save changes</button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['image', 'path'],
    data: function()
    {
        return {
            imageObj: null
        }
    },
    watch: {
        image: function()
        {
            this.imageObj = this.image
        }
    },
    methods: {
        saveUpdate: function()
        {
            axios.post(this.api + 'image/update/' + this.image.id, { name: this.imageObj.name }).then((result)=> {
                if(result.data == 200)
                {
                    this.$emit('update-saved');
                }
            }).catch((err)=> {
                console.log(err)
            })
        }
    }
}
</script>
