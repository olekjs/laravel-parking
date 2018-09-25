global.$ = global.jQuery = require('jquery');

jQuery(document).ready(function() {

    class spaceStatistic {
        constructor() {
            const $chartData = $('#spaceStatistic').data();
            const $reservations = $chartData.parkingproperties.reservations;
            const $dates = $chartData.parkingproperties.dates;

            const ctx = document.getElementById('spaceStatistic').getContext('2d');
            this.chartModel(ctx, $dates, $reservations);
        }
        chartModel(ctx, $dates, $reservations) {
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [$dates[2], $dates[1], $dates[0]],
                    datasets: [{
                        label: `Reserved spaces`,
                        data: [$reservations[2], $reservations[1], $reservations[0]],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Space reservation (today and last 2 days)'
                    }
                }
            });
        }
    }

    class earningStatistic {
        constructor() {
            const ctx = document.getElementById('earningStatistic').getContext('2d');
            this.chartModel(ctx);
        }
        chartModel(ctx) {
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [1,2,3],
                    datasets: [{
                        label: `Earning statistic`,
                        data: [12,3,66],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Earnings (DEMO)'
                    }
                }
            });
        }
    }


    new spaceStatistic();
    new earningStatistic();
});