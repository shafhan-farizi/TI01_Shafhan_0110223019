function hitung_ingkaran() {
    let jari = document.getElementById('nilai-lingkaran').value
    let keliling = document.getElementById('keliling-lingkaran')
    let luas = document.getElementById('luas-lingkaran')

    let phi = jari % 7 == 0 ? 22/7 : 3.14

    let hasil_keliling = 2 * (phi * jari)
    let hasil_luas = phi * jari * jari

    document.getElementById('keliling-lingkaran').innerText = hasil_keliling
    document.getElementById('luas-lingkaran').innerText = hasil_luas.toFixed(2)
}