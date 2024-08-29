function doAsyncRequestAdd(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!name || !email || !password) {
        alert('Будь ласка, заповніть всі поля');
        return;
    }

    const formData = {
        name: name,
        email: email,
        password: password
    };
    fetch('http://localhost/lab6/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
        .then(response => {
            if (!response.ok) {
                alert(response);
                throw new Error('Помилка');
            }
            return response.json();
        })
        .then(data => {
            alert('Повідомлення: ' + data.message);
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
        })
        .catch(error => {
            alert('Помилка під час відправки даних на сервер: ' + error.message);
        });
}

document.getElementById('button_send').addEventListener('click', (event) => {
    doAsyncRequestAdd(event);
})