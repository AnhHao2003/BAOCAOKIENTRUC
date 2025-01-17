<!-- resources/views/posts/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight uppercase tracking-wide">
            {{ __('📝 Thêm bài đăng mới') }}
        </h2>
    </x-slot>
    <div class="container">
        <h2>Chỉnh sửa bài đăng</h2>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Display error messages -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Post Form -->
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="body">Nội dung</label>
                <textarea name="body" id="body" class="form-control" rows="4" required>{{ old('body', $post->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật bài đăng</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>

</x-app-layout>

