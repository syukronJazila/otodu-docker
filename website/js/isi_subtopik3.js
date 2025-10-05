const akhir = {
            1: {
                deskripsiPetunjuk: "Tetap Semangat Tetap Otodidak",
                teksAkhir: "Lanjut",
                cek: false,
            },
            2: {
                deskripsiPetunjuk: "Otodidak Adalah Jalan Ninjaku",
                teksAkhir: "Lanjut",
                cek: false,
            },
            3: {
                deskripsiPetunjuk: "Isi Kotak Kosong Dengan Memilih dan Mengetik Saran Jawaban",
                teksAkhir: "Cek",
                kuisGanda: 1,
                cek: false,
            },
            4: {
                deskripsiPetunjuk: "Pengalaman Adalah Guru Terbaik",
                teksAkhir: "Lanjut",
                cek: false,
            },
            5: {
                deskripsiPetunjuk: "Self-education is, I firmly believe, the only kind of education there is. – Isaac Asimov",
                teksAkhir: "Lanjut",
                cek: false,
            },
            6: {
                deskripsiPetunjuk: "Fokuslah Dalam Memilih Jawaban, Anda Tidak Dikejar Setan",
                teksAkhir: "Pilihan",
                cek: false,
            },
            7: {
                deskripsiPetunjuk: "Self-education is a lifelong journey. Keep learning, keep growing.",
                teksAkhir: "Lanjut",
                cek: false,
            },
            8: {
                deskripsiPetunjuk: "Kesuksesanmu Ditentukan Oleh Usahamu Dan Kekuatan Dari Dalam",
                teksAkhir: "Cek",
                kuisGanda: 2,
                cek: false
            }
        };

        let currentContentIndex = 1;
        const totalContents = 8;
        const deskAkhir = document.querySelector("#deskripsiPetunjuk");
        const tombolAkhir = document.querySelector("#lanjut-btn");
        
        function prevContent() {
            if (currentContentIndex > 1) {
                currentContentIndex--;
                showContent(`materi${currentContentIndex}`);
            }
        }

        function nextContent() {
            if (currentContentIndex < totalContents) {
                currentContentIndex++;
                showContent(`materi${currentContentIndex}`);
            }else{
                selesai();
            }
        }
        
        function cekHalaman(){
            console.log(`Index: ${currentContentIndex}, Teks Akhir: ${akhir[currentContentIndex].teksAkhir}`);
            if(akhir[currentContentIndex].teksAkhir === "Cek"){         
                checkAnswer(akhir[currentContentIndex].kuisGanda);
            }else if (akhir[currentContentIndex].teksAkhir === "Pilihan" || currentContentIndex === 6){
                tombolAkhir.style.display = "none";
            }else{
                nextContent();
            }
        }

        function showContent(id) {
            tombolAkhir.innerText = akhir[currentContentIndex].teksAkhir;
            deskAkhir.innerText = akhir[currentContentIndex].deskripsiPetunjuk;
            
            // Sembunyikan semua konten terlebih dahulu
            var contents = document.querySelectorAll('.content');
            contents.forEach(content => content.classList.remove('active'));

            // Tampilkan konten yang dipilih
            document.getElementById(id).classList.add('active');

            // Update index saat pengguna memilih langsung
            currentContentIndex = parseInt(id.replace('materi', ''));

            // Hapus highlight dari semua tombol
            for (let i = 1; i <= totalContents; i++) {
                document.getElementById(`btn-materi${i}`).classList.remove('active-button');
            }
            // Tambahkan highlight pada tombol aktif
            document.getElementById(`btn-materi${currentContentIndex}`).classList.add('active-button');
        }
        
        /* Kuis Materi 3 */
        function placeAnswer(element, id) {
    const emptySlot = document.querySelector(`#answer-slot-${id} div:not(.answered)`);
    if (emptySlot) {
        emptySlot.textContent = element.textContent;
        emptySlot.classList.add('answered');
        emptySlot.dataset.value = element.innerText;
        console.log(emptySlot.dataset.value);
        element.style.display = 'none';
    }
}

function removeAnswer(slot, id) {
    const originalChoice = Array.from(document.querySelectorAll(`#choices-${id} div`))
        .find(choice => choice.textContent === slot.textContent);
    if (originalChoice) {
        originalChoice.style.display = 'block';
    }
    slot.textContent = '';
    slot.classList.remove('answered');
}

function checkAnswer(id) {
    const answer = Array.from(document.querySelectorAll(`#answer-slot-${id} div`))
        .map(div => div.textContent.trim()) // Mengambil teks dari setiap elemen `div`, termasuk yang statis
        .join(' '); // Menggabungkan teks dengan spasi
        
        const correctAnswer = {
          1: 'Himpunan Laki-Laki Memetakan Himpunan Jodohnya',
          2: 'Memahami Sebab Dan Akibat Merupakan Salah Satu Manfaat Mempelajari Fungsi'};

    const hasil = document.querySelector(`#hasil-${id}`);
    if (answer === correctAnswer[id]) {
        hasil.innerText = "Benar!";
        setTimeout(() => nextContent(), 1000);
    } else {
        hasil.innerText = "Salah, coba lagi.";
    }
}

        /* Kuis Materi 6 */
const pernyataanBenar = 3;

function tentukan(id) {
    const button = document.getElementById(`pernyataan-${id}`);
    const hasilPilihan = document.getElementById('hasilPilihan');

    // Reset semua tombol ke kondisi awal
    const semuaTombol = document.querySelectorAll('button[id^="pernyataan-"]');
    semuaTombol.forEach((tombol) => tombol.classList.remove('salah', 'benar'));

    if (id === pernyataanBenar) {
        button.classList.add('benar');
        hasilPilihan.textContent = "Benar! Domain adalah daerah asal, kodomain adalah daerah kawan.";
        tombolAkhir.innerText = "Lanjut";
        tombolAkhir.style.display = "inline";
        tombolAkhir.onclick = nextContent; // Fungsi untuk melanjutkan ke konten berikutnya
    } else {
        button.classList.add('salah');
        hasilPilihan.textContent = "Jawaban salah. Coba lagi.";
    }
}

function selesai(){
    tombolAkhir.style.display = "none";
    const openModalSelesai = document.getElementById('openModalSelesai');
        const closeModalSelesai = document.getElementById('closeModalSelesai');
        const modalOverlaySelesai = document.getElementById('modalOverlaySelesai');
        
        openModalSelesai.style.display = "inline";
        
        openModalSelesai.addEventListener('click', () => {
            modalOverlaySelesai.style.display = 'flex';
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('addPoin=1');
        });

        closeModalSelesai.addEventListener('click', () => {
            modalOverlaySelesai.style.display = 'none';
        });

        modalOverlaySelesai.addEventListener('click', (e) => {
            if (e.target === modalOverlaySelesai) {
                modalOverlaySelesai.style.display = 'none';
            }
        });
        
}
        
        // Tampilkan materi 1 secara default dan berikan highlight pada tombolnya
        showContent('materi1');