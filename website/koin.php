<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koin</title>
</head>

<body>
    <div style="background-color: #96AA03; color: white; text-align: center;">
        <a href="" class="btn btn-primary"
            style="background-color: #96AA03;  font-size: 12px; text-align: center; border: 0cm;" tabindex="-1"
            role="button" aria-disabled="true">
            <div style="display: flex;" id="koin">
                <div style="margin-right: 0.4vw;">
                    <img src="./image/coin.png" width="20" height="20">
                </div>
                <div style="text-align: left; font-size: 14px; "><?= $koin[0]['koin'] ?></div>
            </div>
        </a>
    </div>
    <script>
    document.getElementById('koin').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = 'price.php';
    });
    </script>
</body>

</html>