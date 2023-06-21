const AuditDeadline = document.querySelector('#AuditDeadline');
const radioButtons = document.querySelectorAll('input[type="radio"]');

for (let i = 0; i < radioButtons.length; i++) {
radioButtons[i].addEventListener('change', function() {
    console.log(this.value);
    if (this.value === 'Once') {
        AuditDeadline.removeAttribute('hidden')
    } else {
        AuditDeadline.setAttribute('hidden', true)
    }
});
}


