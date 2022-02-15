<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(Request $request)
    {
        //Nếu là danh sách chuyên mục sẽ thực hiện hành động xin chào
        //Dùng http request Is trong trường hợp lúc 
        //trang chủ thì hiển thị css này còn trường hợp khác thì hiển thị khác
        // if ($request -> is('categories')){
        //     echo 'xin chào';
        // };

    }

    //Hiên thị danh sách chuyên mục (phương thức get)
    public function index(Request $request)
    {

        // $getAllRequest = $request ->all();
        // dd($getAllRequest);
        //lấy resourse/ view sang có tên Client\Categories\list.php

        //Lấy 1 đoạn url
        // $url = $request->url();
        // echo $url.'<br/>';

        //Lấy full url (cả hậu tố id, flug...)
        // $fullUrl = $request->fullUrl();
        // echo $fullUrl.'<br/>';

        //Lấy ra địa chỉ IP
        $ip = $request->ip();
        echo $ip;

        return view('Client\Categories\List');
    }

    //Lấy ra 1 chuyên muc theo id (phương thức get)
    public function getCategory($id)
    {
        return view('Client\Categories\Edit');
    }

    //Sửa 1 chuyên mục (phương thức put/patch)
    public function updateCategory($id)
    {
        return 'Sửa chuyên mục: ' . $id;
    }

    //Show form thêm dữ liệu (Phuong thức get)
    public function addCategory(Request $request)
    {
        //return view('Client\Categories\Add');

        //Phần old đi kèm flash
        //$catename = $request->old('category_name');
        //echo $catename;
        return view('Client\Categories\Add');
    }

    //Thêm 1 dữ liệu vào chuyên mục (Phương thức post)
    public function handleAddcategory(Request $request)
    {

        // $getAllRequest = $request ->all();
        // dd($getAllRequest);


        if ($request->has('category_name')) { //>>
            //>>tìm xem name này có không bên view
            // (ở đây nằm ở resourse >  views> client>categories >add.php)

            $catename = $request->category_name;

            /// Phần flash và old này dùng nhiều trong trường hợp nhập nhầm
            //Nhập 10 trường -> Nhập đến trường thứ 8 thì sai. Khi load lại phải hiển ra 1 lần tránh gõ lại nhiều

            $request->flash(); //set session flash
            return redirect(route('categories.add'));
        } else {
            return 'Không có category name';
        }

        // return 'Submit Thêm chuyên mục';
    }

    //Xóa dữ liệu (Phương thức delete)
    public function deleteCategory($id)
    {
        return 'Xóa chuyên mục: ' . $id;
    }


    //Show form upload file (Phương thức GET)
    public function formFile(Request $request)
    {
        return view('Client\Categories\File');
    }

    //xử lý lấy thông tin file (Phương thức POST)
    public function handleFile(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            dd($file);
        } else {
            return 'Vui lòng chọn file';
        }
    }
}
