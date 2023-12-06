
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="../css/loginOut.css">

</head>
<body>
    <div class="container">
        <div class="box">
            <h2>Odhlasit sa?</h2>
            <div>
                <button onclick="logOut()">Odhlasit</button>
            </div>
        </div>
    </div>
</body>

<script>
    function logOut() {
        window.location.href = '../loginOut.dtb.php';
    }
</script>
</html>