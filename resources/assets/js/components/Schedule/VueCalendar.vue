<template>
    <div>
        <!-- Week controller -->
        <p class="text-center">
            <span class="pointer"
                  v-bind:class="{'text-primary' : bindWeekClass}"
                  v-on:click="toggleWeeks()">This week</span> /
            <span class="pointer"
                  v-bind:class="{'text-primary' : !bindWeekClass}"
                  v-on:click="toggleWeeks()">Next week</span>
        </p>
        <!-- Week controller -->

        <div class="row no-gutters mb-4">
            <div class="col" v-for="(day, index) in computedDays">
                <div class="p-2 bg-secondary text-white">{{ dayName[index] }}</div>
                <div v-for="(hour, key) in day.hours">
                    <div v-on:click="selectAppointmentForEdit(index, key)"
                         v-bind:class="hasSchedule(hour)"
                         class="p-2 pointer appointment"
                         data-toggle="modal"
                         data-target="#appointment-modal">
                        {{ hour.name }}:00
                         <span class="float-right" v-if="hour.appointments.length > 0">x{{ hour.appointments.length }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';

export default {
    props: ['initial-schedules', 'initial-posts'],
    data: function()
    {
        return {
            days: [],
            dayName: [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday',
            ],
            week: 0,

            storeOpenedModal: {
                day: null,
                hour: null
            }
        }
    },
    watch: {
        initialSchedules: function()
        {
            // Restart calendar, to delete garbage appointments left behind after delete
            this.days = this.generateCalendar()

            let schedules = this.initialSchedules;
            for(let i = 0; i < schedules.length; i++)
            {
                let post = this.initialPosts.find((post)=> {
                    return post.id == schedules[i].post_id
                })
                // Get index of the this.days from date stored in object
                let dayIndex = this.getDayIndexByDate(schedules[i].date);
                let appointment = this.createAppointment(this.days[dayIndex].name,
                                                         schedules[i].hour,
                                                         schedules[i].minute,
                                                         schedules[i].channel,
                                                         post.title,
                                                         schedules[i].id)
                this.days[dayIndex].hours[schedules[i].hour].appointments.push(appointment)
            }
            // Update selected Modal
            if(this.storeOpenedModal.day !== null && this.storeOpenedModal.hour !== null)
            {
                this.selectAppointmentForEdit(this.storeOpenedModal.day, this.storeOpenedModal.hour)
            }
        }
    },
    computed: {
        // Make link primary if week is selected
        bindWeekClass: function()
        {
            return (this.week == 0) ? true : false;
        },
        // Loop through days depending on week 0 or 1
        computedDays: function()
        {
            return this.days.filter((day, index)=> {
                return (this.week == 0) ? index < 7 : index > 6
            })
        }
    },
    methods: {
        // Helper methods
        toggleWeeks: function()
        {
            this.week = (this.week == 0) ? 1 : 0;
        },
        selectAppointmentForEdit: function(day_index, hour_index)
        {
            this.storeOpenedModal = {
                day: day_index,
                hour: hour_index
            }

            this.$emit('appointment-selected', {
                day: day_index,
                hour: hour_index,
                date: this.days[day_index].date,
                appointments: this.days[day_index].hours[hour_index].appointments
            });
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
        hasSchedule: function(hour)
        {
            return (hour.appointments.length > 0) ? 'bg-primary text-white' : 'bg-white';
        },
        getDayIndexByDate: function(date)
        {
            date = moment(date).format('DD-MM-YYYY')
            for(let i in this.days)
            {
                if(this.days[i].date == date)
                {
                    return i;
                }
            }
        },

        // Essential for creatin calendar
        range: function(start, end)
        {
            let result = []
            for(let i = start; i < end; i++)
            {
                result.push(i);
            }
            return result;
        },
        hours: function()
        {
            let hours = []
            let hourNames = this.range(7,20);
            for(let i in hourNames)
            {
                hours.push({
                    name: hourNames[i],
                    appointments: []
                })
            }
            return hours;
        },
        generateCalendar: function()
        {
            let days = []
            for(let i in this.range(0, 14))
            {
                let startOfWeek = moment().startOf('isoWeek');
                days.push({
                    name: i,
                    date: startOfWeek.add(i, 'd').format('DD-MM-YYYY'),
                    hours: this.hours()
                })
            }
            return days
        }
    },
    created() {
        this.days = this.generateCalendar()
    }
}
</script>
