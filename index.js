
const body = document.body;
function toggleDarkMode() {
    const body = document.body;
    body.classList.toggle('dark-mode');

    const isDarkModeEnabled = body.classList.contains('dark-mode');
    const expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + 7);
    document.cookie = `darkMode=${isDarkModeEnabled}; expires=${expirationDate.toUTCString()}; path=/`;
}

function checkDarkModeCookie() {
    const cookies = document.cookie.split('; ');
    for (const cookie of cookies) {
        const [name, value] = cookie.split('=');
        if (name === 'darkMode') {
            return value === 'true';
        }
    }
    return false; // Default to light mode if the cookie doesn't exist
}

if (checkDarkModeCookie()) {
    document.body.classList.add('dark-mode');
}

const toggleButton = document.getElementById('modeToggle');
toggleButton.addEventListener('click', toggleDarkMode);

function showSuccessPopup() {
            var popup = document.getElementById("success-popup");
            popup.style.display = "block";
            setTimeout(function() {
                popup.style.display = "none";
            }, 5000);
}
        
function confirmAppointment(doctorName) {
    if (confirm("Do you want to schedule an appointment with Dr. " + doctorName + "?")) {
        alert("Appointment with Dr. " + doctorName + " scheduled! We contact you soon.");
    }
}