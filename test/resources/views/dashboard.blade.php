<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quản lý Bài Đăng') }}
        </h2>
    </x-slot>

    <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: space-between;">
        <!-- Sidebar -->
        <div class="sidebar" style="width: 250px; background-color: #2c3e50; color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="text-align: center; margin-bottom: 40px; font-size: 1.5rem; color: white;">Quản Lý Bài Đăng</h2>
            
            <a href="{{ route('posts.index') }}" class="sidebar-link">
                <i class="fas fa-list"></i> Danh Sách Bài Đăng
            </a>
            <a href="/posts/create" class="sidebar-link">
                <i class="fas fa-plus"></i> Thêm Mới Bài Đăng
            </a>
            <a href="{{ route('users.index') }}" class="sidebar-link">
                <i class="fas fa-users"></i> Quản Lý Người Dùng
            </a>
            
            <a href="#" class="sidebar-link">
                <i class="fas fa-cog"></i> Cài Đặt
            </a>
        </div>

        <!-- Main Content -->
        <div class="main-content" style="flex-grow: 1; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
            <!-- Banner động -->
            <!-- Banner động phù hợp -->
            <!-- Banner động phù hợp -->
                <div class="moving-banner">
                    <img src="https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExczU1eTdmbTd1cmU2eDA2bjExYmVpNW42c3ZkZXZraXBxNjBoMXhvcSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/ZVtRt9okcKpIh5yCGW/giphy.gif" alt="Typing Animation" style="width: 100%; border-radius: 8px;">
                </div>



            <h2 style="margin-top: 20px;">✨ Chào mừng bạn đến với Trang Quản Lý Bài Đăng!</h2>
        </div>
    </div>

    <!-- CSS -->
    <style>
        /* Sidebar Link Hover Effect */
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 6px;
            background-color: #34495e;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .sidebar-link:hover {
            background-color: #1abc9c;
            transform: scale(1.05);
        }

        /* Banner di chuyển */
        .moving-banner {
            width: 100%;
            height: 250px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: slideBanner 15s infinite linear;
        }

        @keyframes slideBanner {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(-20%);
            }
            100% {
                transform: translateX(0);
            }
        }
    </style>

    <!-- JavaScript Hiệu Ứng -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.sidebar-link');

            sidebarLinks.forEach(link => {
                link.addEventListener('mouseover', function() {
                    link.style.boxShadow = '0 4px 10px rgba(26, 188, 156, 0.8)';
                });

                link.addEventListener('mouseout', function() {
                    link.style.boxShadow = 'none';
                });
            });
        });
    </script>
</x-app-layout>
