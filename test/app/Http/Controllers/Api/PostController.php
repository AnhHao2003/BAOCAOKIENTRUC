<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Corrected this line
use App\Models\Post; // Thêm dòng này để nhập model Post
use Carbon\Carbon;

class PostController extends Controller
{


    // Hiển thị form tạo bài đăng
    public function create()
    {
        return view('create');
    }
    public function index(Request $request)
    {
        // Lấy tất cả dữ liệu từ bảng posts
        $posts = Post::paginate(4); 
         // Lấy thời gian hiện tại tại Việt Nam
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh');

        $search = $request->get('search');

    // Lấy tất cả bài đăng, nếu có từ khóa tìm kiếm thì lọc theo tiêu đề hoặc nội dung
    $posts = Post::when($search, function ($query, $search) {
        return $query->where('title', 'like', "%$search%")
                     ->orWhere('body', 'like', "%$search%");
    })->paginate(4);  // Phân trang với 10 bài mỗi trang
    
        // Trả về dữ liệu dưới dạng JSON
        return view('index', compact('posts', 'currentTime', 'search'));
    }

    // Hiển thị form sửa bài đăng
    public function edit($id)
    {
        // Tìm bài đăng theo ID
        $post = Post::findOrFail($id);

        // Trả về form chỉnh sửa bài đăng
        return view('edit', compact('post'));
    }

    
    
    public function show($id)
    {
        // Find post by id
        $post = Post::find($id);
        
        // Return the found post
        return response()->json($post);
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);

    // If validation fails, return an error response
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Create a new post with the validated data
    $post = Post::create([
        'title' => $request->title,
        'body' => $request->body,
        'user_id' => Auth()->id(),// Gán người dùng hiện tại
        'created_at' => now(), // Gán thời gian hiện tại
        'updated_at' => now(), // Gán thời gian hiện tại 
    ]);

   // Chuyển hướng về trang danh sách bài đăng
   return redirect()->route('posts.index')->with('success', 'Bài đăng đã được tạo!');
}

 // Cập nhật bài đăng
 public function update(Request $request, $id)
 {
     // Validate incoming request data
     $validator = Validator::make($request->all(), [
         'title' => 'sometimes|string|max:255',
         'body' => 'sometimes|string',
     ]);

     // Nếu validation không hợp lệ, trả về lỗi
     if ($validator->fails()) {
         return response()->json($validator->errors(), 422);
     }

    // Find the post by id
    $post = Post::find($id);

    // If the post doesn't exist, return a 404 error
    if (!$post) {
        return response()->json(['error' => 'Post not found'], 404);
    }

    // Update the post with validated data
    $post->update([
        'title' => $request->title,
        'body' => $request->body,
        'updated_at' => now(), // Gán thời gian hiện tại
    ]);

    // Redirect to the list of posts with a success message
    return redirect()->route('posts.index')->with('success', 'Cập nhật bài đăng thành công!');
}

public function destroy($id)
{
    // Find the post by id
    $post = Post::find($id);

    // If the post doesn't exist, return a 404 error
    if (!$post) {
        return response()->json(['error' => 'Post not found'], 404);
    }

    // Delete the post
    $post->delete();

     // Chuyển hướng về trang danh sách bài đăng với thông báo thành công
     return redirect()->route('dashboard')->with('success', 'Bài đăng đã được xóa thành công!');
}

}
