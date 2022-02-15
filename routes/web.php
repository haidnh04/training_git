<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Routing\Router;
//Phải gọi home controller trên này
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\UsersController;

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

//lấy từ bên model CategoriesController sang 
// (Client Route)
Route::middleware('auth.admin')->prefix('categories')->group(function () {

    //Danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

    //Lấy ra chi tiết 1 chuyên mục (Áp dụng show form sửa chưa mục)
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    //Phần sửa chi tiết 1 chuyên mục
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);

    //Hiển thị form add dữ liệu
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

    //Thêm dữ liệu vào form add dữ liệu
    Route::post('/add', [CategoriesController::class, 'handleAddcategory']);

    //Xóa 1 chuyên mục
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');

    //Hiển thị form uplaod file
    Route::get('/upload', [CategoriesController::class, 'formFile']);

    //Xử lý file
    Route::post('/upload', [CategoriesController::class, 'handleFile'])->name('categories.upload');
});

//Admin router 
//Thêm middleware cho cả group => lấy tên đã đăng ký bên phần middleware
Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/', [DashBoardController::class, 'index']);
    Route::resource('products', ProductsController::class);
});

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth.admin');
Route::get('/home1', [HomeController::class, 'index1'])->name('home1')->middleware('auth.admin');
Route::get('/san-pham', [HomeController::class, 'products'])->name('products')->middleware('auth.admin');
Route::get('add', [HomeController::class, 'getAdd'])->name('add')->middleware('auth.admin');

// Route::post('add', [HomeController::class, 'handleAdd']);
Route::post('add', [HomeController::class, 'postAdd'])->name('postadHome');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');

    Route::get('add', [UsersController::class, 'add'])->name('add');
    Route::post('add', [UsersController::class, 'postadd'])->name('post-add');

    Route::get('edit/{id}', [UsersController::class, 'getEdit'])->name('getEdit');
    Route::post('update', [UsersController::class, 'postEdit'])->name('postEdit');

    Route::get('delete/{id}', [UsersController::class, 'delete'])->name('delete');
});




// Route::get('/home', function () {
//     return view('home');
//     // return view('Home');
// })->name('home');

// Route::get('/', function () {
//     return view('welcome');
//     // return view('Home');
// });

// //Gọi ra từ model HomeController.php có action getNews
// Route::get('tin-tuc','App\Http\Controllers\HomeController@getNews')->name('new1s');

// //Cách gọi từ model khác khuyến khích dùng => Phải thêm thư viện ở trên cùng
// Route::get('chuyen-muc/{id}', [HomeController::class,'getCategories']);

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/sanpham', function () {
//     return view('product');
// });

// Route::get('/nguoidung', function () {
//     $user = new User();
//     $getuser = $user::all();
//     dd($getuser);
// });

///trong laravel câu lệnh hiên thị là return 'abc' không dùng echo
// Route::get('/test', function () {
//     return 'Đây là nơi hiển thị'; 
// });

// Route::get('post1', function () {
//     return view('post');
// });

// Route::post('/post1', function(){
//      return 'phương thức post';
// });

// Route::put('post1', function(){
//     return 'phương thức put';
// });

// Route::delete('post1', function(){
//     return 'phương thức delete';
// });

///Dùng 2 phương thức vừa get vừa post
// Route::match(['get', 'post'], 'post2', function () {
//      return $_SERVER['REQUEST_METHOD'];
//     //return 'post ở đây';
// });

// Route::get('/', function () {
//     return view('home');
// });

/// Có thể thêm slag và id vào path url website. Để không cần bắt buộc thì thêm ? và null
///VD: {id?} và set  function bằng null
//Validate phần slag và id để lấy chính xác
//Gán cả name vào phần này liên quan cả slug và id
// Route::get('showform/{slug?}-{id?}.html', function ($slug = null, $id = null) {
//     //return view('post');
//     $content = 'id của path website sẽ là: ' . $id . '<br/>';
//     $content .= 'Slag sẽ là: ' . $slug . '<br/>';
//     return $content;
//     //Validate cho slug và id
// })->where(
//     [
//         'slug' => '.+',
//         'id' => '[0-9]+'
//     ]
// )->name('admin.tinTuc');

/// chuyển hướng sang url khác
// route::redirect('/test', 'http://vnexpress.net');


///Thêm tiền tố vào trước path => Sau dễ phân quyền hơn
//Thêm middleware vào 
// Route::prefix('admin')->middleware('checkpermisson')->group(function () {
//     Route::get('showform2', function () {
//         return 'đây là showform 2';
//     });
//     Route::get('showform1', function () {
//         return 'đây là showform 1';
//         //Tên định nghĩa chỉ cần gọi ra bên view. Có thể định nghĩa cả tiền tố cùng path vào như dưới
//     })->name('admin.showform1');

//     ///Lồng prefix trong prefix
//     Route::prefix('product')->group(function () {
//         Route::get('/', function () {
//             return 'tổng số sản phẩm';
//         });
//         Route::get('1', function () {
//             return 'thêm sp';
//         });
//         Route::get('2', function () {
//             return 'thêm sửa sp';
//         });
//         Route::get('3', function () {
//             return 'xóa sp';
//         });
//     });
// });
