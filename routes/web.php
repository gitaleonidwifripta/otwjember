<?php

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RiwayatPesananController;
use App\Models\newsletter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('custom-registration', [App\Http\Controllers\Auth\RegisterController::class, 'customRegistration'])->name('register.custom');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'feedback'])->name('feedback');
Route::get('/', [App\Http\Controllers\LandingController::class, 'app'])->name('app');
Route::get('/detail_wisata', [App\Http\Controllers\DetailWisataController::class, 'index'])->name('detail_wisata');

Route::get('/booking', [App\Http\Controllers\BookingController::class, 'booking'])->name('booking');

Route::get('/profile_edit', [App\Http\Controllers\Backend\DetailUserController::class, 'edit'])->name('profile.edit');
Route::post('/profile_update', [App\Http\Controllers\Backend\DetailUserController::class, 'update'])->name('profile.update');

Route::get('/edit_katasandi', [App\Http\Controllers\PassController::class, 'password'])->name('user.password');
Route::POST('/edit_katasandi', [App\Http\Controllers\PassController::class, 'updatePassword'])->name('user.updatePassword');
// Route::get('/detail_wisata', function () {
//     return view('detail_wisata');
// });
Route::get('/riwayat', function () {
    return view('riwayat');
});

Route::get('/editpf', function () {
    return view('edit_profile');
});


Route::get('/form_order', function () {
    return view('form_order');
});

Route::get('/register', function () {
    return view('register');
});


Route::get('/profil', function () {
    return view('profil');
});

Route::get('/list_wisata', function () {
    return view('list_wisata');
});

Route::get('/invoice', function () {
    return view('invoice');
});

Route::get('/invoice2', function () {
    return view('invoice2');
});

Route::get('/invoice3', function () {
    return view('invoice3');
});

Route::get('/invoice2', function () {
    return view('invoice2');
});

Route::get('/invoice3', function () {
    return view('invoice3');
});

Route::get('/login', function () {
    return view('login');
});

//DetailUser
Route::get('/detail_user', [App\Http\Controllers\Backend\DetailUserController::class, 'index'])->name('admin.des');
Route::get('/tambah_destinasi', [App\Http\Controllers\Backend\DestinasiController::class, 'create'])->name('admin.des.create');
Route::POST('/store_destinasi', [App\Http\Controllers\Backend\DestinasiController::class, 'store'])->name('admin.des.store');
Route::get('/edit_destinasi/{id_destinasi}', [App\Http\Controllers\Backend\DestinasiController::class, 'edit'])->name('admin.des.edit');
Route::POST('/update_detail_user/{id_detailuser}', [App\Http\Controllers\Backend\DetailUserController::class, 'update'])->name('user.update');
Route::get('/hapus_destinasi/{id_destinasi}', [App\Http\Controllers\Backend\DestinasiController::class, 'destroy'])->name('admin.des.destroy');

