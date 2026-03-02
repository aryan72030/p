
    (function () {
        var options = {
            chart: {
                height: 140,
                type: 'donut',
            },
            dataLabels: {
                enabled: false,
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                    }
                }
            },
            series: [ pending, cancelled, confirmed],
            colors: ['#ffa21d', '#FF3A6E', '#3ec9d6'],
            labels: ["pending", "cancelled", "confirmed"],
            legend: {
                show: false
            }
        };
        var chart = new ApexCharts(document.querySelector("#projects-chart"), options);
        chart.render();
    })();

    (function () {
        var options = {
            chart: {
                height: 150,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2,
                curve: 'smooth'
            },
            series: [{
                name: 'Refferal',
                data: [20, 50, 30, 60, 40, 50, 40]
            }, {
                name: 'Organic search',
                data: [40, 20, 60, 15, 50, 65, 20]
            }],
            xaxis: {
                categories: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            colors: ['#ffa21d', '#FF3A6E'],

            grid: {
                strokeDashArray: 4,
            },
            legend: {
                show: false,
            },
            markers: {
                size: 4,
                colors: ['#ffa21d', '#FF3A6E'],
                opacity: 0.9,
                strokeWidth: 2,
                hover: {
                    size: 7,
                }
            },
            yaxis: {
                tickAmount: 3,
                min: 10,
                max: 70,
            }
        };
        var chart = new ApexCharts(document.querySelector("#traffic-chart"), options);
        chart.render();
    })();
    (function () {
        var options = {
            chart: {
                type: 'bar',
                height: 140,
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            colors: ["#fff"],
            plotOptions: {
                bar: {
                    color: '#fff',
                    columnWidth: '20%',
                }
            },
            fill: {
                type: 'solid',
                opacity: 1,
            },
            series: [{
                data: [25, 66, 41]
            }],
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                crosshairs: {
                    width: 0
                },
                labels: {
                    show: false,
                },
            },
            yaxis: {
                tickAmount: 3,
                labels: {
                    style: {
                        colors: "#fff"
                    }
                },
            },
            grid: {
                borderColor: '#ffffff00',
                padding: {
                    bottom: 0,
                    left: 10,
                }
            },
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function (seriesName) {
                            return 'Total Earnings'
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#user-chart"), options);
        chart.render();
    })();
