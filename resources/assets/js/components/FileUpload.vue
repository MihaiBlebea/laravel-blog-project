<template>
    <div>
        <input class="mb-3" :name="name" type="file" @change="previewImage">
        <div class="row" v-if="imageData.length > 0">
            <div class="col-md-4">
                <img class="img-thumbnail" :src="imageData">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['name'],
    data: function()
    {
        return {
            imageData: ""
        }
    },
    methods: {
        previewImage: function(event)
        {
            // Reference to the DOM input element
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0])
            {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e)=>
                {
                    this.imageData = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
}

</script>
