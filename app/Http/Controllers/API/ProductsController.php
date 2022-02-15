<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //tạo 1 phần check quyền ở đây
    public function __construct()
    {
        
    }


    public function getAllProducts()
    {
        return 'Get All Products';
    }
}
