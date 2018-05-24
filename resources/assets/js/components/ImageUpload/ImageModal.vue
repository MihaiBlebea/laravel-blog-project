<template>
    <div>
        <div v-if="selectedImage !== null" class="row">
            <div class="col-md-4">
                <img class="img-thumbnail"
                     :src="path(selectedImage)"
                     v-on:click="removeImage()">
            </div>

            <input type="hidden" name="image" v-model="selectedImage.id">

        </div>
        <button type="button"
                class="btn btn-outline-secondary mt-3"
                data-toggle="modal"
                data-target="#img-modal">
            Select image
        </button>


        <div class="modal" tabindex="-1" role="dialog" id="img-modal">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div v-if="imageList !== null"
                                 v-for="(image, index) in imageList"
                                 :key="index"
                                 class="col-md-4">

                                <img :src="path(image)"
                                     v-on:click="selectImage(index)"
                                     style="width:100%;"
                                     class="mb-3"
                                     v-bind:class="{ 'selected-img': isSelected(image) }">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <image-upload :user="user" v-on:image-uploaded="onUploadImage()"></image-upload>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: ['user'],
    data: function()
    {
        return {
            imageList: null,
            selectedImage: null
        }
    },
    methods:
    {
        getImages: function()
        {
            axios.get(this.api + 'images/' + this.user).then((result)=> {
                this.imageList = result.data;
            }).catch((err)=> {
                console.log(err)
            })
        },
        path: function(image)
        {
            return '/storage/' + image.path;
        },
        selectImage: function(index)
        {
            this.selectedImage = this.imageList[index];
        },
        removeImage: function()
        {
            this.selectedImage = null
        },
        onUploadImage: function()
        {
            this.getImages();
        },
        isSelected: function(image)
        {
            return (this.selectedImage !== null && this.selectedImage.name == image.name) ? true : false
        }
    },
    mounted()
    {
        this.getImages();
    }
}
</script>
