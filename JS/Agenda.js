document.addEventListener('DOMContentLoaded', function () {

    let calendarEl    = document.querySelector('.calendar');
    const background  = document.querySelector('.background'); 
    const container   = document.querySelector('.container');
    const firstModal  = document.querySelector('.modal.new'); 
    const butCloseOne = document.querySelector('.modal #butCloseFirst');
    const legend      = document.querySelector('legend');
    const p           = document.querySelector('.modal p');
    const butCad      = document.querySelector('.modal .butCad');
    const secondModal = document.querySelector('.modal.event'); 
    const butCloseTwo = document.querySelector('.modal #butCloseSecond');
    const firstSpan   = document.querySelector('.firstSpan');
    const secondSpan  = document.querySelector('.secondSpan');
    let textInP       = (p.textContent).trim();

    let calendar = new FullCalendar.Calendar(calendarEl, {

        titleFormat: {
            
            year: 'numeric', 
            month: 'long' 
            
        },
        
        headerToolbar: {
            
            left  : 'prevYear,prev,next,nextYear',
            center: 'title',
            right : 'today,dayGridMonth,timeGridWeek,timeGridDay,listMonth',
            
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
        weekNumbers:  false,
        dayMaxEvents: true,
        navLinks:     true,
        dayMaxEvents: true,
        buttonIcons:  true,
               
        dateClick: function (info) {

            const date      = new Date;
            const year      = date.getFullYear();
            const today     = String(date.getDate()).padStart(2, "0");
            const month     = String(date.getMonth() + 1).padStart(2, "0");
            let actual      = `${year}-${month}-${today}`;
            const condition = actual > info.dateStr;
            
            actual = formateDate(actual);
            ifSelectedDateSmallerToday(condition, 'Não é posível cadastrar eventos em dias que já passaram!');

            hideOrShowContainer();
            firstModal.classList.remove('hide');
            legend.textContent = `Dia ${formateDate(info.dateStr)}`;

        },

        eventClick: function(info) {

            hideOrShowContainer()
            secondModal.classList.remove('hide');
            firstSpan.textContent = ('Event: ' + info.event.title);

        },

        select: function (info) {

            // alert('selected ' + info.startStr + ' to ' + info.endStr);

        },

        events: '../Back-End/Agenda.php'

    });

    calendar.render();

    butCloseOne.addEventListener('click', function () {
        whatModal();
        hideOrShowContainer();
    });
    butCloseTwo.addEventListener('click', function () {
        whatModal();
        hideOrShowContainer();
    });
    document.addEventListener('keydown', clickEsc);

    function hideOrShowContainer() {
        background.classList.toggle('hide'); 
        container.classList.toggle('hide'); 
    }

    function whatModal() {
        let condition = firstModal.classList.contains('hide');

        if (!condition) {
            firstModal.classList.add('hide');
        } else {
            secondModal.classList.add('hide');
        }
    }

    function clickEsc(e) {
        if (e.key == 'Escape' && (!container.classList.contains('hide'))) {
            hideOrShowContainer();
            whatModal()
        }
    }

    function ifSelectedDateSmallerToday(condition, text) {
        if (condition) {
            butCad.classList.add('hide');
            p.textContent = text;
        } else {
            butCad.classList.remove('hide');
            p.textContent = textInP;
        }
    }

    function formateDate(date) {
        let year  = String(date).substring(0, 4);
        let month = String(date).substring(5, 7);
        let day   = String(date).substring(8, 10);

        return `${day}/${month}/${year}`;        
    }

});