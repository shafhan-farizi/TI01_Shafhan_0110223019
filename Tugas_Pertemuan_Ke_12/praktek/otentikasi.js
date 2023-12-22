function auth(){
    const username = 'Safuh'
    const password = '12345'

    let userInput = document.getElementById('username').value
    let passwordInput = document.getElementById('password').value

    if(username == userInput && password == passwordInput){
        alert('Login Berhasil!')
        window.location.href = 'home.html'
    } else{
        alert('Login Gagal!')
    }
}