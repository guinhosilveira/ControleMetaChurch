document.addEventListener('DOMContentLoaded', function () {

    let calendarEl = document.getElementById('calendar');

    let calendar = new FullCalendar.Calendar(calendarEl, {

        titleFormat: {
            
            month: 'long',
            year : 'numeric',
            day  : 'numeric'
            
        },
        
        headerToolbar: {
            
            left  : 'prevYear,prev,next,nextYear',
            center: 'title',
            right : 'today dayGridMonth,timeGridWeek,timeGridDay,listMonth',
            
        },
        buttonText: {

            today: 'hoje',
            month: 'mês',
            week : 'semana',
            day  : 'dia',
            list : 'lista',

        },

        locale:      'pt-br',
        initialView: 'dayGridMonth',
        editable:     true,
        selectable:   true,
        weekNumbers:  true,
        dayMaxEvents: true,
        navLinks:     true,
        dayMaxEvents: true,
        buttonIcons:  true,
               

        dateClick: function (info) {

            alert('Clicked on: ' + info.dateStr);

        },

        eventClick: function(info) {
            alert('Event: ' + info.event.title);
            alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            alert('View: ' + info.view.type);
        },

        select: function (info) {

            alert('selected ' + info.startStr + ' to ' + info.endStr);

        },

        events: '../Back-End/Agenda.php'

    });

    calendar.render();

});