<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입</title>
  </head>
  <body>
    <h1>회원가입</h1>
    <form action="register.php" method="post">
      <label for="username">아이디:</label>
      <input type="text" id="username" name="username"><br>

      <label for="password">비밀번호:</label>
      <input type="password" id="password" name="password"><br>

      <label for="password_confirm">비밀번호 확인:</label>
      <input type="password" id="password_confirm" name="password_confirm"><br>

      <label for="email">이메일:</label>
      <input type="email" id="email" name="email"><br>

      <input type="submit" value="회원가입">
    </form>
    <a href="login.php">로그인 화면으로</a>
    <br>

    <?php
// 데이터베이스 연결 설정
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userInfo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// 연결 오류 발생 시 error 표시
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 회원가입 처리 코드
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 변수에 사용자가 입력한 정보를 저장합니다.
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $email = $_POST['email'];

    // 입력값 유효성 검사 등의 코드를 작성합니다.

    // 데이터베이스에 회원 정보를 삽입하는 코드를 작성합니다.
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "회원가입이 완료되었습니다.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // 데이터베이스 연결을 종료합니다.
    mysqli_close($conn);
}
?>

  </body>
</html>
