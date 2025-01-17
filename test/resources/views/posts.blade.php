<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CÁC BÀI ĐĂNG</title>
    <link rel="stylesheet" href="../resources/css/app.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
}

.container {
    max-width: 700px;
    margin: 40px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #444;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #007bff;
    color: #ffffff;
    font-weight: bold;
}

td {
    background-color: #f9f9f9;
}

button {
    padding: 8px 16px;
    margin: 2px;
    border: none;
    border-radius: 4px;
    color: #ffffff;
    background-color: #007bff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

.form-group input[type="text"]:focus,
.form-group textarea:focus {
    border-color: #007bff;
    outline: none;
}

#post-form h3 {
    margin-top: 0;
    color: #007bff;
}

button.cancel-button {
    background-color: #dc3545;
}

button.cancel-button:hover {
    background-color: #b02a37;
}

table tbody tr:hover {
    background-color: #f1f1f1;
}

    </style>
</head>
<body>
<div class="container">
    <h2>Quản lý bài đăng</h2>

    <!-- Form to Add or Update Post -->
    <div id="post-form">
        <h3 id="form-title">Thêm mới Post </h3>
        <input type="hidden" id="post-id">
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" id="title">
        </div>
        <div class="form-group">
            <label for="body">Nội Dung:</label>
            <textarea id="body" rows="3"></textarea>
        </div>
        <button onclick="addOrUpdatePost()">Save</button>
        <button onclick="resetForm()">Cancel</button>
    </div>

    <!-- Table to Display Posts -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Nội Dung</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody id="post-list"></tbody>
    </table>
</div>


<script>
// Thêm bài đăng
function fetchPosts() {
    fetch('/api/posts')
        .then(response => response.json())
        .then(data => {
            const postList = document.getElementById('post-list');
            postList.innerHTML = '';
            data.forEach(post => {
                postList.innerHTML += `
                    <tr>
                        <td>${post.id}</td>
                        <td>${post.title}</td>
                        <td>${post.body}</td>
                        <td>
                            <button onclick="editPost(${post.id})">Edit</button>
                            <button onclick="deletePost(${post.id})">Delete</button>
                        </td>
                    </tr>
                `;
            });
        })
        .catch(error => console.error('Error fetching posts:', error));
}

// Add or Update a post
function addOrUpdatePost() {
    const id = document.getElementById('post-id').value;
    const title = document.getElementById('title').value;
    const body = document.getElementById('body').value;
    const url = id ? `/api/posts/${id}` : '/api/posts';
    const method = id ? 'PATCH' : 'POST';

    fetch(url, {
        method: method,
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ title, body })
    })
    .then(response => response.json())
    .then(data => {
        resetForm();
        fetchPosts();
    })
    .catch(error => console.error('Error saving post:', error));
}

// Xóa bài đăng
function deletePost(id) {
    if (confirm('Are you sure you want to delete this post?')) {
        fetch(`/api/posts/${id}`, { method: 'DELETE' })
            .then(() => fetchPosts())
            .catch(error => console.error('Error deleting post:', error));
    }
}

// Sửa bài đăng
function editPost(id) {
    fetch(`/api/posts/${id}`)
        .then(response => response.json())
        .then(post => {
            document.getElementById('post-id').value = post.id;
            document.getElementById('title').value = post.title;
            document.getElementById('body').value = post.body;
            document.getElementById('form-title').innerText = 'Edit Post';
        })
        .catch(error => console.error('Error fetching post:', error));
}

// Reset form to initial state
function resetForm() {
    document.getElementById('post-id').value = '';
    document.getElementById('title').value = '';
    document.getElementById('body').value = '';
    document.getElementById('form-title').innerText = 'Add New Post';
}

// Initial fetch of posts
fetchPosts();
</script>

</body>
</html>
