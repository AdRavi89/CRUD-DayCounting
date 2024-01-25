function hitungTanggal() {
    // Ambil nilai dari input
    var tanggalAwalInput = document.getElementById('tanggalAwal').value;
    var jumlahHariInput = parseInt(document.getElementById('jumlahHari').value);

    // Buat objek Date dari input
    var tanggalAwal = new Date(tanggalAwalInput);

    // Tambah jumlah hari
    tanggalAwal.setDate(tanggalAwal.getDate() + jumlahHariInput);

    // Hari dalam format teks
    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'][tanggalAwal.getDay()];

    // Bulan dalam format teks
    var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'][tanggalAwal.getMonth()];

    // Format tanggal
    var tanggalHasil = tanggalAwal.getDate() + ' ' + bulan + ' ' + tanggalAwal.getFullYear();

    // Tampilkan hasil
    document.getElementById('hasil').innerHTML = '<p>Hasil Perhitungan ' + jumlahHariInput + ' hari dari tanggal ' + tanggalAwalInput + ' adalah:</p><p>' + hari + ', ' + tanggalHasil + '</p>';
}
