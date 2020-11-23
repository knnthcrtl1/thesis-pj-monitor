var ctx = document.getElementById('myChart').getContext('2d');
let dateLabel = ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December']
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    data: {
        datasets: [{
            label: 'Project count',
            data: [0, 20, 40, 50]
        }],
        labels: ['January', 'February', 'March', 'April']
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMin: 50,
                    suggestedMax: 100,
                }
            }],
        }
    }
});