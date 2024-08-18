function updateDateTime() {
    const dateTimeElement = document.getElementById('currentDateTime');
    const now = new Date();
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    };
    const formattedDateTime = now.toLocaleDateString('en-US', options);
    dateTimeElement.textContent = formattedDateTime;
}

// Update the date and time on page load
updateDateTime();

// Update the date and time every second
setInterval(updateDateTime, 1000);
