<template>
    <div>
        <!-- <input class="mb-3" :name="name" type="file" @change="onFileChanged"> -->
        <label class="btn btn-primary mb-0">
            Upload <input type="file" hidden @change="onFileChanged">
        </label>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data: function()
    {
        return {
            selectedFile: null
        }
    },
    methods: {
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
            axios.post(this.api + 'images/' + this.user, formData).then((result)=> {
                this.$emit('image-uploaded')
            }).catch((err)=> {
                console.log(err)
            })
        }
    }
}

</script>
