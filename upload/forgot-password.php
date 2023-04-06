<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>비밀번호 찾기</title>
  </head>
  <body>
    <h1>비밀번호 찾기</h1>
    <form action="forgot-password.php" method="post">
      <label for="username">아이디:</label>
      <input type="text" id="username" name="username"><br>
      <label for="email">이메일:</label>
  <input type="email" id="email" name="email"><br>

  <input type="submit" value="비밀번호 찾기">
</form>
<a href="login.php">로그인 화면으로</a>
<br>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 변수에 사용자가 입력한 정보를 저장합니다.
    $username = $_POST['username'];
    $email = $_POST['email'];

    // 입력값 유효성 검사 등의 코드를 작성합니다.


    // 데이터베이스 연결 설정
$servername = "localhost";
$dbusername = "root";
$password = "";
$dbname = "userInfo";

$conn = mysqli_connect($servername, $dbusername, $password, $dbname);

// 연결 오류 발생 시 error 표시
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    // 데이터베이스에서 회원 정보를 조회하는 코드를 작성합니다.
    $sql = "SELECT * FROM users WHERE username='$username' AND email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      // 사용자 정보를 가져옵니다.
      $user = mysqli_fetch_assoc($result);
      // 비밀번호를 출력합니다.
      echo "당신의 비밀번호는 {$user['password']} 입니다.";
    } else {
      echo "입력한 정보와 일치하는 사용자가 없습니다.";
    }

    // 데이터베이스 연결을 종료합니다.
    mysqli_close($conn);
  }
?>
  </body>
</html>


