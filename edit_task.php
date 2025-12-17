<?php
require 'config.php';
require 'auth_check.php';
$id=$_GET['id'];
if($_POST){
 $stmt=$pdo->prepare("UPDATE tasks SET title=?,description=?,due_date=?,status=? WHERE id=? AND user_id=?");
 $stmt->execute([$_POST['title'],$_POST['description'],$_POST['due_date'],$_POST['status'],$id,$_SESSION['user_id']]);
 header("Location: dashboard.php");
}
$stmt=$pdo->prepare("SELECT * FROM tasks WHERE id=? AND user_id=?");
$stmt->execute([$id,$_SESSION['user_id']]);
$t=$stmt->fetch();
?>
<!DOCTYPE html>
<html><head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<div class="container mt-4">
<form method="post">
<input class="form-control mb-2" name="title" value="<?=$t['title']?>">
<textarea class="form-control mb-2" name="description"><?=$t['description']?></textarea>
<input class="form-control mb-2" type="date" name="due_date" value="<?=$t['due_date']?>">
<select class="form-select mb-2" name="status">
<option value="pending" <?=$t['status']=='pending'?'selected':''?>>Pending</option>
<option value="in_progress" <?=$t['status']=='in_progress'?'selected':''?>>In Progress</option>
<option value="completed" <?=$t['status']=='completed'?'selected':''?>>Completed</option>
</select>
<button class="btn btn-primary">Lưu</button>
</form>
</div>
</body></html>