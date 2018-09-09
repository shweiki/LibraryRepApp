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
                                    <div class="col-md-9">

                                      <div class="ibox ibox-primary">

                                                <div class="ibox-head">

                                                    <div class="ibox-title"> الكتب المباعة</div>

                                                </div>
                                          <div class="ibox-body">
                                            <table class="table table-hover"  id="items_invoice" cellspacing="0" width="100%" >
                                                            <caption>Optional table caption.</caption>
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>اسم الكتاب</th>
                                                                    <th>الكمية</th>
                                                                    <th>السعر بوحدة</th>
                                                                      <th>المجموع</th>
                                                                        <th>#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                            </tbody>
                                                        </table>
                                          </div>
                                      </div>
                                        </div>
                                        <div class="col-md-3">

                                          <div class="ibox ibox-success">

                                                    <div class="ibox-head">

                                                        <div class="ibox-title">فاتورة رقم : </div>
                                                        <div class="ibox-tools">
                                                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                                            <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                                        </div>
                                                    </div>
                                              <div class="ibox-body">
                                                <form class="form-horizontal" id="form-invoice"  novalidate="novalidate">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"> عدد الاصناف </label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="name" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">العدد الكلي</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="author" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                          <label class="col-sm-3 col-form-label">مجموع المبلغ</label>
                                                        <div class="col-sm-9">
                                                          <div class="input-group">
                                                              <div class="input-group-addon bg-white">$</div>
                                                              <input class="form-control" type="text" placeholder="" name="cost_price" readonly>
                                                              <div class="input-group-addon bg-white">.00</div>
                                                              </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">اسم الزبون : </label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="note">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">ملاحظات :  </label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="note">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-12 ml-sm-auto">
                                                            <button class="btn btn-info btn-block" type="submit">ترحيل</button>
                                                        </div>
                                                    </div>

                                                </form>
                                              </div>
                                          </div>
                                            </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                      <div class="ibox ibox-grey">

                                                <div class="ibox-head">

                                                    <div class="ibox-title">الكتب </div>
                                                    <div class="ibox-tools">
                                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                          <div class="ibox-body">
                                              <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                        <th>رقم </th>
                                                      <th>اسم</th>
                                                      <th>المجموعة</th>
                                                      <th>المؤلف</th>
                                                      <th>سعر التكلفة</th>
                                                      <th>سعر البيع</th>
                                                      <th>ملاحظات</th>
                                                      <th>الكمية المتوفرة</th>

                                                          <th>#</th>
                                                      </tr>
                                                  </thead>
                                                  <tfoot>
                                                      <tr>
                                                          <th>رقم </th>
                                                        <th>اسم</th>
                                                        <th>المجموعة</th>
                                                        <th>المؤلف</th>
                                                        <th>سعر التكلفة</th>
                                                        <th>سعر البيع</th>
                                                        <th>ملاحظات</th>
                                                        <th>الكمية المتوفرة</th>

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
                                      <td><?= $row["GroupBook"]; ?></td>
                                      <td><?= $row["author"]; ?></td>
                                            <td><?= number_format($row["cost_price"],3); ?> $</td>
                                              <td><?= number_format($row["sale_price"],3); ?> $</td>
                                              <td><?= $row["note"]; ?></td>
                                                <td class="bg-success color-white widget-stat"><?= $row["total_qty"]; ?></td>


                                        <td>
                                      <button type="button" class="btn btn-success" id="addRow" ><span class="ti-plus"></span></button>
                                        </td>
                                    </tr>
                                    <?php
                                  }

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
  var inventory = [];
  var invoice = [
    {
      "id" : 0,
      "customer" : "",
      "note" : "",
      "total_items" : 0,
      "total_qty" : 0 ,
      "total_ammount" : 0
    }
  ];
  $('#items_invoice').dataTable( {
    "searching": false,
    "paging":   false,
        "ordering": false,
        "info":     false
  } );
    var t = $('#items_invoice').DataTable();
    $(document).ready(function() {

function check_items (id ,data)
{

  var find= false;
  for (var i = 0 ; i <= inventory.length-1 ; i++){
  if (inventory[i].id === id){
    find=true;
inventory[i].quantity++;
invoice[0].total_qty++;
inventory[i].amount = inventory[i].price * inventory[i].quantity ;
invoice[0].total_ammount +=inventory[i].amount;
 t.row(i).data([
        inventory[i].id,
       inventory[i].name,
     inventory[i].quantity,
       inventory[i].price,
       inventory[i].amount,
       '<button type="button" class="btn btn-danger" id="deleteRow" ><span class="ti-close"></span></button>'
 ]);
  }
}
if(!find){
  invoice[0].total_items++;
    inventory.push(data);
  last = inventory.length-1;
  t.row.add( [
      inventory[last].id,
      inventory[last].name,
    inventory[last].quantity,
      inventory[last].price,
      inventory[last].amount,
      '<button type="button" class="btn btn-danger" id="deleteRow" ><span class="ti-close"></span></button>'
  ] ).draw( false );
}

}
$('#example-table tbody').on( 'click', '#addRow', function () {
//  $(this).closest('tr').addClass("color-view bg-info");
    var book_id= $(this).closest('tr').find('td:eq(0)').html();
    book_id = parseInt(book_id);
      var book_name= $(this).closest('tr').find('td:eq(1)').html();
        var sale_price= $(this).closest('tr').find('td:eq(5)').html();
        sale_price = parseInt(sale_price)
        var amount = sale_price* 1;
          data_items = { "id" : book_id, "name":book_name , "price" :sale_price , "quantity":1 ,"amount" :amount };
         //alert(data_items.id);
        check_items( book_id, data_items);

} );
$('#items_invoice tbody').on( 'click', '#deleteRow', function () {
  var index = t.row( $(this).parents('tr')).index();
inventory.splice(index, 1);
t.row( $(this).parents('tr') ).remove().draw();

} );
});
    $(document).ready(function() {

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
 }
        });

});
    </script>
      <script type="text/javascript">
    $(document).ready(function() {
      //  $('#example-table_filter').addClass('input-group-lg');

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
