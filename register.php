<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<div class="card mx-auto" style="max-width:450px">
<div class="card-body">
<h4 class="text-center mb-3">Đăng ký</h4>
<form method="post">
<input class="form-control mb-2" name="username" placeholder="Username" required>
<input class="form-control mb-2" name="email" placeholder="Email">
<input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
<button class="btn btn-success w-100">Register</button>
</form>
</div></div></div>
</body></html>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
 $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
 $stmt=$pdo->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
 $stmt->execute([$_POST['username'],$_POST['email'],$password]);
 header("Location: login.php");
}
?>