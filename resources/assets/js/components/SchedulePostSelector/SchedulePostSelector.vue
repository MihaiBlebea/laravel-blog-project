<template>
    <div>
        <div class="form-group">
            <select-input v-if="categories !== null"
                          name="category"
                          :data="categories"
                          v-on:value-changed="handleValueChange($event)"
                          label="Choose a category">
            </select-input>
        </div>

        <div class="form-group">
            <select-input v-if="posts !== null"
                          name="post"
                          :data="posts"
                          label="Choose a post">
            </select-input>
        </div>
    </div>
</template>

<script>
export default {
    data: function()
    {
        return {
            categories: null,
            posts: null
        }
    },
    methods: {
        getAllCategories: function()
        {
            axios.get(this.api + 'category/all').then((result)=> {
                this.categories = result.data.map((category)=> {
                    return { value: category.slug, label: category.name }
                })
            })
        },
        getCategoryPosts: function(categorySlug)
        {
            axios.get(this.api + 'category/posts/' + categorySlug).then((result)=> {
                this.posts = result.data.map((post)=> {
                    return { value: post.id, label: post.title }
                })
            })
        },
        handleValueChange: function(ev)
        {
            this.getCategoryPosts(ev)
        }
    },
    mounted()
    {
        this.getAllCategories()
    }
}
</script>
