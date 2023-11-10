<?php
define('__ROOT__', dirname(dirname(__FILE__)));
?>


<!DOCTYPE html>
<html lang="en">

<?php
include_once(__ROOT__ . "/Layout/head.php");
?>

<?php include_once(__ROOT__ . "/Layout/Loader.php"); ?>





<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
    include_once(__ROOT__ . "/Layout/navbare.php");
    ?>
        <!-- Main Sidebar Container -->
        <?php
    include_once(__ROOT__ . "/Layout/sidebare.php");
    ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="row p-3">
                    <div class="col-sm-12 col-md-6">
                        <a class="btn btn-primary" href="">Ajouter Compétences</a>
                    </div>
                </div>
            </section>

            <section class="content">
                <!-- Default box -->
                <div >
                        <table class="table table-striped Competences">
                            <thead>
                                <tr>
                                    <th style="width: 3%">Reference</th>
                                    <th class="text-center" style="width: 9%">Code</th>
                                    <th style="width: 20%">Nom</th>
                                    <th style="width: 40%">Description</th>
                                    <th style="width: 25%">Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>


        </div>
        <aside class="control-sidebar control-sidebar-dark">

        </aside>
    </div>
    <?php
include_once(__ROOT__ . '/Layout/footer.php');
?>

    <?php
include_once(__ROOT__ . '/Layout/links.php');

?>


</body>

</html>