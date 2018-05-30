<template>
    <div>
        <div class="row no-gutters">
            <div class="col" v-for="(day, index) in days">
                <div class="p-2 bg-primary text-white">{{ day.name }}</div>
                <div v-for="(hour, key) in day.hours">
                    <div class="p-2"
                         v-on:click="select(index, key)"
                         v-bind:class="hasSchedule(hour)"
                         data-toggle="modal"
                         data-target="#appointment-modal">
                        {{ hour.name }}:00
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="appointment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div v-if="selected !== null">
                            <div v-for="(appointment, index) in selected.appointments">

                                <div class="mb-2 bg-primary text-white p-2" v-on:click="removeAppointment(index)">
                                    {{ appointment.name }}
                                </div>

                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Select social channel:</label>
                                <select class="form-control">
                                    <option v-for="social in socials">{{ social.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Select minute:</label>
                                <input type="time" class="form-control" :min="'0' + selected.hour + ':00'" :max="'0' + selected.hour + ':59'">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="addAppointment()">Add schedule</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

    </div>
</template>

<script>
export default {
    props: [''],
    data: function()
    {
        return {
            days: [
                { name: 'Monday', hours: [
                    { name:7, appointments: [] },
                    { name:8, appointments: [] },
                    { name:9, appointments: [] },
                    { name:10, appointments: [] },
                    { name:11, appointments: [] },
                    { name:12, appointments: [] },
                    { name:13, appointments: [] }
                ]},
                { name: 'Thursday', hours: [
                    { name:7, appointments: [] },
                    { name:8, appointments: [] },
                    { name:9, appointments: [] },
                    { name:10, appointments: [] },
                    { name:11, appointments: [] },
                    { name:12, appointments: [] },
                    { name:13, appointments: [] }
                ]},
                { name: 'Wednesday', hours: [
                    { name:7, appointments: [] },
                    { name:8, appointments: [] },
                    { name:9, appointments: [] },
                    { name:10, appointments: [] },
                    { name:11, appointments: [] },
                    { name:12, appointments: [] },
                    { name:13, appointments: [] }
                ]},
                { name: 'Tuesday', hours: [
                    { name:7, appointments: [] },
                    { name:8, appointments: [] },
                    { name:9, appointments: [] },
                    { name:10, appointments: [] },
                    { name:11, appointments: [] },
                    { name:12, appointments: [] },
                    { name:13, appointments: [] }
                ]},
                { name: 'Friday', hours: [
                    { name:7, appointments: [] },
                    { name:8, appointments: [] },
                    { name:9, appointments: [] },
                    { name:10, appointments: [] },
                    { name:11, appointments: [] },
                    { name:12, appointments: [] },
                    { name:13, appointments: [] }
                ]},
                { name: 'Saturday', hours: [
                    { name:7, appointments: [] },
                    { name:8, appointments: [] },
                    { name:9, appointments: [] },
                    { name:10, appointments: [] },
                    { name:11, appointments: [] },
                    { name:12, appointments: [] },
                    { name:13, appointments: [] }
                ]},
                { name: 'Sunday', hours: [
                    { name:7, appointments: [] },
                    { name:8, appointments: [] },
                    { name:9, appointments: [] },
                    { name:10, appointments: [] },
                    { name:11, appointments: [] },
                    { name:12, appointments: [] },
                    { name:13, appointments: [] }
                ]}
            ],
            selected: null,
            tempAppointment: null,
            socials: [
                { name: 'twitter' },
                { name: 'facebook' },
                { name: 'linkedin' }
            ]
        }
    },
    methods: {
        hasSchedule: function(hour)
        {
            return (hour.appointments.length > 0) ? 'bg-primary text-white' : 'bg-white';
        },
        select: function(day, hour)
        {
            this.selected = {
                appointments: this.days[day].hours[hour].appointments,
                day: day,
                hour: hour
            }
        },
        addAppointment: function()
        {
            let day = this.selected.day;
            let hour = this.selected.hour;
            this.days[day].hours[hour].appointments.push(this.createAppointment(day, hour, 40, 'Dentist appointment'))
        },
        removeAppointment: function(index)
        {
            let day = this.selected.day;
            let hour = this.selected.hour;
            this.days[day].hours[hour].appointments.splice(index, 1);
        },
        createAppointment: function(day, hour, minute, name)
        {
            return { name: name, day: day, hour: hour, minute: minute }
        }
    },
    created()
    {
        //
    }
}
</script>
