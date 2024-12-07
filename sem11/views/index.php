<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id='calendar'></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>
        const date = new Date()
        const d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar')
            const calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left  : 'prev, next today',
                    center: 'title',
                    right : 'dayGridMonth, timeGridWeek, timeGridDay'
                },
                themeSystem: 'bootstrap',
                events: [
                    {
                        title: 'All Day Event', // todo el dia
                        start: new Date(y, m, 1),
                        backgroundColor: '#f56954',
                        borderColor: '#f56954',
                        allDay: true
                    },
                    {
                        title: 'Long Event', // evento largo
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                        backgroundColor: '#f39c12',
                        borderColor: '#f39c12'
                    },
                    {
                        title: 'Meeting', // evento puntual
                        start: new Date(y, m, d, 10, 30),
                        end: new Date(y, m, d, 12, 30),
                        allDay: false,
                        backgroundColor: '#0073b7',
                        borderColor: '#0073b7'
                    },
                    {
                        title          : 'Click for Google', // cita con link
                        start          : new Date(y, m, 28),
                        end            : new Date(y, m, 29),
                        url            : 'https://www.google.com/',
                        backgroundColor: '#3c8dbc',
                        borderColor    : '#3c8dbc'
                    }
                ]
            })
            calendar.render()
        })
    </script>
</body>
</html>
