<?php

//Phải use 2 thư viện dưới để set và dùng cookie
use Illuminate\Http\Request;
use Illuminate\Http\Response;

namespace App\Http\Controllers;

//use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    //set cookie
    public function setCookie()
    {
        $response = new Response();
        $response->withCookie(
            'cookie1', //=> Họ và tên cookie
            'Laravel HDNH', //=> giá trị
            1 // => Thời gian tồn tại (ở đây là 1 phút)
        );
        echo 'Đã set Cookie';
        return $response;
    }

    //lấy cookie ra
    public function getCookie(Request $request)
    {
        return $request->cookie('cookie1');
    }

    //upload file
    public function postFile(Request $request)
    {
        if ($request->hasFile('myFile1')) {
            $request->file('myFile1')->move(
                'assets\clients\images', //Thư mục lưu file
                'myFile.jpg' //Tên file
            );
            echo 'Upload file thành công';
        } else {
            echo 'Upload file không thành công';
        }
    }
}
