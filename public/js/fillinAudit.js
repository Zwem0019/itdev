const radio = document.querySelectorAll('input[type=radio]');
const noButton = document.querySelector('#no');
const yesButton = document.querySelector('#yes');
const actionField = document.querySelector('#action');
actionField.setAttribute('hidden', 'true');
radio[0].setAttribute('checked', 'true');

noButton.addEventListener('click', () => {
    console.log('no');
    actionField.removeAttribute('hidden');
});

yesButton.addEventListener('click', () => {
    console.log('yes');
    actionField.setAttribute('hidden', 'true');
});
