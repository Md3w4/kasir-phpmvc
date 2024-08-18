document.getElementById('no-expiry').addEventListener('change', function() {
    var kadaluarsaInput = document.getElementById('kadaluarsa');
    if (this.checked) {
        kadaluarsaInput.disabled = true;
        kadaluarsaInput.value = ''; // Optional: Clear the input if unchecked
    } else {
        kadaluarsaInput.disabled = false;
    }
});