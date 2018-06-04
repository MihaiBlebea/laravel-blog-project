<template>
    <div>
        <vue-calendar :user-id="userId"
                      :initial-schedules="initSchedules"
                      :initial-posts="initPosts"
                      v-on:appointment-selected="onAppointmentSelected($event)">
        </vue-calendar>


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

                <vue-modal :user-id="userId"
                           :selected-schedule="selectedSchedule"
                           :initial-posts="initPosts"
                           :initial-socials="initSocials"
                           v-on:appointment-created="onAppointmentCreated($event)"
                           v-on:appointment-removed="onAppointmentRemoved($event)"
                           style="width:100%;">
                </vue-modal>

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
            selectedSchedule: null,

            initSocials: [],
            initPosts: null,
            initSchedules: []
        }
    },
    methods: {
        // Events
        onAppointmentSelected: function(event)
        {
            // event = { day: day, hour: hour, date: date, appointments: [] }
            this.selectedSchedule = event;
        },
        onAppointmentCreated: function(event)
        {
            this.saveSchedule(event)
        },
        onAppointmentRemoved: function(event)
        {
            this.removeSchedule(event)
        },

        // Calls to server
        saveSchedule: function(schedule)
        {
            axios.post(this.api + 'schedule/user/' + this.userId, schedule).then((result)=> {
                if(result.status == 200)
                {
                    this.getInitialSchedules();
                }
            }).catch((err)=> {
                console.log(err)
            })
        },
        removeSchedule: function(schedule)
        {
            axios.get(this.api + 'schedule/remove/' + schedule.id).then((result)=> {
                if(result.status == 200)
                {
                    this.getInitialSchedules();
                }
            }).catch((err)=> {
                console.log(err)
            })
        },
        getPosts: function(callback)
        {
            axios.get(this.api + 'posts/user/' + this.userId).then((result)=> {
                this.initPosts = result.data;
                callback()
            }).catch((err)=> {
                console.log(err)
            })
        },
        getInitialSchedules: function()
        {
            axios.get(this.api + 'schedule/user/' + this.userId).then((result)=> {
                this.initSchedules = result.data
            }).catch((err)=> {
                console.log(err)
            })
        },
        getUserSocialChannels: function()
        {
            axios.get(this.api + 'schedule/social-channels/user/' + this.userId).then((result)=> {
                this.initSocials = result.data.map((channel)=> {
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
