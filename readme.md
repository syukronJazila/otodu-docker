# 🧩 Otodu - Aplikasi PHP + Apache + MySQL dengan Docker

Aplikasi **Otodu** berjalan di atas Docker menggunakan kombinasi **PHP, Apache, dan MySQL**.  
Proyek ini menyediakan konfigurasi siap pakai untuk menjalankan aplikasi dengan mudah menggunakan **Docker Compose**.

---

## 🚀 Langkah-langkah Menjalankan Aplikasi

### 1. Clone Repository
Clone repositori ini ke komputer Anda:
```bash
git clone https://github.com/syukronJazila/otodu-docker.git
cd otodu-docker
```

---

### 2. Build dan Jalankan Docker Compose
```bash
docker-compose up -d
```

Docker akan otomatis membangun image dan menjalankan semua container yang diperlukan.

---

### 3. Akses Aplikasi di Browser
Buka di browser:
```
http://localhost:1234
```

---

### 4. Menghentikan Aplikasi
Untuk menghentikan semua container:
```bash
docker-compose down
```

---

## 🐳 Docker Image
Anda juga bisa langsung menarik (pull) image dari Docker Hub:
👉 [https://hub.docker.com/repository/docker/syukronjazila/otodu/](https://hub.docker.com/repository/docker/syukronjazila/otodu/)

---

## 📂 Struktur Direktori
```bash
otodu-docker/
├── docker-compose.yaml   # Konfigurasi Docker
└── init-user.sql         # Inisialisasi database MySQL
```

---

## 📋 Prasyarat
Pastikan Anda telah menginstal:
- Docker ≥ 20.10  
- Docker Compose ≥ 2.0

---

## ✅ Selesai!
Aplikasi **Otodu** kini siap digunakan 🎉
