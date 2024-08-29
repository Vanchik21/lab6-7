function doAsyncRequestList() {
    fetch('http://localhost/lab6/opUsers?action=displayUsers', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify("")
    })
        .then(response => response.json())
        .then(data => {
            let listContainer = document.querySelector('#listUser');
            listContainer.innerHTML = '';

            data.forEach(user => {
                let userDiv = document.createElement('div');
                userDiv.classList.add('user');

                let idDiv = document.createElement('div');
                idDiv.textContent = 'ID: ' + user.id;
                userDiv.appendChild(idDiv);

                let nameDiv = document.createElement('div');
                nameDiv.textContent = 'Name: ' + user.name;
                userDiv.appendChild(nameDiv);

                let emailDiv = document.createElement('div');
                emailDiv.textContent = 'Email: ' + user.email;
                userDiv.appendChild(emailDiv);

                let passwordDiv = document.createElement('div');
                passwordDiv.textContent = 'Password: ' + user.password;
                userDiv.appendChild(passwordDiv);

                listContainer.appendChild(userDiv);
            });
        })
        .catch(error => {
            alert('Помилка під час відправки даних на сервер: ' + error.message);
        });
}

document.getElementById('but_listUsers').addEventListener('click', (event) => {
    doAsyncRequestList();
})

function doAsyncLogin(email, password) {
    fetch('http://localhost/lab6/opUsers?action=login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({email, password}),
    })
        .then(response => response.json())
        .then(data => {
            alert("Успішний вхід!");
            document.getElementById('divForm').style.display = 'none';
            document.getElementById('list').style.display = 'block';
        })
        .catch(error => alert('Помилка входу:' + error));
}

document.getElementById('button_signIn').addEventListener('click', (event) => {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    doAsyncLogin(email, password);
})

function doAsyncDeleteUser(id) {
    fetch('http://localhost/lab6/opUsers?action=delete', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({id: id}),
    })
        .then(response => response.json())
        .then(result => {
            console.log('Користувач видалений:', result);
            document.getElementById('id_user').value = '';
            doAsyncRequestList();
        })
        .catch(error => console.error('Помилка видалення:', error));
}

document.getElementById('but_deleteUsers').addEventListener('click', (event) => {
    event.preventDefault();
    const id = document.getElementById('id_user').value;
    doAsyncDeleteUser(id);
});

function doAsyncEditUser(id, name, email) {
    fetch('http://localhost/lab6/opUsers?action=edit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({id: id, name: name, email: email}),
    })
        .then(response => response.json())
        .then(result => {
            alert('Дані користувача оновлені!');
            document.getElementById('id_user_update').value = '';
            document.getElementById('name_update').value = '';
            document.getElementById('email_update').value = '';
            doAsyncRequestList();
        })
        .catch(error => console.error('Помилка редагування:', error));
}

document.getElementById('button_update').addEventListener('click', (event) => {
    event.preventDefault();
    const id = document.getElementById('id_user_update').value;
    const name_update = document.getElementById('name_update').value;
    const email_update = document.getElementById('email_update').value;
    if (!id || !name_update || !email_update) {
        alert('Поле не може бути порожнім!');
        return;
    }
    doAsyncEditUser(id, name_update, email_update);
});
