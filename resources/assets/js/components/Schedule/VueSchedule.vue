<template>
    <div>
        <div class="container-fluid">

            <header>
                <h4 class="display-4 mb-4 text-center">{{ monthList[month].name }} {{ year }}</h4>
                <div class="row d-none d-sm-flex p-1 bg-dark text-white">
                    <h5 v-for="day in weekDays" class="col-sm p-1 text-center">{{ day.name }}</h5>
                </div>
            </header>

            <div v-for="(week) in monthCalendar" class="row border border-right-0 border-bottom-0">

                <div v-for="(day, index) in week"
                     class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-sm-inline-block text-muted"
                     v-bind:class="{'bg-white': day.active}">
                    <vue-day :day="day" :week-days="weekDays" :index="index"></vue-day>
                </div>

            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: [''],
    data: function()
    {
        return {
            date: null,
            monthList: [
                {name: 'January'},
                {name: 'February'},
                {name: 'March'},
                {name: 'April'},
                {name: 'May'},
                {name: 'June'},
                {name: 'July'},
                {name: 'August'},
                {name: 'September'},
                {name: 'October'},
                {name: 'November'},
                {name: 'December'}
            ],
            weekDays: [
                {name: 'Sunday'},
                {name: 'Monday'},
                {name: 'Tuesday'},
                {name: 'Wednesday'},
                {name: 'Thursday'},
                {name: 'Friday'},
                {name: 'Saturday'}
            ]
        }
    },
    computed: {
        today: function()
        {
            return (new Date).getDate();
        },
        month: function()
        {
            return (new Date).getMonth();
        },
        year: function()
        {
            return (new Date).getFullYear();
        },
        appendDays: function()
        {
            let numberOfDays = 6 - this.dayName(this.daysInMonth(this.month, this.year), this.month, this.year);
            let result = [];
            for(let i = 1; i <= numberOfDays; i++)
            {
                result.push({number: i, active: false});
            }
            return result;
        },
        prependDays: function()
        {
            let lastMonth = this.month - 1;
            let year = this.year;
            if(this.month == 0)
            {
                lastMonth = 11;
                year = this.year - 1;
            }
            let lastMonthLastDay = this.daysInMonth(lastMonth, year)
            let numberOfDays = this.dayName(1, this.month, this.year);

            let result = [];
            for(let i = numberOfDays - 1; i >= 0; i--)
            {
                result.push({number: lastMonthLastDay - i, active: false});
            }
            return result;
        },
        monthCalendar: function()
        {
            var daysInMonth = this.prependDays
            for(let i = 0; i < this.daysInMonth(this.month, this.year); i++)
            {
                daysInMonth.push({number: i + 1, active: true});
            }
            for(let i = 0; i < this.appendDays.length; i++)
            {
                daysInMonth.push(this.appendDays[i])
            }
            let week = 0;
            let new_array = []
            let weeksNumber = daysInMonth.length / 7;
            for(let i = 0; i < daysInMonth.length; i++)
            {
                if(i == (daysInMonth.length / weeksNumber) * week)
                {
                    week++;
                    new_array[week] = []
                }
                if(i < (daysInMonth.length / weeksNumber) * week)
                {
                    new_array[week].push(daysInMonth[i])
                }
            }
            new_array.splice(0,1);
            return new_array
        }
    },
    methods: {
        dayName: function(day, month, year)
        {
            return new Date(year, month, day).getDay();
        },
        daysInMonth: function(month, year)
        {
            return (new Date(year, month + 1, 0)).getDate();
        },
    },
    mounted() {
        console.log("Schedule component is mounted")
        this.date = new Date();
    }
}
</script>
