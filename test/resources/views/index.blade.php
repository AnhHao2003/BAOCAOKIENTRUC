<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900 leading-tight">
            {{ __('📄 Danh sách bài đăng') }}
        </h2>
    </x-slot>

    <style>
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center;
        }

        .btn-add {
            background: linear-gradient(to right, #38a169, #2f855a);
            color: white;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, background 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-add:hover {
            background: linear-gradient(to right, #2f855a, #276749);
            transform: scale(1.05);
        }

        .btn-back {
            background-color: #4f46e5;
            color: white;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, background 0.3s;
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #4338ca;
            transform: scale(1.05);
        }

        .btn-delete {
            background: linear-gradient(to right, #e53e3e, #c53030);
            color: white;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, background 0.3s;
        }

        .btn-delete:hover {
            background: linear-gradient(to right, #c53030, #9b2c2c);
            transform: scale(1.05);
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #4a5568;
            color: white;
            font-size: 16px;
        }

        td {
            font-size: 14px;
            color: #2d3748;
        }

        tr:hover {
            background-color: #f7fafc;
        }

        .action-btns {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .action-btns a, .action-btns button {
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 8px;
            transition: transform 0.3s, background 0.3s;
        }

        .action-btns a:hover, .action-btns button:hover {
            transform: scale(1.05);
        }
    </style>

<div class="py-12 bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
            <div class="p-8">
                <div class="flex justify-between mb-4">
                    <a href="{{ route('dashboard') }}" class="btn-back">⬅️ Quay lại</a>
                    <a href="{{ route('posts.create') }}" class="btn-add">➕ Thêm Bài Đăng</a>
                </div>

                <!-- Form tìm kiếm -->
                <form method="GET" action="{{ route('posts.index') }}" class="mb-6">
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Tìm kiếm bài đăng..." class="px-4 py-2 border rounded-lg">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Tìm kiếm</button>
                </form>

                <!-- Kiểm tra nếu không có bài đăng nào -->
                @if($posts->isEmpty())
                    <p class="text-red-500">Không tìm thấy bài đăng nào phù hợp với từ khóa tìm kiếm.</p>
                @else
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>📌 Tiêu đề</th>
                                <th>📝 Nội dung</th>
                                <th>📅 Ngày tạo</th>
                                <th>🔄 Ngày cập nhật</th>
                                <th>⚙️ Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ Str::limit($post->body, 100, '...') }}</td>
                                    <td>{{ $post->created_at ? $post->created_at->format('d/m/Y H:i') : 'Chưa có' }}</td>
                                    <td>{{ $post->updated_at ? $post->updated_at->format('d/m/Y H:i') : 'Chưa có' }}</td>
                                    <td class="action-btns">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold px-4 py-2 rounded-lg shadow-md">✏️ Sửa</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('🗑️ Bạn có chắc muốn xóa không?')" class="btn-delete">🗑️ Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Phân trang -->
                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
</x-app-layout>