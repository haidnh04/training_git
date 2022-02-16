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

            //Trỏ đến file
            $request = $request->file('myFile1');

            //Kiểm tra đuôi file có phải .jpg không
            if ($request->getClientOriginalExtension('myFile1') == "JPG") {

                //Định nghĩa tên file
                $fileName = $request->getClientOriginalName('myFile1');

                //Di chuyển đến phần cấu hình file để upload
                $request->move(
                    'assets\clients\images', //Thư mục lưu file
                    $fileName, //Tên file
                );
                echo 'Upload file thành công với đuôi jpg';
            } else {
                echo 'Bạn upload file không thanh công vì không phải định dạng đuổi .JPG';
            }
        } else {
            echo 'Upload file không thành công';
        }
    }
}
