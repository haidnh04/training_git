<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    //cách gõ sql thuần
    // public function getAllUser()
    // {
    //     //câu lệnh select trong db dùng trong model
    //     $users = DB::select('SELECT * FROM users ORDER BY create_at DESC');
    //     return $users;
    // }

    public function getAllUser()
    {

        //DB::enableQueryLog();
        $users = DB::table('users')
            ->select('*')
            ->orderBy('create_at', 'desc')
            //->paginate(1)
            ->get();

        return $users;
    }

    public function searchUser($tukhoa)
    {

        //DB::enableQueryLog();
        $usersSearch = DB::table('users')
            ->select('*')
            ->where('fullname', 'like', '%' . $tukhoa . '%')
            ->orwhere('email', 'like', '%?%')
            ->get();

        return $usersSearch;
    }



    public function addUser($data)
    {
        //câu lệnh insert trong db dùng trong model
        DB::insert('INSERT INTO users (fullname, email, create_at) VALUES (?, ?, ?)', $data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET fullname=?, email=?, update_at=? WHERE id = ?', $data);
    }

    public function deleteUser($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . '  WHERE id = ?', [$id]);
    }

    public function statementUser($sql)
    {
        return DB::statement($sql);
    }

    public function learnQueryBuilder()
    {
        DB::enableQueryLog();
        //Lấy tất cả bản ghi của table
        //     $list = DB::table($this->table)
        //         ->select('email', 'fullname', 'id', 'create_at', 'update_at')

        // ->where('id', '=', 5)

        //Điều kiện lớn hơn
        //->where('id', '>', 5)

        //Điều kiện nhỏ hơn
        //->where('id', '<=', 7)

        //Điều kiện khác
        //->where('id', '!=', 5)     

        //câu lệnh where and
        //->where('id', '>', 5)
        //->where('id', '<=', 7)

        //Câu lệnh where or
        // ->where('id', '=', 5)
        // ->orwhere('id', '=', 8)

        //câu lệnh where gom nhóm
        // ->where('id', '=', 5)
        // ->where(function ($query) {
        //     $query->where('id', '<', 20);
        //     $query->orwhere('id', '>', 20);
        // })

        //Câu lệnh where dùng cho tìm kiếm
        //->where('fullname', 'like', '%Hoàng Hải%')

        //Câu lệnh where trong khoảng
        //->whereBetween('id', [5, 7])

        //Câu lệnh where nằm ngoài khoảng
        //->whereNotBetween('id', [5, 7])

        //Câu lệnh where in chỉ lấy 2 id chuyền vào
        //->whereIn('id', [5, 7])

        //Câu lệnh where Not in lấy ngoài 2 cái chuyền vào
        //->whereNotIn('id', [5, 7])

        //Câu lệnh where null: lấy ra nhưng trường dữ liệu có cột đó null
        //->whereNull('update_at')

        //Câu lệnh where null: lấy ra nhưng trường dữ liệu có cột đó không null
        //->whereNotNull('update_at')

        //===============================================================================    
        ///Phần truy vấn where date
        // ->whereDate('create_at', '2022-02-14')


        //Phần truy vấn where day
        //->whereDay('create_at', '14')

        //Phần truy vấn where month
        // ->whereMonth('create_at', '02')

        //Phần truy vấn where year
        //-> whereYear('create_at', '2022')

        //===============================================================================  
        //Phần truy vấn where so sánh giá trị 2 cột trong db (bằng nhau thì hiện ra)
        //->whereColumn('create_at', 'update_at')

        //Phần truy vấn where so sánh giá trị 2 cột trong db (cột 1 lớn hơn cột 2)
        //->whereColumn('create_at', '>', 'update_at')

        //Phần truy vấn where so sánh giá trị 2 cột trong db (cột 1 nhỏ hơn cột 2)
        //->whereColumn('create_at', '<', 'update_at')

        // Phần truy vấn where so sánh giá trị 2 cột trong db (cột 1 khác cột 2)
        //->whereColumn('create_at', '<>', 'update_at')

        //Phần truy vấn where só sánh giá trị 2 cột và and so sánh của 2 cột nữa
        // ->whereColumn([
        //     ['Fullname', '=', 'email'],
        //     ['create_at', '<>', 'update_at']
        // ])
        // ->get();

        //=====================================================================
        //join bảng (inner join) => rightJoin (leftJoin) cũng tương tự
        // $list = DB::table('users') //Table là bảng thứ 1
        // ->join('groups', 'users.group_id', '=', 'groups.id') //join đến bảng thứ 2
        // ->select('users.*', 'groups.name')
        // ->orderBy('email', 'desc')
        // ->orderBy('fullname', 'asc')
        // ->select(DB::raw('count(id) as email_count'), 'email', 'fullname')
        // ->groupBy('email')
        // ->having('email_count', '>=', 1)

        //offset là index chạy từ 0, và limit là giới hạn chạy từ bao nhiêu từ offset
        // ->offset(1)
        // ->limit(1)
        // ->get();
        // dd($list);


        //=====================================================================
        //Phần insert dùng QB
        // $status = DB::table('users')->insert([
        //     'fullname' => 'Nguyễn Văn Hoàng',
        //     'email' => 'nva@gmail.com',
        //     'group_id' => 1,
        //     'create_at' => date('Y-m-d H:i:s')

        // ]);
        //dd($status);

        //=====================================================================
        //Phần iupdate dùng QB
        // $status = DB::table('users')
        //     ->where('id', 6)
        //     ->update([
        //         'fullname' => 'Lê Thúy An',
        //         'email' => 'lta@gmail.com',
        //         'update_at' => date('Y-m-d H:i:s')
        //     ]);
        // dd($status);

        //=====================================================================
        //Phần delete dùng QB
        // $status = DB::table('users')
        //     ->where('id', 8)
        //     ->delete();
        // dd($status);

        //=====================================================================
        //Đếm số bản ghi
        // $ok = DB::table('users')->select('*')->count();
        // dd($ok);

        //=====================================================================
        //DB raw query
        // $sql = DB::table('users')
        //     ->select(
        //         DB::raw('count(id) as email_count')
        //     )
        //     ->groupBy('email')
        //     ->get();

        //=====================================================================
        //Select raw query
        // $sql = DB::table('users')
        // -> 
        // dd($sql);

        // $sql = DB::getQueryLog();
        // dd($sql);


        //lấy 1 bản ghi đầu tiên của table
        $detail = DB::table($this->table)->first();
        dd($detail);
    }
}
