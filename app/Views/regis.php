<!DOCTYPE html>
<html>

<head>
    <title>Form Registrasi</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('http://localhost:8080/assets/img/page-login/login-bgimage.jpg');
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container mt-5 bg-white p-5 text-dark w-30 rounded">
        <h2>Form Registrasi</h2>
        <form method="post" action="<?= base_url('submitRegis') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="name" required>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon:</label>
                <input type="tel" class="form-control" id="telepon" name="phone" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="pict">Pilih Gambar:</label>
                <input type="file" class="form-control-file" id="pict" name="pict" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Tambahkan link JS Bootstrap dan jQuery (untuk beberapa fitur Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>