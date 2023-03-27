import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// MODALE BUTTON DELETE
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
        const modalTitle = modal.querySelector('#modal-name');
        modalTitle.innerText = comicTitle;

        // RECUPERO IL PULSANTE PER CANCELLARE
        const deleteButton = modal.querySelector('#confirm-delete');

        // METTO IN ASCOLTO IL PULSANTE PER INTERCETTARE L'EVENTO CLICK
        deleteButton.addEventListener('click', () => {
            button.parentElement.submit();
        })
    })
});

// prova multiselect
const selectBtn = document.querySelector(".select-btn"),
      items = document.querySelectorAll(".item");

if(selectBtn != null) {

    selectBtn.addEventListener("click", () => {
        selectBtn.classList.toggle("open");
    });
    
    items.forEach(item => {
        item.addEventListener("click", () => {
            item.classList.toggle("checked");
    
            let checked = document.querySelectorAll(".checked"),
                btnText = document.querySelector(".btn-text");
    
                if(checked && checked.length > 0){
                    btnText.innerText = `${checked.length} Selected`;
                }else{
                    btnText.innerText = "Seleziona Tipologia";
                }
        });
    })
}

// CONTROLLO FORM SUBMIT
if (document.querySelector('form.myform') != null) {

    document.querySelector('form.myform').addEventListener('submit', function (event) {
        const inputTypes = document.querySelectorAll('.types-checks:checked');
        let errorMessage = document.getElementById('error-message');
        
        if (inputTypes.length == 0) {
            errorMessage.style.display = 'block';
            event.preventDefault();
        } else {
            errorMessage.style.display = 'none';
        }
    });
}

// CONTROLLO PASSWORD UGUALI
// const registerButton = document.getElementById('register-user-submit');

// if (registerButton != null) {

//     registerButton.addEventListener('click', function(event) {
//         event.preventDefault();

//         // input
//         const inputName = document.getElementById('name');
//         const inputEmail = document.getElementById('email');
//         const inputPassword = document.getElementById('password');
//         const inputPasswordConfirm = document.getElementById('password-confirm');
//         const inputAddress = document.getElementById('address');
//         const inputPiva = document.getElementById('p_iva');
//         const inputTypes = document.querySelectorAll('.types-checks:checked');

//         // errors
//         const errorName = document.getElementById('error-name');
//         const errorEmail = document.getElementById('error-email');
//         const errorPassword = document.getElementById('error-password');
//         const errorAddress = document.getElementById('error-address');
//         const errorPiva = document.getElementById('error-p_iva');
//         const errorTypes = document.getElementById('error-types');

//         // condizionali
//         if (inputName.value.trim() != ''
//             && inputEmail.value.trim() != ''
//             && inputPassword.value.trim() == inputPasswordConfirm.value.trim()
//             && inputPassword.value.trim() != ''
//             && inputPasswordConfirm.value.trim() != ''
//             && inputAddress.value.trim() != ''
//             && inputPiva.value.trim() != '') {
//             console.log(inputPassword.value);
//             this.parentElement.parentElement.parentElement.submit();
//             errorName.classList.add('d-none');
//             errorEmail.classList.add('d-none');
//             errorPassword.classList.add('d-none');
//             errorAddress.classList.add('d-none');
//             errorPiva.classList.add('d-none');
//             errorTypes.classList.add('d-none');
//         }
//         if (inputName.value.trim() == '') {
//             errorName.classList.remove('d-none');
//         }
//         if (inputName.value.trim() != '') {
//             errorName.classList.add('d-none');
//         }
//         if (inputEmail.value.trim() == '') {
//             errorEmail.classList.remove('d-none');
//         }
//         if (inputEmail.value.trim() != '') {
//             errorEmail.classList.add('d-none');
//         }
//         if (inputPassword.value.trim() == inputPasswordConfirm.value.trim()) {
//             errorPassword.classList.add('d-none');
//         }
//         if (inputPassword.value.trim() != inputPasswordConfirm.value.trim() || inputPassword.value.trim() == '' && inputPasswordConfirm.value.trim() == '') {
//             errorPassword.classList.remove('d-none');
//         }
//         if (inputAddress.value.trim() == '') {
//             errorAddress.classList.remove('d-none');
//         }
//         if (inputAddress.value.trim() != '') {
//             errorAddress.classList.add('d-none');
//         }
//         if (inputPiva.value.trim() == '') {
//             errorPiva.classList.remove('d-none');
//         }
//         if (inputPiva.value.trim() != '') {
//             errorPiva.classList.add('d-none');
//         }
//         if (inputTypes.length == 0) {
//             errorTypes.classList.remove('d-none');
//         }
//         if (inputTypes.length != 0) {
//             errorTypes.classList.add('d-none')
//         }
//     })
// }
