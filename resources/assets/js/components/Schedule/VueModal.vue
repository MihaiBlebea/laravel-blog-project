<template>
    <div>
        <div class="modal-content">
            <div class="modal-body">
                <div v-if="selected !== null">

                    <!-- Schedules displayed here -->
                    <p v-if="selected.appointments.length == 0" class="text-muted">No schedules for today</p>

                    <div v-for="(appointment, index) in selected.appointments">
                        <div class="mb-2 bg-primary text-white p-2"
                             v-on:click="removeAppointment(index)">
                            {{ appointment.minute }} min - {{ appointment.name }} <span class="float-right">{{ appointment.channel }}</span>
                        </div>
                    </div>
                    <!-- Schedules displayed here -->

                    <hr>

                    <!--Add new schedule here -->
                    <div class="form-group">
                        <label>Select post:</label>
                        <v-multiselect v-model="selectedPost"
                                       track-by="title"
                                       label="title"
                                       :options="initialPosts">
                        </v-multiselect>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Select social channel:</label>
                            <v-multiselect v-model="selectedChannel"
                                           :options="socials">
                            </v-multiselect>
                        </div>
                        <div class="col">
                            <label>Select minute:</label>
                            <input type="number"
                                   class="form-control"
                                   min="00"
                                   max="59"
                                   v-model="selectedMinute">
                        </div>
                    </div>
                    <!--Add new schedule here -->

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" v-on:click="addAppointment()">Add schedule</button>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';

export default {
    props: ['selected-schedule', 'user-id', 'initial-posts', 'initial-socials'],
    data: function()
    {
        return {
            selected: null,
            posts: this.userPosts,
            socials: null,

            // Selected in modal form
            selectedPost: null,
            selectedChannel: null,
            selectedMinute: null
        }
    },
    watch: {
        selectedSchedule: function()
        {
            this.selected = this.selectedSchedule
        },
        initialSocials: function()
        {
            this.socials = this.initialSocials
        }
    },
    methods: {
        addAppointment: function()
        {
            if(this.validateAppointment())
            {
                let day = this.selected.day;
                let hour = this.selected.hour;

                let appointment = this.createAppointment(day,
                                                         hour,
                                                         this.selectedMinute,
                                                         this.selected.date,
                                                         this.selectedChannel,
                                                         this.selectedPost.title)

                this.$emit('appointment-created', appointment)
                this.clearSelectedAppointment()
            }
        },
        validateAppointment: function()
        {
            let result = true;
            if(this.selected == null) { result = false }
            if(this.selectedMinute == null) { result = false }
            if(this.selectedChannel == null) { result = false }
            if(this.selectedPost == null) { result = false }
            return result;
        },
        clearSelectedAppointment: function()
        {
            this.selectedChannel = null;
            this.selectedPost = null;
            this.selectedMinute = null;
        },
        removeAppointment: function(index)
        {
            this.$emit('appointment-removed', this.selected.appointments[index]);
            // this.selected.appointments.splice(index, 1);
        },
        createAppointment: function(day, hour, minute, date, channel, name, appointmentId)
        {
            return {
                id: (appointmentId !== undefined) ? appointmentId : null,
                name: name,
                day: day,
                hour: hour,
                realHour: this.selectedSchedule.realHour,
                date: date,
                channel: channel,
                minute: (typeof minute == 'string' && minute.includes(':')) ? minute.split(":")[1] : minute
            }
        }
    },
    mounted() {
        //
    }
}
</script>
<!--  -->
