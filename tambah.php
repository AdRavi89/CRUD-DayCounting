<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add - Day Counting</title>
  <!-- Tambahkan pautan CSS Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen"></head>
<body>

  <div class="container mt-5">
    <h1 class="mb-4">Add - Day Counting</h1>

    <!-- Formulir input -->
    <form action="process.php" method="post">
      <div class="mb-3">
        <label for="jenisWaktu" class="form-label">Pilih Jenis Waktu:</label>
        <select class="form-select" id="jenisWaktu" name="jenisWaktu" onchange="toggleInputType()" required>
          <option value="estimasi">Estimasi Waktu (Jumlah Hari)</option>
          <option value="datePicker">Estimasi Waktu (Menggunakan Date)</option>
        </select>
      </div>

      <div id="inputContainer">
        <label for="targetDate" class="form-label">Masukkan Tanggal Target:</label>
        <input class="form-control input-field" type="date" id="targetDate" name="targetDate">
      </div>

      <div id="jumlahHariContainer" style="display:none;">
        <label for="jumlahHari" class="form-label">Masukkan Jumlah Hari:</label>
        <input class="form-control input-field" type="number" id="jumlahHari" name="jumlahHari" placeholder="Masukkan jumlah hari">
      </div>

      <div class="mb-3">
        <label for="note" class="form-label">Note (Deskripsi Waktu):</label>
        <textarea class="form-control" id="note" name="note" rows="3" placeholder="Masukkan deskripsi waktu" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Hitung dan Simpan</button>
    </form>
  </div>

  <!-- Tambahkan pautan JavaScript Bootstrap dan jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ezvqgJgKAlWMBDoYSjx7d1thF2Vpgz63wHNwiI9XDAzmY6P4P+gU7PiIjlFzN+5g" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-oaZRJinxzLlHA9i+Tz47vUZbq2Jb6AuB/jFUxZ4xHAxIEnh7U2U1cdKs5Z5srRwM" crossorigin="anonymous"></script>

  <script>
    function toggleInputType() {
      var jenisWaktu = document.getElementById('jenisWaktu').value;
      var inputContainer = document.getElementById('inputContainer');
      var jumlahHariContainer = document.getElementById('jumlahHariContainer');

      if (jenisWaktu === 'datePicker') {
        inputContainer.style.display = 'block';
        jumlahHariContainer.style.display = 'none';
      } else if (jenisWaktu === 'estimasi') {
        inputContainer.style.display = 'none';
        jumlahHariContainer.style.display = 'block';
      }
    }
  </script>
</body>
</html>
