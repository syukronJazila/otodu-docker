/* Bisa Mengakses Text */
document.querySelector("#navMentorOtodu").innerText = "Mentor Otodu";


document.getElementById("materi-btn").addEventListener("click", function() {
    window.location.href = "price.php";
});


/* Belum Bisa Mengakses Tag (Jika Diaktifkan Elemennya Hilang) 
document.querySelector("#konten").innerHTML = `<h1>Hallo Dunia</h1>`;
*/

/* Belum Bisa Mengakses Tag, Tapi Bisa Mengubah Warna Text (Jika Diaktifkan)
document.querySelector("#navbar").innerHTML = `<h1 style="color:red;">Hallo Sekai</h1>`;
*/