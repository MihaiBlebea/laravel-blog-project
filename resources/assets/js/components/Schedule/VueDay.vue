<template>
    <div>
        <h5 class="row align-items-center">
            <span class="date col-1">{{ day.number }}</span>
            <small class="col d-sm-none text-center text-muted">{{ weekDays[index].name }}</small>
            <p class="d-sm-none">No events</p>
        </h5>
        <p class="">No events</p>
    </div>
</template>

<script>
export default {
    props: ['day', 'week-days', 'index'],
    data: function()
    {
        return {

        }
    }
}
</script>
