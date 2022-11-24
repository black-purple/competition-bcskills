<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if (!$_SESSION['currentUser']) {
        header("Location:./login.php?login");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <script src="https://kit.fontawesome.com/8579b38148.js" crossorigin="anonymous"></script>
    <title>Dashboard &bull; Healthcare</title>
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="wrapper_all">
        <div class="wrapper">
            <div class="sidebar">
                <div class="profile">
                    <div class="profile_imgname">
                        <div class="profile_img"></div>
                        <p><?php echo $_SESSION['currentUser']['email']?></p>
                    </div>
                    <div class="logout">
                        <form method="post"></form>
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </div>
                </div>
                <div class="menu">
                    <p class="menu_title">Dashboard</p>
                    <div class="menu_elm">
                        <ul>
                            <li class="active"><i class="fa-regular fa-folder"></i>Dossier</li>
                            <li><i class="fa-solid fa-box-archive"></i>Archive</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dashboard_body">
                <div>
                    <!--navigation-->
                    <div class="body_nav">
                        <div class="icons"></div>
                        <div class="title"> <span>Dashbords / </span> Default </div>
                    </div>
                    
                    <!--clients infos-->

                    <div class="info_table">
                        <table>
                            
                            <thead>
                              <tr>
                                <th scope="col">CIN</th>
                                <th scope="col">nom complet</th>
                                <th scope="col">sex</th>
                              </tr>
                              <tr class="border-bottom"></tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>xxxx</td>
                                <td>1976</td>
                                <td>9</td>
                              </tr>
                              <tr>
                                <td>xxxx</td>
                                <td>1976</td>
                                <td>6</td>
                              </tr>
                          
                              <!-- several other great bands -->
                          
                              <tr>
                                <td>xxxx</td>
                                <td>1974</td>
                                <td>17</td>
                              </tr>
                            </tbody>
                            
                          </table>
                          
                    </div>

                </div>
            </div>              
        </div>
    </div>

</body>
</html>