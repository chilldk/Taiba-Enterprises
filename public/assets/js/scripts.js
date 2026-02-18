/* Core JS for AccordExhibit Static Clone */

document.addEventListener('DOMContentLoaded', function() {
    // Dynamic Copyright Year
    const yearElement = document.getElementById('current-year');
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }

    // Responsive Menu Toggle
    const menuToggle = document.querySelector('.icon');
    const topNav = document.getElementById('myTopnav');
    if (menuToggle && topNav) {
        menuToggle.addEventListener('click', function() {
            if (topNav.className === 'topnav') {
                topNav.className += ' responsive';
            } else {
                topNav.className = 'topnav';
            }
        });
    }

    // Simple Form Submission Placeholder
    const enquiryForm = document.getElementById('enquiryForm');
    if (enquiryForm) {
        enquiryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Enquiry received (Static Demo Only).');
            enquiryForm.reset();
        });
    }
});
