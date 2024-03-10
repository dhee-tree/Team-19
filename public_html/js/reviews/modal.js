document.addEventListener('DOMContentLoaded', function () {
    const formSubmitButtons = document.querySelectorAll('.btn-submit');
    const reviewButtons = document.querySelectorAll('.btn-view');

    formSubmitButtons.forEach(button => {
        button.addEventListener('click', function () {
            const reviewId = this.getAttribute('data-review-id');
            const modalMessage = document.getElementById('confirmationMessage');
            modalMessage.textContent = this.getAttribute('data-modal-message');
            document.getElementById('confirmationModalButton').setAttribute('form', `updateForm${reviewId}`);
        });
    });

    reviewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const reviewId = this.getAttribute('data-review-id');
            const userId = this.getAttribute('data-review-user-id');
            const modalMessage = document.getElementById('reviewModalDescription');
            modalMessage.value = this.getAttribute('data-modal-message');
            document.getElementById('reviewModalUpdateForm').setAttribute('action', `/review/${reviewId}`);
            
            const modalSubmitElements = document.querySelectorAll('.modal-submit-element');
                modalSubmitElements.forEach(element => {
                    element.classList.remove('d-none');
            });
        });
    });
});