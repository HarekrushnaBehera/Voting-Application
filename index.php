<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Here Online</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <style>
        .index-section {
            height: 90vh;
            width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .index-content {
            text-align: center;
            width: 80%;
            margin: auto;
        }
        .logbtn a {
            display: inline-block;
            text-decoration: none;
            background-color: #4CAF50;
            width: 101px;
            padding: 0.75rem;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .logbtn a:hover {
            background-color:rgb(39, 148, 43);
        }
    </style>
</head>
<body>
    <?php
        include("./components/navbar.html");
    ?>
    <section class="index-section">
        <div class="index-content">
            <h1>This is the Entry page.</h1>
            <div class="logbtn">
                <a href="./components/login.html">Login</a>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>