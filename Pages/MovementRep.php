<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user_ID'])){
    header('Location: http://'.$_SERVER["SERVER_NAME"].'/LibraryRepApp/pages/login.php');
        }

?>
<html lang="en">

<head>

<?php require_once('../Parts/head.html'); ?>

</head>

    <?php include "../Operations/connect_libray.php"; ?>
<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
<?php require_once('../Parts/header.php'); ?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
<?php require_once('../Parts/sidebar.php'); ?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper" >
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
                                                        <th>اسم المدخل</th>
                                                        <th>الوقت و التاريخ</th>
                                                                <th>ملاحظات</th>
                                                                <th>الكمية</th>
                                                                    <th>نوع الحركة</th>
                                                                    <th>المؤلف</th>
                                                                    <th>الكتاب</th>
                                                      </tr>
                                                  </thead>
                                                  <tfoot>
                                                      <tr>
                                                        <th>اسم المدخل</th>
                                                        <th>الوقت و التاريخ</th>
                                                                <th>ملاحظات</th>
                                                                <th>الكمية</th>
                                                                    <th>نوع الحركة</th>
                                                                    <th>المؤلف</th>
                                                                    <th>الكتاب</th>
                                                      </tr>
                                                  </tfoot>
                                                  <tbody>
                                                    <?php
                              			$sql = "SELECT B.name , B.author , GB.name as Group_name , RM.type_M , RM.qty_move , RM.note , RM.posting_datatime , U.fullname as User_name
                                                     FROM  repository_move RM , books B , group_books GB , users U
                                                      WHERE  B.id = RM.book_id
                                                      AND Gb.id = RM.book_id
                                                        AND U.id = RM.user_id
                                                    ";
                                                    $result = $conn->query($sql);
                                                    if (!$result) {
                                           printf("Errormessage: %s\n", $mysqli->error);
                                        }

                                                          while($row = mysqli_fetch_assoc($result)) {
                                                         $type = ($row["type_M"] == 1 ? "ادخال" : "اخراج ");
                                                            $typeColor = ($row["type_M"] == 1 ? "color-view bg-primary":"color-view bg-silver");
                              			?>
                              			<tr>
                                          <td><?= $row["User_name"]; ?></td>
                                          	<td><?= $row["posting_datatime"]; ?></td>
                                            	<td><?= $row["note"]; ?></td>
                                              	<td class="color-view bg-teal"><?= $row["qty_move"]; ?></td>

                              		  <td class="<?= $typeColor ?>"><?= $type ?></td>
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

  <?php require_once('../Parts/script.html'); ?>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
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
