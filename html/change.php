<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/change.css">
</head>
<body>
<?php
    session_start();
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
?>

<section>
    <div class="form-box">
        <div class="form-value">
            <form action="../change.dtb.php" method="post">
                <h2>Zmena Udajov</h2>

                <div class="inputBox">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <input type="text" required name="userName" value="<?php echo htmlspecialchars($username); ?>">
                    <label for="">Username</label>
                </div>

                <div class="inputBox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" required value="<?php echo htmlspecialchars($email); ?>">
                    <label for="">Email</label>
                </div>

                <div class="inputBox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>

                <div class="inputBox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="newPassword">
                    <label for="">Nove heslo</label>
                </div>

                <button type="submit" name="submit"> Potvrdit </button>
                <button onclick="exit()"> Zrus </button>
            </form>
        </div>
    </div>
</section>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="../javascript/change.js"></script>

</body>
</html>