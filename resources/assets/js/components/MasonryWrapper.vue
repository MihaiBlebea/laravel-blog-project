<template>
    <div>
        <masonry :cols="{default: 3, 1000: 3, 700: 2, 400: 1}"
                 :gutter="{default: '30px', 700: '15px'}">
            <div v-for="(image, index) in images" :key="index">
                <img :src="path(image)" style="width:100%;" class="mb-3 card">
            </div>
        </masonry>
    </div>
</template>

<script>
export default {
    props: ['project-slug'],
    data: function()
    {
        return {
            images: []
        }
    },
    methods: {
        getMasonryImages: function()
        {
            axios.get(this.api + 'images/project/' + this.projectSlug).then((result)=> {
                this.images = result.data;
            }).catch((err)=> {
                console.log(err)
            });
        },
        path: function(image)
        {
            return '/' + image.path;
        }
    },
    mounted() {
        this.getMasonryImages()
    }
}
</script>
