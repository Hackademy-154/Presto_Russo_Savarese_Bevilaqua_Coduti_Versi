document.getElementById('yesButton').addEventListener('click', function() {
    document.getElementById('questionTitle').textContent = 'Clicca per accedere';
    document.getElementById('loginButton').style.display = 'block';
    document.getElementById('registerButton').style.display = 'none';
    document.getElementById('yesButton').style.display = 'none';
    document.getElementById('noButton').style.display = 'none';
    document.getElementById('backButton').style.display = 'block';
    document.getElementById('backTitle').style.display = 'block';
});

document.getElementById('noButton').addEventListener('click', function() {
    document.getElementById('questionTitle').textContent = 'Clicca per registrarti';
    document.getElementById('loginButton').style.display = 'none';
    document.getElementById('registerButton').style.display = 'block';
    document.getElementById('yesButton').style.display = 'none';
    document.getElementById('noButton').style.display = 'none';
    document.getElementById('backButton').style.display = 'block';
    document.getElementById('backTitle').style.display = 'block';
});

document.getElementById('backToChoices').addEventListener('click', function() {
    document.getElementById('questionTitle').textContent = 'Sei già registrato?';
    document.getElementById('loginButton').style.display = 'none';
    document.getElementById('registerButton').style.display = 'none';
    document.getElementById('yesButton').style.display = 'block';
    document.getElementById('noButton').style.display = 'block';
    document.getElementById('backButton').style.display = 'none';
    document.getElementById('backTitle').style.display = 'none';
});
