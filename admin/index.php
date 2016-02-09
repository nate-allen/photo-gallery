<?php include("includes/header.php"); ?>

<?php
if ( !$session->is_signed_in() ) {
    $session->redirect("login.php");
}
?>

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
                            $users = User::find_all_users();

                            foreach($users as $user) {

                                echo $user->username."<br>";

                            }

                            $single_user = User::find_user_by_id(1);
                            echo $single_user->first_name;
                        ?>
                    </div>
                </div>

            </div>

        </div>

  <?php include("includes/footer.php"); ?>