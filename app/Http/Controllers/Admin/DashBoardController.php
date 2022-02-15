<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //kiểm tra check quyền
    public function __construct()
    {
        //Sử dụng session để check login
        
    }

    //danh sách
    public function index(){
        return '<h2>Dashboard</h2>';
    }
}
