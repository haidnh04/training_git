<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use App\Models\Users;

use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->user = new Users;
    }

    public function index()
    {
        // $statement = $this->user->statementUser("DELETE FROM users");
        // dd($statement);

        $title = 'Danh sách người dùng';

        //$this->user->learnQueryBuilder();

        $usersList = $this->user->getAllUser();
        $usersList = Users::paginate(2);

        return view('Client.Users.lists', compact('title', ['usersList']));
    }

    //Phần controller thêm mới 
    public function add()
    {
        $title = 'Thêm người dùng';
        return view('Client.Users.add', compact('title'));
    }

    //Phần controller thêm mới phương thức post
    public function postadd(Request $request)
    {
        //Bắt lỗi không nhập, nhập sai định dạng
        $request->validate([
            //Nhập tên ít nhất 5 ký tự và phải nhập
            'fullname' => 'required|min:5',
            //Nhập email phải có và nhập đúng định dạng
            'email' => 'required|email|unique:users',

        ], [
            //Nội dung hiển thị các lỗi cần bắt
            'fullname.required' => 'Họ và tên bắt buộc phải nhập',
            'fullname.min' => 'Họ vè tên phải từ :min ký tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống',
        ]);


        //Câu lệnh insert db
        $dataInsert = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s'),
        ];
        $this->user->addUser($dataInsert);

        //Sau khi thêm thành công thì chuyển hướng về index và thông báo thêm thành công
        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công');
    }

    //Phần controller cập nhật phương thức get
    public function getEdit(Request $request, $id = 0)
    { //gán tạm id =0
        $title = 'Sửa người dùng';

        //Check xem id người dùng đó có tồn tại không
        if (!empty($id)) {
            $userDetail = $this->user->getDetail($id);
            if (!empty($userDetail[0])) {
                //Gọi session ra đẻ lưu id trên serve tranh bị sửa id
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('users.index')->with('msg', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
        }
        return view('Client.Users.edit', compact('title', 'userDetail'));
    }

    //Phần controller cập nhật phương thức post
    public function postEdit(Request $request)
    {
        //Gọi session ra đẻ lưu id trên serve tranh bị sửa id
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }

        $request->validate([
            //Nhập tên ít nhất 5 ký tự và phải nhập
            'fullname' => 'required|min:5',
            //Nhập email phải có và nhập đúng định dạng
            'email' => 'required|email|unique:users,email,' . $id

        ], [
            //Nội dung hiển thị các lỗi cần bắt
            'fullname.required' => 'Họ và tên bắt buộc phải nhập',
            'fullname.min' => 'Họ vè tên phải từ :min ký tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            //'email.unique' => 'Email đã tồn tại trên hệ thống',
        ]);

        //Câu lệnh update DB
        $dataUpdate = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s'),
        ];
        $this->user->updateUser($dataUpdate, $id);

        //Sau khi update thành công thì chuyển hướng về index và thông báo thêm thành công
        return back()->with('msg', 'Cập nhật người dùng thành công');
    }

    public function delete($id = 0)
    {
        if (!empty($id)) {
            $userDetail = $this->user->getDetail($id);
            if (!empty($userDetail[0])) {
                $deleteStatus = $this->user->deleteUser($id);
                if ($deleteStatus) {
                    $msg = 'Xóa người dùng thành công';
                } else {
                    $msg = 'Bạn không thể xóa người dùng lúc này';
                }
            } else {
                $msg = 'Người dùng không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }

    public function getAccept()
    {
        return view('Client.Users.dangNhap');
    }

    public function postAccept(Request $request)
    {
        // $username = $request['username'];
        // $pass = $request['password'];
        // if (Auth::login('users', ['username' => $username, 'password' => $pass])) {
        //     return view('Client.Users.lists');
        // } else {
        //     return view('Client.Users.dangNhap');
        // }


    }

    public function getSearch()
    {
        // if (!empty($id)) {
        //     $userDetail = $this->user->getDetail($id);
        //     if (!empty($userDetail[0])) {
        //         //Gọi session ra đẻ lưu id trên serve tranh bị sửa id
        //         $request->session()->put('id', $id);
        //         $userDetail = $userDetail[0];
        //     } else {
        //         return redirect()->route('users.index')->with('msg', 'Người dùng không tồn tại');
        //     }
        // } else {
        //     return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
        // }
        // return view('Client.Users.edit', compact('title', 'userDetail'));
    }

    public function postSearch(Request $request)
    {
        // $title1 = 'Danh sách người dùng';

        //$this->user->learnQueryBuilder();
        $tukhoa = $request->tukhoa;
        $usersSearch = $this->user->searchUser($tukhoa);
        $usersSearch = Users::paginate(2);

        return view('Client.Users.timkiem', compact('usersSearch'));
    }
}
