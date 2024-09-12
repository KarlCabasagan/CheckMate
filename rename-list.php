<?php
include "data-handling/db_conn.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $listId = $_GET["list-id"];

    $stmt = $conn->prepare("SELECT name FROM lists WHERE id = ?");
    $stmt->bind_param("s", $listId);
    $stmt->execute();
    $stmt->bind_result($list_name);
    $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/rename-list.css">
    <link rel="icon" href="images/logo-icon.png">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header-wrapper">
            <div class="header-left-wrapper">
                <div class="close-button-wrapper">
                    <button id="close-button" onclick="window.location.href = './index.php';">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m252-176-74-76 227-228-227-230 74-76 229 230 227-230 74 76-227 230 227 228-74 76-227-230-229 230Z"/></svg>
                    </button>
                </div>
                <div class="create-new-product-wrapper">
                    <span>Rename list</span>
                </div>
            </div>
            <div class="header-right-wrapper">
                <button id="done-button">
                    <span>Done</span>
                </button>
            </div>
        </div>
        <div class="list-name-wrapper">
            <div class="name-input-wrapper">
                <form id="rename-form" action="./data-handling/rename-list.php" method="POST">
                    <input type="hidden" name="list-id" id="list-id" value="<?php echo $listId?>">
                    <input type="text" name="list-name" id="list-name" value="<?php echo $list_name ?>">
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const doneButton = document.getElementById('done-button');

            doneButton.addEventListener('click', (event) => {
                document.getElementById('rename-form').submit();
            });
        });
    </script>
</body>
</html>