Route::get('/cari_wisata', [App\Http\Controllers\DetailWisataController::class, 'store'])->name('cari_wisata');
Route::POST('/pesan_wisata', [App\Http\Controllers\OrderController::class, 'store'])->name('pesan_wisata');
Route::POST('/update_bayar/{id_transaksi}', [App\Http\Controllers\BayarController::class, 'update'])->name('update_bayar');
Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'show'])->name('show-invoice');
// Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'show'])->name('show-invoice');
// riwayat pesanan
Route::get('riwayat-pesanan',[RiwayatPesananController::class,'index'])->name('riwayat.pesanan');
// google
Route::get('auth/google',[GoogleController::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[GoogleController::class,'handleGoogleCallback'])->name('google.callback');
// facebook
Route::get('auth/facebook',[FacebookController::class,'index'])->name('facebook.index');
Route::get('auth/facebook/callback',[FacebookController::class,'callback'])->name('facebook.callback');
// newsletter
Route::post('newsletter',[NewsletterController::class,'post'])->name('letter.post');
//Route Backend
Auth::routes();

//Managemen Admin
Route::prefix('admin')->middleware('admin')->group(function () {
    // Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/edit_password', [App\Http\Controllers\Backend\AdminController::class, 'password'])->name('admin.password');
    Route::POST('/edit_password', [App\Http\Controllers\Backend\AdminController::class, 'updatePassword'])->name('admin.updatePassword');
    Route::get('/edit_profile', [App\Http\Controllers\Backend\AdminController::class, 'profile'])->name('admin.profile');
    Route::POST('/edit_profile', [App\Http\Controllers\Backend\AdminController::class, 'updateProfile'])->name('admin.updateProfile');

    //Destinasi
    Route::get('/destinasi', [App\Http\Controllers\Backend\DestinasiController::class, 'index'])->name('admin.des');
    Route::get('/tambah_destinasi', [App\Http\Controllers\Backend\DestinasiController::class, 'create'])->name('admin.des.create');
    Route::POST('/store_destinasi', [App\Http\Controllers\Backend\DestinasiController::class, 'store'])->name('admin.des.store');
    Route::get('/edit_destinasi/{id_destinasi}', [App\Http\Controllers\Backend\DestinasiController::class, 'edit'])->name('admin.des.edit');
    Route::POST('/update_destinasi/{id_destinasi}', [App\Http\Controllers\Backend\DestinasiController::class, 'update'])->name('admin.des.update');
    Route::get('/hapus_destinasi/{id_destinasi}', [App\Http\Controllers\Backend\DestinasiController::class, 'destroy'])->name('admin.des.destroy');

    //Gambar
    Route::get('/gambar_des', [App\Http\Controllers\Backend\GambarController::class, 'index'])->name('admin.gambar');
    Route::get('/tambah_gambar_des', [App\Http\Controllers\Backend\GambarController::class, 'create'])->name('admin.gambar.create');
    Route::POST('/store_gambar_des', [App\Http\Controllers\Backend\GambarController::class, 'store'])->name('admin.gambar.store');
    Route::get('/edit_gambar_des/{id_gambar_des}', [App\Http\Controllers\Backend\GambarController::class, 'edit'])->name('admin.gambar.edit');
    Route::POST('/update_gambar_des/{id_gambar_des}', [App\Http\Controllers\Backend\GambarController::class, 'update'])->name('admin.gambar.update');
    Route::get('/hapus_gambar_des/{id_gambar_des}', [App\Http\Controllers\Backend\GambarController::class, 'destroy'])->name('admin.gambar.destroy');

    //Kategori
    Route::get('/kategori', [App\Http\Controllers\Backend\KategoriController::class, 'index'])->name('admin.kate');
    Route::get('/tambah_kategori', [App\Http\Controllers\Backend\KategoriController::class, 'create'])->name('admin.kate.create');
    Route::POST('/store_kategori', [App\Http\Controllers\Backend\KategoriController::class, 'store'])->name('admin.kate.store');
    Route::get('/edit_kategori/{id_kategori}', [App\Http\Controllers\Backend\KategoriController::class, 'edit'])->name('admin.kate.edit');
    Route::POST('/update_kategori/{id_kategori}', [App\Http\Controllers\Backend\KategoriController::class, 'update'])->name('admin.kate.update');
    Route::get('/hapus_kategori/{id_kategori}', [App\Http\Controllers\Backend\KategoriController::class, 'destroy'])->name('admin.kate.destroy');

    //Tiket
    Route::get('/tiket', [App\Http\Controllers\Backend\TiketController::class, 'index'])->name('admin.tiket');
    Route::get('/tambah_tiket', [App\Http\Controllers\Backend\TiketController::class, 'create'])->name('admin.tiket.create');
    Route::POST('/store_tiket', [App\Http\Controllers\Backend\TiketController::class, 'store'])->name('admin.tiket.store');
    Route::get('/edit_tiket/{id_tiket}', [App\Http\Controllers\Backend\TiketController::class, 'edit'])->name('admin.tiket.edit');
    Route::POST('/update_tiket/{id_tiket}', [App\Http\Controllers\Backend\TiketController::class, 'update'])->name('admin.tiket.update');
    Route::get('/hapus_tiket/{id_tiket}', [App\Http\Controllers\Backend\TiketController::class, 'destroy'])->name('admin.tiket.destroy');

    //Pengguna
    Route::get('/pengguna', [App\Http\Controllers\Backend\PenggunaController::class, 'index'])->name('admin.peng');
    Route::get('/tambah_pengguna', [App\Http\Controllers\Backend\PenggunaController::class, 'create'])->name('admin.peng.create');
    Route::POST('/store_pengguna', [App\Http\Controllers\Backend\PenggunaController::class, 'store'])->name('admin.peng.store');

    //Transaksi
    Route::get('/transaksi', [App\Http\Controllers\Backend\DetailtransController::class, 'index'])->name('admin.trans');

    //FAQ
    Route::get('/faq', [App\Http\Controllers\Backend\FaqController::class, 'index'])->name('admin.faq');
    Route::get('/tambah_faq', [App\Http\Controllers\Backend\FaqController::class, 'create'])->name('admin.faq.create');
    Route::POST('/store_faq', [App\Http\Controllers\Backend\FaqController::class, 'store'])->name('admin.faq.store');
    Route::get('/edit_faq/{id_faq}', [App\Http\Controllers\Backend\FaqController::class, 'edit'])->name('admin.faq.edit');
    Route::POST('/update_faq/{id_faq}', [App\Http\Controllers\Backend\FaqController::class, 'update'])->name('admin.faq.update');
    Route::get('/hapus_faq/{id_faq}', [App\Http\Controllers\Backend\FaqController::class, 'destroy'])->name('admin.faq.destroy');

    //Feedback
    Route::get('/feed', [App\Http\Controllers\Backend\FeedController::class, 'index'])->name('admin.feed');
    Route::get('/hapus_feed/{id_feedback}', [App\Http\Controllers\Backend\FeedController::class, 'destroy'])->name('admin.feed.destroy');

    //Newsletter
    Route::get('/news', [App\Http\Controllers\Backend\NewsController::class, 'index'])->name('admin.news');
});

Route::prefix('mitra')->middleware('mitra')->group(function () {
    // Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/landing', [App\Http\Controllers\Mitra\HomeController::class, 'index'])->name('dash.des');
    Route::get('/edit_pass', [App\Http\Controllers\Mitra\MitraController::class, 'password'])->name('mitra.password');
    Route::POST('/edit_pass', [App\Http\Controllers\Mitra\MitraController::class, 'updatePassword'])->name('mitra.updatePassword');

    //Destinasi
    Route::get('/destinasi', [App\Http\Controllers\Mitra\DestinasiController::class, 'index'])->name('mitra.des');
    Route::get('/tambah_destinasi', [App\Http\Controllers\Mitra\DestinasiController::class, 'create'])->name('mitra.des.create');
    Route::POST('/store_destinasi', [App\Http\Controllers\Mitra\DestinasiController::class, 'store'])->name('mitra.des.store');
    Route::get('/edit_destinasi/{id_destinasi}', [App\Http\Controllers\Mitra\DestinasiController::class, 'edit'])->name('mitra.des.edit');
    Route::POST('/update_destinasi/{id_destinasi}', [App\Http\Controllers\Mitra\DestinasiController::class, 'update'])->name('mitra.des.update');
    Route::get('/hapus_destinasi/{id_destinasi}', [App\Http\Controllers\Mitra\DestinasiController::class, 'destroy'])->name('mitra.des.destroy');

    //Gambar
    Route::get('/gambar_des', [App\Http\Controllers\Mitra\GambarController::class, 'index'])->name('mitra.gambar');
    Route::get('/tambah_gambar_des', [App\Http\Controllers\Mitra\GambarController::class, 'create'])->name('mitra.gambar.create');
    Route::POST('/store_gambar_des', [App\Http\Controllers\Mitra\GambarController::class, 'store'])->name('mitra.gambar.store');
    Route::get('/edit_gambar_des/{id_gambar_des}', [App\Http\Controllers\Mitra\GambarController::class, 'edit'])->name('mitra.gambar.edit');
    Route::POST('/update_gambar_des/{id_gambar_des}', [App\Http\Controllers\Mitra\GambarController::class, 'update'])->name('mitra.gambar.update');
    Route::get('/hapus_gambar_des/{id_gambar_des}', [App\Http\Controllers\Mitra\GambarController::class, 'destroy'])->name('mitra.gambar.destroy');

    //Tiket
    Route::get('/tiket', [App\Http\Controllers\Mitra\TiketController::class, 'index'])->name('mitra.tiket');
    Route::get('/tambah_tiket', [App\Http\Controllers\Mitra\TiketController::class, 'create'])->name('mitra.tiket.create');
    Route::POST('/store_tiket', [App\Http\Controllers\Mitra\TiketController::class, 'store'])->name('mitra.tiket.store');
    Route::get('/edit_tiket/{id_tiket}', [App\Http\Controllers\Mitra\TiketController::class, 'edit'])->name('mitra.tiket.edit');
    Route::POST('/update_tiket/{id_tiket}', [App\Http\Controllers\Mitra\TiketController::class, 'update'])->name('mitra.tiket.update');
    Route::get('/hapus_tiket/{id_tiket}', [App\Http\Controllers\Mitra\TiketController::class, 'destroy'])->name('mitra.tiket.destroy');

    //Transaksi
    Route::get('/transaksi', [App\Http\Controllers\Backend\DetailtransController::class, 'index'])->name('mitra.trans');
});

Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
