<?php
require 'config.php';
require 'auth_check.php';
$stmt=$pdo->prepare("SELECT * FROM tasks WHERE user_id=? ORDER BY due_date");
$stmt->execute([$_SESSION['user_id']]);
$tasks=$stmt->fetchAll();
?>
<!DOCTYPE html>
<html><head>
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<div class="container mt-4">
<div class="d-flex justify-content-between">
<h3>Danh sách công việc</h3>
<a href="logout.php" class="btn btn-danger btn-sm">Đăng xuất</a>
</div>
<a href="add_task.php" class="btn btn-primary my-3">➕ Thêm</a>
<table class="table table-bordered">
<tr class="table-dark">
<th>Tiêu đề</th><th>Hạn</th><th>Trạng thái</th><th>Hành động</th>
</tr>
<?php foreach($tasks as $t): ?>
<tr>
<td><?=htmlspecialchars($t['title'])?></td>
<td><?=$t['due_date']?></td>
<td><?=$t['status']?></td>
<td>
<a class="btn btn-warning btn-sm" href="edit_task.php?id=<?=$t['id']?>">Sửa</a>
<a class="btn btn-danger btn-sm" href="delete_task.php?id=<?=$t['id']?>" onclick="return confirm('Xóa?')">Xóa</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</div>
</body></html>