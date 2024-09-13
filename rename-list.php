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
            <div class="list-name-inner-wrapper">
                <div class="name-input-wrapper">
                    <form id="rename-form" action="./data-handling/rename-list.php" method="POST">
                        <input type="hidden" name="list-id" id="list-id" value="<?php echo $listId?>">
                        <input type="text" name="list-name" id="list-name" value="<?php echo $list_name ?>" required>
                    </form>
                </div>
                <div class="error-message-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#ff3030"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                    <span id="error-message">Please enter a name</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const doneButton = document.getElementById('done-button');

            doneButton.addEventListener('click', (event) => {
                inputData = document.getElementById("list-name").value;

                if(inputData) {
                    document.getElementById('rename-form').submit();                    
                } else {
                    const formWrapper = document.querySelector('.name-input-wrapper');
                    const errorMessage = document.querySelector('.error-message-wrapper');
                    formWrapper.style.border = "solid #ff3030 3px"
                    errorMessage.style.visibility = "visible";
                }
            });
        });
    </script>
</body>
</html>