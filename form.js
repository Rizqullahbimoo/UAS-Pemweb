// Menangkap elemen form
const userForm = document.getElementById('userForm');

// Menambahkan event listener pada saat form akan disubmit
userForm.addEventListener('submit', function(event) {
    // Cegah pengiriman form jika ada input yang tidak valid
    if (!userForm.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
    }

    // Menandai elemen form sebagai telah divalidasi
    userForm.classList.add('was-validated');
});

// Menambahkan event listener untuk input yang memiliki validasi custom
const inputs = userForm.querySelectorAll('input');
inputs.forEach(input => {
    input.addEventListener('input', () => {
        if (input.checkValidity()) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }
    });
});

// Validasi tambahan untuk radio button (posisi)
const positionRadios = document.getElementsByName('position');

userForm.addEventListener('submit', function(event) {
    const isPositionSelected = Array.from(positionRadios).some(radio => radio.checked);
    
    if (!isPositionSelected) {
        event.preventDefault();
        event.stopPropagation();
        positionRadios.forEach(radio => radio.closest('.form-group').classList.add('is-invalid'));
    } else {
        positionRadios.forEach(radio => radio.closest('.form-group').classList.remove('is-invalid'));
    }
});
