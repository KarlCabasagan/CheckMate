<?php
include "data-handling/db_conn.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
}

$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM lists WHERE user_id = '$userId'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <script type="module" src="./js/App.js"></script>
    <link rel="icon" href="images/logo-icon.png">
    <title>CheckMate</title>
</head>
<body>
    <div class="container">
        <div class="header-wrapper">
            <div class="header-top-wrapper">
                <div class="username-wrapper">
                    <span><?php echo $_SESSION['user_name']; ?></span>
                </div>
                <form action="./data-handling/logout.php">
                    <button class="logout-button">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#5f6368"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                    </button>
                </form>
                <div class="logo-wrapper">
                    <img id="logo" src="images/logo-icon.png" alt="logo.png">
                </div>
            </div>
            <!-- <span>Lists</span> -->
            <div class="header-bot-wrapper">
                <div class="lists-wrapper">
                    <?php 
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<button id="list-' . $row['id']. '" value="' . $row['id'] . '" data-list-name="' . $row['name'] . '">' . $row['name']. '</button>';
                            }
                        }
                    ?>
                    <!-- <button id="id1">My List</button> -->
                    <!-- <button id="2">My Other List</button>
                    <button id="3">My List</button>
                    <button id="4">My List</button>
                    <button id="5">My List</button>        
                    <button id="6">My List</button>
                    <button id="7">My List</button>
                    <button id="8">My List</button>
                    <button id="9">My List</button>
                    <button id="10">My List</button> -->
                    <form action="new-list.php">
                        <button id="add-new-list">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M453-454H220v-54h233v-233h54v233h233v54H507v233h-54v-233Z"/></svg>
                            <span>New List</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div id="list-control-modal" class="modal">
            <div class="modal-content">
                <div class="modal-option-wrapper">
                    <a id="rename-list" href="rename-list.php"><span>Rename list</span></a>
                    <a id="delete-list" href="delete-list.php"><span>Delete list</span></a>
                </div>
            </div>
        </div>
        

        <div class="add-item-wrapper">
            <form action="add-product.php" method="GET">
                <input type="hidden" name="list-id" id="list-id" value="">
                <button id="add-item-button">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M427-428H168v-106h259v-259h106v259h259v106H533v259H427v-259Z"/></svg>
                </button>
            </form>
        </div>

        <div class="main-list-container">
            <div class="search-bar-wrapper">
                <form action="">
                    <input type="text" id="search-bar-input" placeholder="Search">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M787-138 535-390q-30 25-73.5 38.5T379-338q-102.23 0-173.12-70.84-70.88-70.83-70.88-173Q135-684 205.84-755q70.83-71 173-71Q481-826 552-755.12q71 70.89 71 173.12 0 42-13.5 83T572-429l253 253-38 38ZM379-392q81 0 135.5-54.5T569-582q0-81-54.5-135.5T379-772q-81 0-135.5 54.5T189-582q0 81 54.5 135.5T379-392Z"/></svg>
                    </button>
                </form>
            </div>

            <div class="group-wrapper">
                <div class="main-list-content">
                    <div class="menu-list-inner-content">
                        <div class="main-list-content-header-wrapper">
                            <div class="main-list-content-header">
                                <span id="list-name">My List</span>
                                <button id="modal-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z"/></svg>
                                </button>
                            </div>
                        </div>
                        <div class="main-list-wrapper" id="main-list-wrapper">
                            <?php
                            $sql = "SELECT * FROM products WHERE is_purchased = 0";
                            $result = $conn->query($sql);
                            
                            if($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="menu-list-'. $row['list_id'] .'" id="product-'. $row['id'] .'" data-product-id="'. $row['id'] .'">';
                                    echo    '<div>';
                                    echo        '<input type="checkbox" class="product-checkbox" id="checkbox-'. $row['id'] .'" data-product-id="'. $row['id'] .'">';
                                    echo        '<a id="link" href="edit-product.php?id='. $row['id'] .'">'. $row['name'] .'</a>';
                                    echo    '</div>';
                                    echo    '<div class="delete-product-button-wrapper">';
                                    echo        '<span class="delete-button" id="delete-button-'. $row['id'] .'" data-product-id="'. $row['id'] .'">';
                                    echo            '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="red"><path d="M292.31-140q-29.92 0-51.12-21.19Q220-182.39 220-212.31V-720h-40v-60h180v-35.38h240V-780h180v60h-40v507.69Q740-182 719-161q-21 21-51.31 21H292.31ZM680-720H280v507.69q0 5.39 3.46 8.85t8.85 3.46h375.38q4.62 0 8.46-3.85 3.85-3.84 3.85-8.46V-720ZM376.16-280h59.99v-360h-59.99v360Zm147.69 0h59.99v-360h-59.99v360ZM280-720v520-520Z"/></svg>';
                                    echo        '</span>';
                                    echo    '</div>';
                                    echo '</div>';
                                }
                            }
                            ?>
                            <!-- <div class="menu-list">
                                <input type="checkbox">
                                <span>Sample List Item</span>
                            </div>
                            <div class="menu-list">
                                <input type="checkbox">
                                <span>Sample List Item</span>
                            </div>
                            <div class="menu-list">
                                <input type="checkbox">
                                <span>Sample List Item</span>
                            </div>
                            <div class="menu-list">
                                <input type="checkbox">
                                <span>Sample List Item</span>
                            </div>
                            <div class="menu-list">
                                <input type="checkbox">
                                <span>Sample List Item</span>
                            </div>
                            <div class="menu-list">
                                <input type="checkbox">
                                <span>Sample List Item</span>
                            </div>
                            <div class="menu-list">
                                <input type="checkbox">
                                <span>Sample List Item</span>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="completed-item-wrapper">
                    <div class="completed-item-header-wrapper">
                        <div class="completed-item-header">
                            <div class="completed-item-header-left">
                                <span>Purchased</span>
                            </div>
                            <div class="completed-item-header-right">
                                <button class="completed-item-drop-button" id="completed-item-drop-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-360 280-560h400L480-360Z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="completed-item-inner-wrapper" id="completed-item-inner-wrapper">
                        <?php
                        $sql = "SELECT * FROM products WHERE is_purchased = 1";
                        $result = $conn->query($sql);
                        
                        if($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="menu-list-'. $row['list_id'] .'" id="product-'. $row['id'] .'" data-product-id="'. $row['id'] .'">';
                                echo    '<div>';
                                echo        '<input type="checkbox" class="product-checkbox" id="checkbox-'. $row['id'] .'" data-product-id="'. $row['id'] .'" checked>';
                                echo        '<a id="link" href="edit-product.php?id='. $row['id'] .'">'. $row['name'] .'</a>';
                                echo    '</div>';
                                echo    '<div class="delete-product-button-wrapper">';
                                echo        '<span class="delete-button" id="delete-button-'. $row['id'] .'" data-product-id="'. $row['id'] .'">';
                                echo            '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="red"><path d="M292.31-140q-29.92 0-51.12-21.19Q220-182.39 220-212.31V-720h-40v-60h180v-35.38h240V-780h180v60h-40v507.69Q740-182 719-161q-21 21-51.31 21H292.31ZM680-720H280v507.69q0 5.39 3.46 8.85t8.85 3.46h375.38q4.62 0 8.46-3.85 3.85-3.84 3.85-8.46V-720ZM376.16-280h59.99v-360h-59.99v360Zm147.69 0h59.99v-360h-59.99v360ZM280-720v520-520Z"/></svg>';
                                echo        '</span>';
                                echo    '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                        <div class="menu-list">
                            <div>
                                <input type="checkbox" checked>
                                <a href="">Completeted Item Sample</a>
                            </div>
                            <div>
                                <span id="delete-product">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="red"><path d="M292.31-140q-29.92 0-51.12-21.19Q220-182.39 220-212.31V-720h-40v-60h180v-35.38h240V-780h180v60h-40v507.69Q740-182 719-161q-21 21-51.31 21H292.31ZM680-720H280v507.69q0 5.39 3.46 8.85t8.85 3.46h375.38q4.62 0 8.46-3.85 3.85-3.84 3.85-8.46V-720ZM376.16-280h59.99v-360h-59.99v360Zm147.69 0h59.99v-360h-59.99v360ZM280-720v520-520Z"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // function checkSession() {
        //     const xhr = new XMLHttpRequest();
        //     xhr.open("GET", "test.php");
        //     xhr.onload = function() {
        //         if (xhr.status === 200) {
        //             const response = xhr.responseText;
        //             if (response === "You are logged in.") {
        //                 // User is logged in, do something
        //             } else {
        //                 window.location.href = "login.php";
        //             }
        //         } else {
        //             console.error("Error checking session:", xhr.status);
        //         }
        //     };
        //     xhr.send();
        // }

        // checkSession();
    </script>
</body>
</html>