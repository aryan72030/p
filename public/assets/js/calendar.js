
    (function () {
        var options = {
            chart: {
                type: 'area',
                height: 90,
                sparkline: {
                    enabled: true,
                },
            },
            colors: ["#ffa21d"],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                name: 'Bandwidth',
                data: [41, 109, 45, 109, 34, 72, 41]
            }],
            xaxis: {
                categories: ['Apr', 'Jun', 'Aug', 'Oct', 'Oct', 'Nov', 'Dec'],
                tooltip: {
                    enabled: false,
                }
            },
            tooltip: {
                followCursor: false,
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function (seriesName) {
                            return ''
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }
        var chart = new ApexCharts(document.querySelector("#task-chart"), options);
        chart.render();
    })();
    (function () {
        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            // initialView: 'dayGridMonth',
            themeSystem: 'bootstrap',
            slotMinTime: '06:00:00',
            slotMaxTime: '22:00:00',
            slotDuration: '00:30:00',
            navLinks: true,
            selectable: true,
            selectMirror: true,
            editable: false,
            dayMaxEvents: true,
            handleWindowResize: true,
            events: appointmentsData || [],
            eventClick: function(info) {
                document.getElementById('appointmentModalLabel').textContent = info.event.title;
                var customerRow = '';
                if (typeof isAdmin !== 'undefined' && isAdmin) {
                    customerRow = '<p><strong>Customer:</strong> ' + info.event.extendedProps.customer + '</p>';
                }
                document.getElementById('appointmentDetails').innerHTML = 
                    '<p><strong>Staff:</strong> ' + info.event.extendedProps.staff + '</p>' +
                    customerRow +
                    '<p><strong>Status:</strong> <span class="badge bg-' + 
                    (info.event.extendedProps.status == 'Confirmed' ? 'success' : (info.event.extendedProps.status == 'Pending' ? 'warning' : 'secondary')) + 
                    '">' + info.event.extendedProps.status + '</span></p>' +
                    '<p><strong>Date & Time:</strong> ' + info.event.start.toLocaleString() + '</p>';
                new bootstrap.Modal(document.getElementById('appointmentModal')).show();
            }
        });
        calendar.render();
    })();
