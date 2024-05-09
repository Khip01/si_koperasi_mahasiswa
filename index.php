<?php
require 'core/functions.php';

// Mengecek koneksi, jika terdapat error langsung di arahkan ke page error_page.php;
$getResult = checkConnection();
if ($getResult != null) {
    // Raruu: Mending bikin dialog dari pada ganti page - saran
    // header("Location: pages/error_page.php?errorLog=$getResult");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/index.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1, shrink-to-fit=no" />
    <!-- Font Lexend -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <title>Home Page Kak</title>
</head>

<header class="nav-header">
    <nav>
        <a href="index.php">
            <div id="TitleKel8">
                <h1>Kelompok 8</h1>
            </div>
        </a>
        <div id="repo-nya">
            <a href="https://github.com/Khip01/si_koperasi_mahasiswa">
                <h3>Repo Nya~</h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33s1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2" />
                </svg>
            </a>
        </div>
    </nav>
</header>

<body>
    <div class="body-content">
        <div class="home-cover">
            <div id="go-far-ehe"></div>
            <div class="invisible-waifu"></div>
            <div class="invisible-waifu"></div>
            <h2>Kelompok 8</h2>
            <h1>KOPERASI ORGANISASI</h1>
            <div class="invisible-waifu"></div>
            <div class="invisible-waifu"></div>
        </div>
        <div class="that-two-card">
            <div class="card-list-anggota">
                <svg class="svg-decoration" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M8.75 5.25a2.25 2.25 0 1 1-4.5 0a2.25 2.25 0 0 1 4.5 0M4 8a1 1 0 0 0-1 1v4.5a3.5 3.5 0 1 0 7 0V9a1 1 0 0 0-1-1zm5.75-2.75c0 .65-.19 1.255-.52 1.763c.413.048.787.22 1.084.48q.091.006.186.007a2.25 2.25 0 1 0-1.312-4.078c.354.521.562 1.15.562 1.828M9.5 16.855A4.5 4.5 0 0 0 11 13.5V9c0-.364-.098-.706-.268-1H13a1 1 0 0 1 1 1v4.5a3.5 3.5 0 0 1-4.5 3.355M13.75 5.25c0 .65-.19 1.255-.52 1.763c.413.048.787.22 1.084.48q.091.006.186.007a2.25 2.25 0 1 0-1.312-4.078c.354.521.562 1.15.562 1.828m-.25 11.605A4.5 4.5 0 0 0 15 13.5V9c0-.364-.098-.706-.268-1H17a1 1 0 0 1 1 1v4.5a3.5 3.5 0 0 1-4.5 3.355" />
                </svg>
                <div class="list-anggota">
                    <h1>Anggota</h1>
                    <nav>
                        <a>2. Akhmad Aakhif Athallah</a>
                        <a>11. Ghoffar Abdul Ja'far</a>
                        <a>12. Hidayat Widi Saputra</a>
                        <a>25. Satrio Ahmad Ramadhani</a>
                    </nav>
                </div>
            </div>

            <div class="card-crud-launcher">
                <svg id="card-crud-launcher-decoration" class="svg-decoration" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024">
                    <path d="M832 64H192c-17.7 0-32 14.3-32 32v224h704V96c0-17.7-14.3-32-32-32M288 232c-22.1 0-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40s-17.9 40-40 40M160 928c0 17.7 14.3 32 32 32h640c17.7 0 32-14.3 32-32V704H160zm128-136c22.1 0 40 17.9 40 40s-17.9 40-40 40s-40-17.9-40-40s17.9-40 40-40M160 640h704V384H160zm128-168c22.1 0 40 17.9 40 40s-17.9 40-40 40s-40-17.9-40-40s17.9-40 40-40" />
                </svg>
                <div class="crud-launcher-text">
                    <h1>WEB</h1>
                    <h2>CRUD</h2>
                    <h3>KOPERASI ORGANISASI</h3>
                </div>
                <div class="pov-args">
                    <h1>POV</h1>
                    <form id="pov-radio">
                        <input type="radio" id="petugas" name="pov" value="petugas" checked="checked">
                        <label for="petugas">Petugas</label><br>
                        <input type="radio" id="pembeli" name="pov" value="pembeli">
                        <label for="pembeli">Pembeli</label><br>
                        <input type="radio" id="supplier" name="pov" value="supplier">
                        <label for="supplier">Supplier</label>
                    </form>
                </div>
                <div class="btn-field">
                    <a id="btn-do-crud" onclick="redirectToPOV()">
                        <h1>DO CRUD</h1>
                    </a>
                    <a id="btn-advance-launch"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="m20.35 8.923l-.366-.204a2 2 0 0 1-.784-.724c-.017-.027-.033-.056-.065-.112a2.002 2.002 0 0 1-.3-1.157l.006-.425c.012-.68.018-1.022-.078-1.328a1.998 1.998 0 0 0-.417-.736c-.214-.24-.511-.412-1.106-.754l-.494-.285c-.592-.341-.889-.512-1.204-.577a1.999 1.999 0 0 0-.843.007c-.313.07-.606.246-1.191.596l-.003.002l-.354.211c-.056.034-.085.05-.113.066c-.278.155-.588.24-.907.25c-.032.002-.065.002-.13.002l-.13-.001a1.997 1.997 0 0 1-.91-.252c-.028-.015-.055-.032-.111-.066l-.357-.214c-.589-.354-.884-.53-1.199-.601a1.998 1.998 0 0 0-.846-.006c-.316.066-.612.238-1.205.582l-.003.001l-.488.283l-.005.004c-.588.34-.883.512-1.095.751a2 2 0 0 0-.415.734c-.095.307-.09.649-.078 1.333l.007.424c0 .065.003.097.002.128a2.002 2.002 0 0 1-.301 1.027c-.033.056-.048.084-.065.11a2 2 0 0 1-.675.664l-.112.063l-.361.2c-.602.333-.903.5-1.121.738a2 2 0 0 0-.43.73c-.1.307-.1.65-.099 1.338l.002.563c.001.683.003 1.024.104 1.329a2 2 0 0 0 .427.726c.218.236.516.402 1.113.734l.358.199c.061.034.092.05.121.068a2 2 0 0 1 .74.781l.067.12a2 2 0 0 1 .23 1.038l-.007.407c-.012.686-.017 1.03.079 1.337c.085.272.227.523.417.736c.214.24.512.411 1.106.754l.494.285c.593.341.889.512 1.204.577a2 2 0 0 0 .843-.007c.314-.07.607-.246 1.194-.598l.354-.212a1.997 1.997 0 0 1 1.02-.317h.26c.318.01.63.097.91.252l.092.055l.376.226c.59.354.884.53 1.199.6a2 2 0 0 0 .846.008c.315-.066.613-.239 1.206-.583l.495-.287c.588-.342.883-.513 1.095-.752c.19-.213.33-.463.415-.734c.095-.305.09-.644.078-1.318l-.008-.44a2 2 0 0 1 .3-1.155l.065-.11a2 2 0 0 1 .675-.664l.11-.061l.002-.001l.361-.2c.602-.334.903-.5 1.122-.738c.194-.21.34-.46.429-.73c.1-.305.1-.647.098-1.327l-.002-.574c-.001-.683-.002-1.025-.103-1.33a2.002 2.002 0 0 0-.428-.725c-.217-.236-.515-.402-1.111-.733z" />
                                <path d="M8 12a4 4 0 1 0 8 0a4 4 0 0 0-8 0" />
                            </g>
                        </svg></a>
                </div>
                <div class="connection-status-wrapper">
                    <div class="connection-status-field">
                        <h1>Connection: </h1>
                        <h1 id="connection-status-what">OWO</h1>
                    </div>
                    <div class="connection-status-field" onclick="checkConnection()">
                        <div id="connection-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88m16-40a8 8 0 0 1-8 8a16 16 0 0 1-16-16v-40a8 8 0 0 1 0-16a16 16 0 0 1 16 16v40a8 8 0 0 1 8 8m-32-92a12 12 0 1 1 12 12a12 12 0 0 1-12-12" />
                            </svg>
                        </div>
                        <div id="connection-rfs" onclick="checkConnection()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path d="M17.65 6.35a7.95 7.95 0 0 0-6.48-2.31c-3.67.37-6.69 3.35-7.1 7.02C3.52 15.91 7.27 20 12 20a7.98 7.98 0 0 0 7.21-4.56c.32-.67-.16-1.44-.9-1.44c-.37 0-.72.2-.88.53a5.994 5.994 0 0 1-6.8 3.31c-2.22-.49-4.01-2.3-4.48-4.52A6.002 6.002 0 0 1 12 6c1.66 0 3.14.69 4.22 1.78l-1.51 1.51c-.63.63-.19 1.71.7 1.71H19c.55 0 1-.45 1-1V6.41c0-.89-1.08-1.34-1.71-.71z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function redirectToPOV() {
        const povRadio = document.getElementById('pov-radio').elements['pov'];
        for (var i = 0; i < povRadio.length; i++) {
            if (povRadio[i].checked) {
                window.open(`pages/${povRadio[i].value}.php`, "_self")
                break;
            }
        }
    }

    function checkConnection() {
        var connectionStatus = "<?= $getResult ?>";
        const statusTextElement = document.getElementById('connection-status-what');
        if (connectionStatus != '') {
            statusTextElement.textContent = 'YABAI';
            statusTextElement.style.color = 'red';
        } else {
            statusTextElement.textContent = 'OK!';
            statusTextElement.style.color = 'green';
        }
    }

    checkConnection();
</script>

</html>