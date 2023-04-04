
const validation  = document.querySelector('.validation-wrapper');
const title       = document.querySelector('.title-wrapper');
const post        = document.querySelector('.post-wrapper');
const events      = document.querySelector('.events-wrapper');
const button      = document.querySelector('.butAct');

const eventCard0   = document.querySelector('.card0');
const eventCard1   = document.querySelector('.card1');
const eventCard2   = document.querySelector('.card2');
const eventBg     = document.querySelector('.modal-event-wrapper');
const modalEvent  = document.querySelector('.modal-event-wrapper .modal');
const h2          = modalEvent.querySelector('h2');
const p           = modalEvent.querySelector('p');
const btnClose    = modalEvent.querySelector('#butClose');


if (eventCard0 != null) {
    
    eventCard0.addEventListener('click', function () {
    
        let datap = eventCard0.querySelectorAll('p');
        let title = eventCard0.querySelector('h3');
        
        h2.textContent = title.textContent;
        
        for (let index = 0; index < datap.length; index++) {
            p.textContent  += datap[index].textContent;
        }
    
        eventBg.classList.remove('hide');
    }); 
    
} 

if (eventCard1 != null) {
    
    eventCard1.addEventListener('click', function () {
    
        let datap = eventCard1.querySelectorAll('p');
        let title = eventCard1.querySelector('h3');
        
        h2.textContent = title.textContent;
        
        for (let index = 0; index < datap.length; index++) {
            p.textContent  += datap[index].textContent;
        }
    
        eventBg.classList.remove('hide');
    }); 

}

if (eventCard2 != null) {
    
    eventCard2.addEventListener('click', function () {
    
        let datap = eventCard2.querySelectorAll('p');
        let title = eventCard2.querySelector('h3');
        
        h2.textContent = title.textContent;
        
        for (let index = 0; index < datap.length; index++) {
            p.textContent  += datap[index].textContent;
        }
    
        eventBg.classList.remove('hide');
    });

}

btnClose.addEventListener('click', function (){
    closeModal();
});

window.addEventListener('keydown', handleEscapeClick)

button.click();

function alterVisibilityValidation() {
    validation.classList.toggle('hide');
    title.classList.toggle('hide');
    post.classList.toggle('hide');
    events.classList.toggle('hide');
}

function handleEscapeClick(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
}

function closeModal() {
    if (!eventBg.classList.contains('hide')) {
        eventBg.classList.add('hide');
    }
    p.textContent = null;
}
