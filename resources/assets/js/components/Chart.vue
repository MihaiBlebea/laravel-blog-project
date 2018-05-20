
<script>
import { Line } from 'vue-chartjs';
export default {
    extends: Line,
    props: ['api'],
    mounted () {
        axios.get(this.api).then((result)=> {
            this.renderChart({
                labels: Object.keys(result.data),
                datasets: [
                    {
                        label: 'Post Views',
                        backgroundColor: '#f87979',
                        data: Object.values(result.data)
                    }
                ]
            },
            {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            })
        }).catch((err)=> {
            console.log(err)
        })
    }
}
</script>

<style scoped>
#line-chart {
    height: 200px;
}
</style>
