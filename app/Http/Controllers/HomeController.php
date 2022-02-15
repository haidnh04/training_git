<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\DB;

use DB;

class HomeController extends Controller
{
    //Action getnews
    ///có các phương thức index
    /// Đây chính là các action
    // public function getNews()
    // {
    //     return 'Đọc tin tức ở đây';
    // }
    // public function getCategories($id)
    // {
    //     return 'Lấy ra các chuyên mục: ' . $id;
    // }

    // public function index()
    // {
    //     $title = 'Học lập trình Unicode';
    //     $content1 = 'thêm 1 đọaan nữa';

    //     // ///Cách 1
    //     // $dataView = [
    //     //     'title' => $title,
    //     //     'content1' => $content1,
    //     // ];

    //     // return view('home1', $dataView); //load view home.php

    //     ///Cách 2
    //     return view('home1', compact('title','content1')); //load view home.php
    // }

    public $data = [];
    public function index()
    {
        $users = DB::select('SELECT * FROM users WHERE id>?', [1]);

        //dd($users);

        $this->data['welcome'] = '<b>Cú pháp</b> blade.php dạng thực thể thẻ html';
        $this->data['content'] = '<h3>Chương 1: Nhập môn laravel</h3>
        <br/><p>Kiến thức 1</p>
        <br/><p>Kiến thức 2</p>
        <br/><p>Kiến thức 3</p>';

        $this->data['index'] =
            1;

        $this->data['mang'] = [
            // 'item1',
            // 'item2',
            // 'item3'
        ];

        $this->data['number'] = 110;

        $this->data['messeage'] = 'đặt hàng thành công';

        return view('home1', $this->data);
    }

    public function index1()
    {
        $this->data['title'] = 'Đây là title 1';
        return view('Client.home', $this->data);
    }

    public function products()
    {
        $this->data['title'] = 'Đây là title product';
        return view('Client.products', $this->data);
    }

    public function getAdd()
    {

        $this->data['title'] = 'Đây là title add';
        return view('add', $this->data);
    }

    // public function handleAdd(Request $request)
    // {
    //     //dd($request);
    // }

    public function postAdd(Request $request)
    {
        //dd($request);
        $rules = [
            'product-name' => 'required|min:6',
            'product-price' => 'required|integer'
        ];

        $message = [
            'product-name.required' => 'Bạn cần nhập họ và tên',
            'product-name.min' => 'Bạn cần nhập tên đủ 6 ký tự',
            'product-price.required' => 'Bạn cần nhập giá',
            'product-price.integer' => 'Bạn cần nhập giá là số'
              //avacaaddaw đă
        ];

        $request->validate($rules, $message);
    }
}
