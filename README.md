berikut merupakan tabel relasi dari sistem informasi Tenaga Kerja Berbasis web dengan metode SAW.
1. pertama terdapat tabel role untuk menentukan role dari pengguna web saya.
2. tabel users digunakan untuk login pada web utama / bagian dashboard dan data namun setiap users memiliki role nya masing-masing yang nanti akan dicek pada saat login.
3. tabel pelamar digunakan sekaligus untuk data alternatif.
4. setiap pendaftaran akan membuat data baru pada tabel pendaftaran dengan mengambil id pelamar dan id lowongan. karena setiap pelamar dapat melamar dari lowongan yang berbeda.
5. pada tabel lowongan dapat dibuat per divisi. jadi divisi mana yang sedang membuka lowongan pekerjaan. 
6. untuk tabel bobot_lowongan hanya digunakan untuk penampung dari lowongan beserta kriteria(syarat per lowongan) yang nantinya akan digunakan untuk perhitungan SAW.
7. tabel sub_kriteria digunakan untuk menampung sub kriteria dari kriteria.
8. tabel penilaian alternatif digunakan untuk menampung semua nilai alternatif berdasarkan tiap kriteria.
9. setelah semua perhitungan metode SAW selesai hasil normalisasi dan ranking ditampung pada tabel hasil saw.
