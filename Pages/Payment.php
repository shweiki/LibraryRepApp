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
                <h1 class="page-title font-weight-bold">تسجيل مشتريات</h1>
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
                                                    <div class="ibox-title">تسجيل مشتريات </div>
                                                  <div class="ibox-tools">
                                                      <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                                      <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                                  </div>


                                                </div>
                                          <div class="ibox-body">
                                              <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                        <th>رقم</th>
                                                        <th>اسم</th>
                                                        <th>المؤلف</th>
                                                        <th>المجموعة</th>
                                                        <th>ملاحظات</th>
                                                        <th>سعر الشراء</th>
                                                        <th>سعر البيع</th>
                                                            <th>الكمية</th>
                                                                      <th>#</th>
                                                                      <th>#</th>
                                                                      <th>#</th>
                                                      </tr>
                                                  </thead>
                                                  <tfoot>
                                                      <tr>
                                                          <th>رقم</th>
                                                        <th>اسم</th>
                                                        <th>المؤلف</th>
                                                        <th>المجموعة</th>
                                                        <th>ملاحظات</th>
                                                        <th>سعر الشراء</th>
                                                        <th>سعر البيع</th>
                                                            <th>الكمية</th>
                                                                      <th>#</th>
                                                                      <th>#</th>
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
                                      <td><?= $row["id"]; ?></td>
                                      <td><?= $row["name"]; ?></td>
                                      <td><?= $row["author"]; ?></td>
                                      <td><?= $row["GroupBook"]; ?></td>
                                      <td><?= $row["note"]; ?></td>
                                      <td class="color-view bg-teal"> <?= number_format($row["cost_price"],3); ?> $</td>
                                            <td class="color-view bg-teal"> <?= number_format($row["sale_price"],3); ?> $</td>
                                              <td class="color-view bg-teal"> <?= $row["total_qty"]; ?></td>
                                    <td>
                                      <input class="form-control col-9" type="number" id="num_in_book"  value="1">
                                    </td>
                                      <td>
                                        <input class="form-control col-9" type="text" id="note_in"  placeholder="ملاحظات">
                                      </td>
                                        <td>
                                          <button type="button" class="btn btn-info" id="do_in_book" >ترحيل</button>
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

  <?php require_once('../Parts/script.html'); ?>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
          initComplete: function () {
this.api().columns().every( function () {
var column = this;
var select = $('<select ><option value=""></option></select>')
.appendTo( $(column.header()) )
.on( 'change', function () {
    var val = $.fn.dataTable.util.escapeRegex(
        $(this).val()
    );

    column
        .search( val ? '^'+val+'$' : '', true, false )
        .draw();
} );

column.data().unique().sort().each( function ( d, j ) {
select.append( '<option value="'+d+'">'+d+'</option>' )
} );
} );
},
          select: true ,
            pageLength: 10,
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
    $(document).ready(function() {
      var table = $('#example-table').DataTable();
      $('#example-table tbody').on( 'click', '#do_in_book', function () {
      var book_id= $(this).closest('tr').find('td:eq(0)').html();
          var book_name= $(this).closest('tr').find('td:eq(1)').html();
        var note_in= $(this).closest('tr').find('#note_in').val();
    var num_in_book=$(this).closest('tr').find('#num_in_book').val();
    var total_qty=  $(this).closest('tr').find('td:eq(7)').html()
  new_total_qty = parseInt(total_qty) + parseInt(num_in_book);
$(this).closest('tr').find('td:eq(7)').html(new_total_qty);
  /// ajax
  $.ajax({
      type: 'POST',
      url: '../Operations/Inmovemt.php',
     data:  { book_id:book_id, number:num_in_book , new_totalqty:new_total_qty , note:note_in},
  })
  .done(function(data){
//$('#response').append(data);
$('#example-table tr').find('#note_in').val("");
$('#example-table tr').find('#num_in_book').val(1);
$('.alert-success').removeClass( "hidden" ).addClass( "show" );
$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});
//$("#form-addgroup")[0].reset();

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
    <script type="text/javascript">

    </script>
</body>

</html>
