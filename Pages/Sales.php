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
            <div class="col-11 alert alert-success alert-dismissable fade hidden" style="text-align: center;">
           <button class="close" data-dismiss="alert" aria-label="Close">×</button> <strong>تهانينا !</strong> تم العملية بنجاح
              </div>
              <div class="col-11 alert alert-warning alert-dismissable fade hidden " style="text-align: center;">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>تحذير!</strong> لا يمكنك حذف العنصر لوجود حركات مرتبطة به
              </div>


            <div class="page-heading">
                <h1 class="page-title font-weight-bold">تسجيل مبيعات  </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashborad.php"><i class="la la-home font-20"></i> الرئيسية </a>
                    </li>
                    <li class="breadcrumb-item"> التاريخ :<?=date("Y-m-d ");?></li>
                </ol>
            </div>
            <div class="page-content fade-in-up" id="response">
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                      <div class="ibox">

                                                <div class="ibox-head">

                                                    <div class="ibox-title">حركة رقم : </div>
                                                    <div class="ibox-tools">
                                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                          <div class="ibox-body">
                                              <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                        <th>اسم</th>
                                                        <th>المجموعة</th>
                                                        <th>المؤلف</th>
                                                        <th>سعر التكلفة</th>
                                                        <th>سعر البيع</th>
                                                        <th>ملاحظات</th>
                                                        <th>الكمية المتوفرة</th>
                                                            <th>العدد</th>
                                                              <th>البيان</th>
                                                                      <th>#</th>
                                                      </tr>
                                                  </thead>
                                                  <tfoot>
                                                      <tr>
                                                        <th>اسم</th>
                                                        <th>المجموعة</th>
                                                        <th>المؤلف</th>
                                                        <th>سعر التكلفة</th>
                                                        <th>سعر البيع</th>
                                                        <th>ملاحظات</th>
                                                        <th>الكمية المتوفرة</th>
                                                            <th>العدد</th>
                                                              <th>البيان</th>
                                                                      <th>#</th>
                                                      </tr>
                                                  </tfoot>
                                                  <tbody>

                                                    <?php
                              											$sql = "SELECT B.id ,B.name , B.author ,B.cost_price, B.sale_price ,B.total_qty ,B.note , GB.name as GroupBook
                                                     FROM books B , group_books GB where  Gb.id = B.group_books_id";
                                                     $result = $conn->query($sql);
                                                     if (!$result) {
                                            printf("Errormessage: %s\n", $mysqli->error);
                                         }

                                      while($row = mysqli_fetch_assoc($result)) {
                              			?>
                              			<tr>
                                      <td><?= $row["name"]; ?></td>
                                      <td><?= $row["GroupBook"]; ?></td>
                                      <td><?= $row["author"]; ?></td>
                                            <td><?= $row["cost_price"]; ?></td>
                                            	<td><?= $row["sale_price"]; ?></td>
                                              <td><?= $row["note"]; ?></td>
                                                <td class="bg-success color-white widget-stat"><?= $row["total_qty"]; ?></td>
                                    <td>
                                      <input class="form-control col-3" type="number" id="num_out_book" name="num_out_book" value="1">
                                    </td>
                                      <td>
                                        <input class="form-control col-9" type="text" id="note_out" name="note_out" placeholder="ملاحظات">
                                      </td>
                                        <td>
                                          <button type="button" class="btn btn-success" id="do_out_book" value="<?= $row["id"]; ?>">ترحيل</button>
                                        </td>
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
  <?php require_once('../Parts/script.html'); ?>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
          select: true ,
            pageLength: 20,
            "language": {
   "search": "بحث عن الكتب :",
   "lengthMenu": "عرض  _MENU_ صفوف",
        "zeroRecords": "لا يوجد بيانات ",
        "info": "النتائج _PAGE_ في _PAGES_",
        "infoEmpty": "لا يوجد بيانات لعرضها",
        "infoFiltered": "(تم البحث  _MAX_ من جميع البيانات)"
 },

            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });
    });
    </script>
      <script type="text/javascript">
    $(document).ready(function() {
        $('#example-table_filter').addClass('input-group-lg');
    var table = $('#example-table').DataTable();
    $('#example-table tbody').on( 'click', '#do_out_book', function () {
  $(this).closest('tr').addClass("color-view bg-info");
    var book_id= $(this).val();
  var num_out_book= $(this).closest('td').prev('td').prev('td').find('input').val();
  var note_out= $(this).closest('td').prev('td').find('input').val();
  var total_qty= $(this).closest('td').prev('td').prev('td').prev('td').html();
  new_total_qty =total_qty - num_out_book;
$(this).closest('td').prev('td').prev('td').prev('td').html(new_total_qty);
  /// ajax
  $.ajax({
      type: 'POST',
      url: '../Operations/Outmovemt.php',
     data:  { book_id:book_id, number:num_out_book , new_totalqty:new_total_qty , note:note_out},
  })
  .done(function(data){
//$('#response').append(data);
$('#example-table tr').find('#note_out').val("");
$('#example-table tr').find('#num_out_book').val(1);
$('.alert-success').removeClass( "hidden" ).addClass( "show" );
$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});
  })
  .fail(function() {
      // just in case posting your form failed
      alert( "حصل خطأ ما الرجاء اعادة المحاولة ! ..." );

  });

  // to prevent refreshing the whole page page
  return false;

    } );


} );

    </script>
</body>

</html>
