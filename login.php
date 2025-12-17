<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<div class="card mx-auto" style="max-width:400px">
<div class="card-body">
<h4 class="text-center mb-3">Đăng nhập</h4>
<form method="post">
<input class="form-control mb-2" name="username" placeholder="Username" required>
<input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
<button class="btn btn-primary w-100">Login</button>
</form>
<a href="register.php" class="d-block text-center mt-3">Đăng ký</a>
</div></div></div>
</body></html>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
 $stmt=$pdo->prepare("SELECT * FROM users WHERE username=?");
 $stmt->execute([$_POST['username']]);
 $user=$stmt->fetch();
 if($user && password_verify($_POST['password'],$user['password'])){
  $_SESSION['user_id']=$user['id'];
  header("Location: dashboard.php");
 }else{
  echo "<script>alert('Sai thông tin');</script>";
 }
}
?>