const removeBtn = document.querySelectorAll('input[type="button"]');
const todo = document.querySelector('.todo');


removeBtn.forEach(button => {
    button.addEventListener('click', () => {
        const btn = button.parentElement.parentElement
        btn.remove()
    })
})