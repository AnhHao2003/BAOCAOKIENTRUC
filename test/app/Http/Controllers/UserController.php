<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Hiển thị danh sách người dùng đã đăng bài
    public function index()
    {
        $users = User::has('posts')->get();  // Lọc người dùng có bài đăng
        return view('user', compact('users'));
    }
    // Hiển thị chi tiết thông tin người dùng
    public function show($id)
    {
        // Tìm người dùng theo ID và lấy các bài đăng liên quan
        $user = User::with('posts')->findOrFail($id);

        // Trả về view hiển thị chi tiết người dùng
        return view('user-show', compact('user'));
    }
}

