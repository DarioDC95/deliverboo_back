import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteButtons = document.querySelectorAll('.confirm-delete-button[type="submit"]')

deleteButtons.forEach((button) => {
    button.addEventListener('click', function(event) {
        // EVITIAMO CHE VENGA IL SUBMIT DEL BUTTON ENTRI IN EFFETTO
        event.preventDefault();

        // RECUPERO IL NOME DELLA PASTA DAL DATA ATTRIBUTE
        const comicTitle = button.getAttribute('data-name');

        // RECUPERO IL LAYOUT DELLA MODALE DALL'HTML
        const modal = document.getElementById('modal_delete');

        // CREO UNA NUOVA MODALE CON I METODI DI BOOTSTRAP
        const bootstrapModal = new bootstrap.Modal(modal);

        // MOSTRO LA MODALE
        bootstrapModal.show();

        // DIAMO IL TITOLO DEL COMIC ALLA MODALE
        const modalTitle = modal.querySelector('#modal-restaurant-name');
        modalTitle.innerText = comicTitle;

        // RECUPERO IL PULSANTE PER CANCELLARE
        const deleteButton = modal.querySelector('#confirm-delete');

        // METTO IN ASCOLTO IL PULSANTE PER INTERCETTARE L'EVENTO CLICK
        deleteButton.addEventListener('click', () => {
            button.parentElement.submit();
        })
    })
});
