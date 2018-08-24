<template>
    <div>
        <div class="mb-3">
            <image-upload :user="user"
                          v-on:image-uploaded="onUploadImage()">
            </image-upload>
        </div>

        <div class="row">
            <div v-if="imageList.length > 0"
                 v-for="(image, index) in imageList"
                 :key="index"
                 class="col-md-4 col-12">

                <image-card v-on:delete="onImageDelete(image.id)"
                            :image="image">
                    <div v-bind:style="{ 'background-image': 'url(' + path(image) + ')' }"
                         v-on:click="triggerDetails(index)"
                         data-toggle="modal"
                         data-target="#image-details-modal"
                         class="image--bg image--bg__medium w-100 pointer"></div>
                </image-card>

            </div>

            <div v-if="imageList.length == 0"
                 style="min-height: 30vh;"
                 class="col-12 d-flex align-items-center justify-content-center">
                <h4 class="text-muted">Please upload an image</h4>
            </div>
        </div>

        <image-details :image="seletedImg"
                       :path="path"
                       v-on:update-saved="onUpdateSaved()"></image-details>

    </div>
</template>

<script>
export default {
    props: ['user'],
    data: function()
    {
        return {
            imageList: [],
            seletedImg: null
        }
    },
    methods: {
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
            return '/' + image.path;
        },
        triggerDetails: function(index)
        {
            this.seletedImg = this.imageList[index]
        },
        onImageDelete: function(id)
        {
            axios.get(this.api + 'image/delete/' + id).then((result)=> {
                if(result.data == 200)
                {
                    this.getImages();
                }
            }).catch((err)=> {
                console.log(err)
            })
        },
        onUpdateSaved: function()
        {
            this.getImages();
        },
        onUploadImage: function()
        {
            this.getImages();
        },
    },
    mounted() {
        this.getImages();
    }
}

</script>
