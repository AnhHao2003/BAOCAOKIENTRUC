<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('📄 Chi Tiết Người Dùng') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-100 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden p-10 border border-gray-200 hover:shadow-3xl transition-shadow duration-500">
                
                <!-- Thông Tin Người Dùng -->
                <div class="mb-10">
                    <h3 class="text-2xl font-bold text-indigo-700 mb-6 border-b-2 pb-3">🧑‍💼 Thông Tin Người Dùng</h3>
                    <div class="grid grid-cols-2 gap-6 text-gray-700">
                        <div class="flex items-center">
                            <span class="font-semibold w-32">🆔 ID:</span> {{ $user->id }}
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold w-32">👤 Tên:</span> {{ $user->name }}
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold w-32">📧 Email:</span> {{ $user->email }}
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold w-32">📝 Bài Đăng:</span> {{ $user->posts->count() }}
                        </div>
                    </div>
                </div>

                <hr class="my-8 border-gray-300">

                <!-- Danh Sách Bài Đăng -->
                <h3 class="text-2xl font-bold text-indigo-700 mb-4">📄 Danh Sách Bài Đăng</h3>

                @if($user->posts->isEmpty())
                    <div class="text-center text-gray-500 italic">🚫 Người dùng này chưa có bài đăng nào.</div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white shadow-md rounded-xl overflow-hidden">
                            <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left">#</th>
                                    <th class="px-6 py-4 text-left">📌 Tiêu Đề</th>
                                    <th class="px-6 py-4 text-left">📅 Ngày Tạo</th>
                                    <th class="px-6 py-4 text-left">🔍 Xem Chi Tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->posts as $post)
                                    <tr class="hover:bg-indigo-50 transition duration-300">
                                        <td class="px-6 py-4 font-medium">{{ $post->id }}</td>
                                        <td class="px-6 py-4">{{ $post->title }}</td>
                                        <td class="px-6 py-4">{{ $post->created_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="text-blue-600 hover:text-indigo-700 font-semibold">
                                                Xem ➡️
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <!-- Nút Quay Lại -->
                <div class="mt-10">
                    <a href="{{ route('users.index') }}"
                       class="inline-flex items-center bg-gradient-to-r from-green-400 to-green-600 text-white px-6 py-3 rounded-full shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                        ⬅️ Quay Lại Danh Sách
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* CSS for Header */
        .font-semibold {
            font-weight: 600;
        }

        /* Container background gradient */
        .bg-gradient-to-br {
            background: linear-gradient(45deg, #eff6ff, #a7c7eb);
        }

        /* Styling for User Info and Posts */
        .grid {
            display: grid;
            gap: 1.5rem;
        }

        /* Hover effect on table rows */
        .hover\:bg-indigo-50:hover {
            background-color: #e8f1f8;
        }

        /* Button hover effect */
        .transform:hover {
            transform: translateY(-4px);
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        /* Styling for table */
        table {
            width: 100%;
            margin-top: 1.5rem;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Table header gradient */
        thead {
            background: linear-gradient(to right, #4c6ef5, #7f93ec);
            color: white;
        }

        /* Button styling */
        .rounded-full {
            border-radius: 9999px;
        }

        .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hover\:shadow-lg:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .bg-gradient-to-r {
            background: linear-gradient(to right, #34d399, #10b981);
        }

        /* Customizing the HR */
        hr {
            border-top: 1px solid #e5e5e5;
        }
    </style>
</x-app-layout>
