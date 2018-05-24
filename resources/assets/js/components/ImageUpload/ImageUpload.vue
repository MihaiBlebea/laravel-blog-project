<template>
    <div>
        <input class="mb-3" :name="name" type="file" @change="onFileChanged">
        <!-- <div class="row" v-if="imageData.length > 0">
            <div class="col-md-4">
                <img class="img-thumbnail" :src="imageData">
            </div>
        </div> -->
    </div>
</template>

<script>
export default {
    props: ['name', 'user'],
    data: function()
    {
        return {
            selectedFile: null
        }
    },
    methods: {
        // previewImage: function(event)
        // {
        //     var input = event.target;
        //     if (input.files && input.files[0])
        //     {
        //         var reader = new FileReader();
        //         reader.onload = (e)=>
        //         {
        //             this.imageData = e.target.result;
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // },
        onFileChanged: function(event)
        {
            this.selectedFile = event.target.files[0]
            if(this.selectedFile !== null)
            {
                this.uploadImage()
            }
        },
        uploadImage: function()
        {
            const formData = new FormData()
            formData.append('image-upload', this.selectedFile, this.selectedFile.name)
            axios.post(this.api + 'images/' + this.user, formData, {
                onUploadProgress: progressEvent => {
                    console.log(progressEvent.loaded / progressEvent.total)
                }
            }).then((result)=> {
                console.log(result)
                this.$emit('image-uploaded')
            }).catch((err)=> {
                console.log(err)
            })
        }
    }
}

</script>
