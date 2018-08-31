<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user_ID'])){
    header('Location: http://'.$_SERVER["SERVER_NAME"].'/LibraryRepApp/pages/login.php');
        }

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Shadow Library Storage</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../favicon.ico" />
    <!-- PAGE LEVEL STYLES-->
</head>
    <?php
     include "../Operations/connect_libray.php";
    if (isset($_GET['BookIdDeleted'])) {
    $book_id = $_GET["BookIdDeleted"];
    $sql = "DELETE FROM books WHERE id =$book_id ";

    if ($conn->query($sql) === TRUE) {
      $script="$('.alert-success').removeClass( 'hidden' ).addClass( 'show' );";
    }else {
        $script="$('.alert-warning').removeClass( 'hidden' ).addClass( 'show' );";
    }
    }else {
      $script="";
    }


     ?>
<body class="fixed-navbar">

    <div class="page-wrapper">
        <!-- START HEADER-->
<?php require_once('../Parts/header.php'); ?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
<?php require_once('../Parts/sidebar.php'); ?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper" >
              <!-- start alert -->
          <div class="col-9 alert alert-success alert-dismissable fade hidden " style="text-align: center;">
         <button class="close" data-dismiss="alert" aria-label="Close">×</button> <strong>تهانينا !</strong> تم العملية بنجاح
            </div>
            <div class="col-9 alert alert-warning alert-dismissable fade hidden " style="text-align: center;">
              <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>تحذير!</strong> لا يمكنك حذف العنصر لوجود حركات مرتبطة به
            </div>
                    <!-- end alert -->

            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">DataTables</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">DataTables</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">

                                </div>
                                <div class="row">
                                    <div class="col-md-10">

                                      <div class="ibox">

                                                <div class="ibox-head">
                                                  <div class="ibox-tools">
                                                      <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                                      <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                                  </div>
                                                    <div class="ibox-title">استعلامات جميع الكتب </div>

                                                </div>
                                          <div class="ibox-body">
                                              <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                        <th>#</th>
                                                            <th>الكمية</th>
                                                          <th>ملاحظات</th>
                                                          <th>سعر البيع</th>
                                                                  <th>سعر الشراء</th>
                                                                  <th>المجموعة</th>
                                                                      <th>المؤلف</th>
                                                                      <th>اسم</th>
                                                      </tr>
                                                  </thead>
                                                  <tfoot>
                                                      <tr>
                                                        <th>#</th>
                                                            <th>الكمية</th>
                                                          <th>ملاحظات</th>
                                                          <th>سعر البيع</th>
                                                                  <th>سعر الشراء</th>
                                                                  <th>المجموعة</th>
                                                                      <th>المؤلف</th>
                                                                      <th>اسم</th>
                                                      </tr>
                                                  </tfoot>
                                                  <tbody>

                                                    <?php
                              											$sql = "SELECT B.id ,B.name , B.author ,B.cost_price, B.sale_price ,B.total_qty ,B.note , GB.name as nn
                                                     FROM books B , group_books GB where  Gb.id = B.group_books_id";
                                                     $result = $conn->query($sql);
                                                     if (!$result) {
                                            printf("Errormessage: %s\n", $mysqli->error);
                                         }

                                      while($row = mysqli_fetch_assoc($result)) {
                              			?>
                              			<tr>
                                      		<td>
                                            <a href="?BookIdDeleted=<?= $row['id'];?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                            <a href="?BookIdDeleted=<?= $row['id'];?>"><button type="button" class="btn btn-info">تعديل</button></a>
                                          </td>
                                          <td><?= $row["total_qty"]; ?></td>
                                          	<td><?= $row["note"]; ?></td>
                                            	<td><?= $row["sale_price"]; ?></td>
                                              	<td><?= $row["cost_price"]; ?></td>
                              		  <td><?= $row["nn"]; ?></td>
                              				<td><?= $row["author"]; ?></td>
                                    		<td><?= $row["name"]; ?></td>
                                    </tr>
                              			<?php
                                  }
                              $conn->close();
                              ?>


                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                    </div>

                                </div>



            <!-- END PAGE CONTENT-->
<?php require_once('../Parts/footer.php'); ?>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <?php require_once('../Parts/config.php'); ?>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">

<?= $script ?>
        $(function() {
            $('#example-table').DataTable({
                pageLength: 20,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
</body>

</html>
