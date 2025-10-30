<?php 

// Daftar mapping autoloader untuk class ke file
$mapmodeldancontroller = [
    'Koneksi' => __DIR__ . '/config/Koneksi.php',
    'LoginController' => __DIR__ . '/controller/LoginController.php',
    'LoginModel' => __DIR__ . '/model/LoginModel.php',
    'RegisterController' => __DIR__.'/controller/RegisterController.php',
    'RegisterModel' => __DIR__.'/model/RegisterModel.php',
    'GuestController' => __DIR__.'/controller/GuestController.php',
    'GuestModel' => __DIR__.'/model/GuestModel.php',
];

// Autoload class sesuai mapping di atas
spl_autoload_register(static function (string $class) use ($mapmodeldancontroller): void {
    // Jika class ada di mapping, require file-nya
    if (isset($mapmodeldancontroller[$class])) {
        require_once $mapmodeldancontroller[$class];
    }
});

// Ambil parameter halaman dari URL, default 'home'
$halaman = $_GET['page'] ?? 'home';
// Ambil parameter aksi dari URL, default 'index'
$aksi = $_GET['action'] ?? 'index';

// Inisialisasi variabel controller
$controller = null;

// Pilih controller sesuai halaman yang diminta
switch ($halaman) {
    case 'login':
        $controller = new LoginController();
        break;
    case 'register':
        $controller = new RegisterController();
        break;
    case 'guest':
        $controller = new GuestController();
        break;
    default:
        break;
}

// Jika controller tidak ditemukan (halaman home)
if ($controller === null) {
    // Inisialisasi variabel atau model disini jika perlu
    // Contoh: $modelPeminjaman = new PeminjamanModel();
    
    // Logic untuk halaman home disini

    // Tampilkan halaman home
    require __DIR__ . '/view/startpage.php';
    return;
}

// Jika method aksi tidak ada di controller, tampilkan 404
if (!method_exists($controller, $aksi)) {
    http_response_code(404);
    echo '<!DOCTYPE html><html lang="id"><head><meta charset="utf-8"><title>404</title><link rel="stylesheet" href="assets/css/main.css"></head><body><main class="content"><h1>404</h1><p>Halaman tidak ditemukan.</p><p><a class="button" href="index.php?page=home">Kembali ke beranda</a></p></main></body></html>';
    return;
}

// Jalankan method aksi pada controller yang dipilih
$controller->{$aksi}();
?>