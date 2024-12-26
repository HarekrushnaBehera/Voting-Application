<?php
session_start();
if (!isset($_SESSION["user_data"])) {
    header('location: ./components/login.html');
}

$userdata = $_SESSION["user_data"];
// print_r($userdata);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Voting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <style>
        .modal-header {
            justify-content: center;
            border-bottom: none;
            padding-bottom: 5px;
        }
        .modal-content {
            width: 80%;
        }
        .modal-header div {
            height: 90px;
            width: 90px;
            border-radius: 50%;
        }
        .modal-header div img {
            height: 90px;
            width: 90px;
            border-radius: 50%;
        }
        .profiles {
            display: flex;
            margin-bottom: 10px;
        }
        .profiles th {
            font-size: 18px;
            /* width: 30%; */
        }
        .profiles td {
            border: none;
            margin-left: 6px;
            width: 71%;
        }
        .voted {
            width: 12%;
            padding: 5px;
            background-color: #50c641bd;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <nav class="mynavbar">
        <div class="logo">
            <a href="#">E-Vote</a>
        </div>
        <ul class="nav_link">
            <li><a href="../index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="home.php">Vote</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="reg">
            <a data-bs-toggle="modal" data-bs-target="#myprofile">Profile</a>
            <a href="./backend/logout.php">Logout</a>
        </div>
        <div class="hamburger" onclick="toggleMenu()">
            <span></span> <span></span> <span></span>
        </div>
    </nav>
    <header class="home-header">
        <h2>Vote for your Candidate Online</h2>
    </header>
    <section class="home-section">
        <div class="parties">
            <?php
            if (!empty($_SESSION['group_data'])) {
                $parties = $_SESSION['group_data'];
                foreach ($parties as $party) { 
                    // print_r($party);
                    ?>
                    <div class="party">
                        <div class="party-info">
                            <p><strong>Group Name : </strong><span><?php echo $party["name"]?></span></p>
                            <p><strong>Total Votes : </strong><span><?php echo $party["votes"]?></span></p>
                            <?php
                            if ($userdata["status"]==0) { ?>
                                <form action="./backend/voted.php" method="post">
                                    <input type="hidden" name="pvotes" value="<?php echo $party["votes"]?>">
                                    <input type="hidden" name="pid" value="<?php echo $party["id"]?>">
                                    <button type="submit" class="notvoted">Vote</button>
                                </form>
                            <?php    
                            } else { ?>
                                <button type="button" class="voted" disabled>Voted</button>
                            <?php    
                            } ?>
                        </div>
                        <div class="party-logo">
                            <img src="./images/<?php echo $party["image"]?>" alt="No Image">
                        </div>
                    </div>
                <?php
                }
            } ?>
        </div>
    </section>
    <div class="modal fade" id="myprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pt-1">
                    <div>
                        <img src="./images/<?php echo $userdata["image"]?>" alt="No Image">
                    </div>
                </div>
                <div class="modal-body py-0">
                <table>
                    <tr class="profiles">
                        <th><?php echo $userdata["role"]=="1"?"Voter":"Party"?> : </th>
                        <td><?php echo $userdata["name"]?></td>
                    </tr>
                    <tr class="profiles">
                        <th>Email : </th>
                        <td><?php echo $userdata["email"]?></td>
                    </tr>
                    <tr class="profiles">
                        <th>Age : </th>
                        <td><?php echo $userdata["age"]?></td>
                    </tr>
                    <tr class="profiles">
                        <th>Phone : </th>
                        <td><?php echo $userdata["mobile"]?></td>
                    </tr>
                    <?php
                    if ($userdata["status"]==0) { ?>
                        <tr class="profiles">
                        <th>Status : </th>
                        <td style="color: red;"><b>Not Voted</b></td>
                    </tr>
                    <?php
                    } else { ?>
                        <tr class="profiles">
                        <th>Status : </th>
                        <td style="color: green;"><b>Voted</b></td>
                    </tr>
                    <?php
                    } ?>
                </table>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>