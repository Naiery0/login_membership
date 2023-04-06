<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>로그인</title>
  </head>
  <body>
    <h1>로그인</h1>
    <form action="login.php" method="post">
      <label for="username">아이디:</label>
      <input type="text" id="username" name="username"><br>

      <label for="password">비밀번호:</label>
      <input type="password" id="password" name="password"><br>

      <input type="submit" value="로그인">
      <br>
      <a href="register.php">회원가입</a>
      <br>
      <a href="forgot-password.php">비밀번호 찾기</a>
    </form>

    <?php
      // 데이터베이스 연결 설정을 직접 작성합니다.
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "userinfo";
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      // 연결 확인
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // POST 요청이 왔을 때만 실행합니다.
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 입력된 아이디와 비밀번호를 가져옵니다.
        $username = $_POST['username'];
        $password = $_POST['password'];

        // 입력된 아이디와 비밀번호를 바탕으로 데이터베이스에서 사용자 정보를 조회합니다.
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
          // 로그인에 성공했을 때의 처리를 여기에 작성합니다.
          echo "로그인에 성공했습니다.";
        } else {
          // 로그인에 실패했을 때의 처리를 여기에 작성합니다.
          echo "로그인에 실패했습니다.";
        }

        // 데이터베이스 연결을 종료합니다.
        mysqli_close($conn);
      }
    ?>
  </body>
</html>
