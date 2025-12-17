<?php
require 'config.php';
require 'auth_check.php';
if($_POST){
 $stmt=$pdo->prepare("INSERT INTO tasks(user_id,title,description,due_date) VALUES(?,?,?,?)");
 $stmt->execute([$_SESSION['user_id'],$_POST['title'],$_POST['description'],$_POST['due_date']]);
 header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html><head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<div class="container mt-4">
<h3>Thêm công việc</h3>
<form method="post">
<input class="form-control mb-2" name="title" placeholder="Tiêu đề" required>
<textarea class="form-control mb-2" name="description" placeholder="Mô tả"></textarea>
<input class="form-control mb-2" type="date" name="due_date">
<button class="btn btn-success">Thêm</button>
</form>
</div>
</body></html>