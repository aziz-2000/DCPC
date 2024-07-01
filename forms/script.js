document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const nextBtn = form.querySelector(".nextBtn");
    const backBtn = form.querySelector(".backBtn");
    const firstInputs = form.querySelectorAll(".first input[required], .first select[required]");
    const secondInputs = form.querySelectorAll(".second input[required]");
    const submitBtn = form.querySelector(".submit");
    const popup = document.getElementById('popup');

    nextBtn.addEventListener("click", function() {
        let allFilled = true;
        firstInputs.forEach(input => {
            if (input.value.trim() === "") {
                allFilled = false;
            }
        });

        if (allFilled) {
            form.classList.add('secActive');
        } else {
            alert("يرجى تأكد من ملء جميع الحقول المطلوبة.");
        }
    });

    backBtn.addEventListener("click", function() {
        form.classList.remove('secActive');
    });

    submitBtn.addEventListener("click", function(event) {
        let allFilled = true;
        secondInputs.forEach(input => {
            if (input.value.trim() === "") {
                allFilled = false;
            }
        });

        if (!allFilled) {
            alert("يرجى تأكد من ملء جميع الحقول المطلوبة.");
            event.preventDefault(); // Prevent form submission
        } else {
            showPopup();
        }
    });

    function showPopup() {
        popup.style.display = 'flex';
    }

    function closePopup() {
        popup.style.display = 'none';
    }

    // Ensure popup is hidden initially
    popup.style.display = 'none';

    // Close popup when clicking on close button
    document.querySelector('.popup .close').addEventListener('click', closePopup);

    // Close popup when clicking outside of the popup content
    window.addEventListener('click', function(event) {
        if (event.target === popup) {
            closePopup();
        }
    });
});
