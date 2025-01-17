<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quản Lý Người Dùng') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
                <div class="p-8">
                    <h3 class="font-semibold text-xl mb-4">Danh Sách Người Dùng Đã Đăng Bài</h3>

                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Tên Người Dùng</th>
                                <th class="px-4 py-2">Số Bài Đăng</th>
                                <th class="px-4 py-2">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-4 py-2">{{ $user->id }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->posts->count() }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-500">Xem</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
