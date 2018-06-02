<template>
    <div>
        <div class="row no-gutters mb-4">
            <div class="col" v-for="(day, index) in days">
                <div class="p-2 bg-secondary text-white">{{ day.name }}</div>
                <div v-for="(hour, key) in day.hours">
                    <div class="p-2 pointer appointment"
                         v-on:click="select(index, key)"
                         v-bind:class="hasSchedule(hour)"
                         data-toggle="modal"
                         data-target="#appointment-modal">
                        {{ hour.name }}:00
                        <span class="float-right" v-if="hour.appointments.length > 0">x{{ hour.appointments.length }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <button v-on:click="saveSchedule()" class="btn btn-primary btn-block">Save schedule</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade"
             id="appointment-modal"
             tabindex="-1"
             role="dialog"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div v-if="selected !== null">
                            <p v-if="selected.appointments.length == 0" class="text-muted">No schedules for today</p>

                            <div v-for="(appointment, index) in selected.appointments">
                                <div class="mb-2 bg-primary text-white p-2"
                                     v-on:click="removeAppointment(index)">
                                    {{ getHourFromIndex }}:{{ appointment.minute }} - {{ appointment.name }} <span class="float-right">{{ appointment.channel }}</span>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label>Select post:</label>
                                <v-multiselect v-model="selectedPost"
                                               track-by="title"
                                               label="title"
                                               :options="posts">
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
                                    <input type="time"
                                           class="form-control"
                                           :min="minHour"
                                           :max="maxHour"
                                           v-model="selectedMinute">
                                </div>
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
    props: ['user-id'],
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

            socials: [],

            posts: null,
            selectedPost: null,
            selectedChannel: null,
            selectedMinute: null
        }
    },
    computed: {
        minHour: function()
        {
            let hour = this.days[this.selected.day].hours[this.selected.hour].name;
            return ((hour.toString().length > 1) ? hour : '0' + hour) + ':00'
        },
        maxHour: function()
        {
            let hour = this.days[this.selected.day].hours[this.selected.hour].name;
            return ((hour.toString().length > 1) ? hour : '0' + hour) + ':59'
        },
        getHourFromIndex: function()
        {
            return this.days[this.selected.day].hours[this.selected.hour].name;
        },
        extractAppsFromCalendar: function()
        {
            let result = [];
            this.days.forEach((day)=> {
                day.hours.forEach((hour)=> {
                    if(hour.appointments.length > 0)
                    {
                        hour.appointments.forEach((appointment)=> {
                            result.push(appointment)
                        })
                    }
                })
            });
            return result;
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
        validateAppointment: function()
        {
            let result = true;
            if(this.selected == null) { result = false }
            if(this.selectedMinute == null) { result = false }
            if(this.selectedChannel == null) { result = false }
            if(this.selectedPost == null) { result = false }
            return result;
        },
        addAppointment: function()
        {
            if(this.validateAppointment())
            {
                let day = this.selected.day;
                let hour = this.selected.hour;
                this.days[day].hours[hour].appointments.push(this.createAppointment(day, hour, this.selectedMinute, this.selectedChannel, this.selectedPost.title))
                this.clearSelectedAppointment()
            }
        },
        removeAppointment: function(index)
        {
            let day = this.selected.day;
            let hour = this.selected.hour;

            // Check if the appointment has id or not
            if(this.days[day].hours[hour].appointments[index].id !== null)
            {
                this.removeScheduleFromDatabase(this.days[day].hours[hour].appointments[index])
            }
            this.days[day].hours[hour].appointments.splice(index, 1);
        },
        createAppointment: function(day, hour, minute, channel, name, appointmentId)
        {
            return {
                id: (appointmentId !== undefined) ? appointmentId : null,
                name: name,
                day: day,
                hour: hour,
                channel: channel,
                minute: (typeof minute == 'string' && minute.includes(':')) ? minute.split(":")[1] : minute
            }
        },
        clearSelectedAppointment: function()
        {
            this.selectedChannel = null;
            this.selectedPost = null;
            this.selectedMinute = null;
        },
        getPosts: function(callback)
        {
            axios.get(this.api + 'posts/user/' + this.userId).then((result)=> {
                this.posts = result.data;
                callback()
            }).catch((err)=> {
                console.log(err)
            })
        },
        saveSchedule: function()
        {
            axios.post(this.api + 'schedule/user/' + this.userId, this.extractAppsFromCalendar).then((result)=> {
                console.log(result.data)
            }).catch((err)=> {
                console.log(err)
            })
        },
        removeScheduleFromDatabase: function(schedule)
        {
            axios.get(this.api + 'schedule/remove/' + schedule.id).then((result)=> {
                console.log(result.data)
            }).catch((err)=> {
                console.log(err)
            })
        },
        getInitialSchedules: function()
        {
            axios.get(this.api + 'schedule/user/' + this.userId).then((result)=> {
                let schedules = result.data;
                for(let i = 0; i < schedules.length; i++)
                {
                    let post = this.posts.find((post)=> {
                        return post.id == schedules[i].post_id
                    })
                    this.days[schedules[i].date].hours[schedules[i].hour].appointments.push(this.createAppointment(schedules[i].date, schedules[i].hour, schedules[i].minute, schedules[i].channel, post.title, schedules[i].id))
                }
            }).catch((err)=> {
                console.log(err)
            })
        },
        getUserSocialChannels: function()
        {
            axios.get(this.api + 'schedule/social-channels/user/' + this.userId).then((result)=> {
                this.socials = result.data.map((channel)=> {
                    return channel.channel
                });
            }).catch((err)=> {
                console.log(err);
            })
        }
    },
    created()
    {
        // Get all posts by user
        this.getPosts(()=> {
            this.getInitialSchedules();
            this.getUserSocialChannels();
        });
    }
}
</script>

<style scoped>
.appointment:hover {
    filter: brightness(85%);
}
</style>
