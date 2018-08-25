<template>
    <div>
        <label>{{ label }}</label>
        <select :name="name" class="form-control" v-model="selected">
            <option disabled>Pick post</option>
            <option v-for="item in data" :value="item.value">
                <span class="text-capitalize">{{ item.label }}</span>
            </option>
        </select>
    </div>
</template>

<script>
export default {
    props: {
        data: {
            type: Array,
            required: true
        },
        label: {
            type: String,
            required: true
        },
        name: {
            type: String,
            required: true
        }
    },
    data: function()
    {
        return {
            selected: null
        }
    },
    watch: {
        selected: function()
        {
            this.$emit('value-changed', this.selected)
        }
    }
}
</script>
