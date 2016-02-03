<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php") ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <?php
                            $all_users = User::find_all_users();

                            foreach ($all_users as $user) {
                                echo $user['username'] . "<br>";
                            }

                            $found_user = User::find_user_by_id('2');

                            echo "Found " . $found_user['username'];

                            $user = new User();

                            $user->id = $found_user['id'];
                            $user->username = $found_user['username'];
                            $user->password = $found_user['password'];
                            $user->first_name = $found_user['first_name'];
                            $user->last_name = $found_user['last_name'];

                            echo $user->id;
                        ?>
                    </div>
                </div>

            </div>

        </div>

  <?php include("includes/footer.php"); ?>