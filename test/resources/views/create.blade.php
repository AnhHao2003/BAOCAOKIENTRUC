<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight uppercase tracking-wide">
            {{ __('📝 Thêm bài đăng mới') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8 bg-white shadow-lg rounded-xl mt-8 animate-fade-in">
        <h1 class="text-4xl font-extrabold text-indigo-600 mb-6 border-b-4 border-indigo-400 pb-4">
            ✨ Tạo Bài Viết Mới
        </h1>

        <!-- Hiển thị thông báo thành công nếu có -->
        @if(session('success'))
            <div class="alert alert-success mb-6">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- Form Thêm bài đăng -->
        <form action="{{ route('posts.store') }}" method="POST" class="space-y-8">
            @csrf
        
            <!-- Tiêu đề -->
            <div class="mb-6">
                <label for="title" class="label">Tiêu đề:</label>
                <input type="text" name="title" id="title" class="input">
            </div>

            <!-- Nội dung -->
            <div class="mb-6">
                <label for="body" class="label">Nội Dung:</label>
                <textarea name="body" id="body" rows="5" class="input"></textarea>
            </div>

            <!-- Button Save -->
            <div class="flex space-x-4">
                <button type="submit" class="btn-save">Lưu</button>
                <a href="{{ route('posts.index') }}" class="btn-cancel">Hủy</a>
            </div>
        </form>
    </div>

    <style>
        /* Custom CSS */
        .alert {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 0.75rem 1.25rem;
            border-radius: 0.375rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .label {
            font-size: 1.125rem;
            font-weight: 600;
            color: #4b5563;
        }

        .input {
            width: 100%;
            padding: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .input:focus {
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 2px 8px rgba(99, 102, 241, 0.4);
        }

        .btn-save, .btn-cancel {
            padding: 1rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-save {
            background-color: #4f46e5;
            color: #fff;
        }

        .btn-save:hover {
            background-color: #4338ca;
        }

        .btn-cancel {
            background-color: #ef4444;
            color: #fff;
        }

        .btn-cancel:hover {
            background-color: #dc2626;
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-app-layout>
