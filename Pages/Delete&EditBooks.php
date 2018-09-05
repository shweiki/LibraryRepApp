
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
                     <h1 class="page-title font-weight-bold">حذف وتعديل بيانات الكتب و اقسام</h1>
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
                                                   <div class="ibox-title">تعديل و حذف بيانات الكتب</div>
                                                 <div class="ibox-tools">
                                                     <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                                 </div>
                                               </div>


                                          <div class="ibox-body">
                                              <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                        <th>اسم</th>
                                                        <th>المؤلف</th>
                                                        <th>المجموعة</th>
                                                        <th>رقم الطبع</th>
                                                                  <th>سعر الشراء</th>
                                                                  <th>سعر البيع</th>
                                                                      <th>ملاحظات</th>
                                                                      <th>#</th>
                                                      </tr>
                                                  </thead>
                                                  <tfoot>
                                                      <tr>
                                                        <th>اسم</th>
                                                        <th>المؤلف</th>
                                                        <th>المجموعة</th>
                                                        <th>رقم الطبع</th>
                                                                  <th>سعر الشراء</th>
                                                                  <th>سعر البيع</th>
                                                                      <th>ملاحظات</th>
                                                                      <th>#</th>
                                                      </tr>
                                                  </tfoot>
                                                  <tbody>

                                                    <?php
                              											$sql = "SELECT B.id ,B.name , B.author ,B.number_stamp ,B.cost_price, B.sale_price ,B.total_qty ,B.note , GB.name as nn
                                                     FROM books B , group_books GB where  Gb.id = B.group_books_id";
                                                     $result = $conn->query($sql);
                                                     if (!$result) {
                                            printf("Errormessage: %s\n", $mysqli->error);
                                         }

                                      while($row = mysqli_fetch_assoc($result)) {
                              			?>
                              			<tr>
                                      <td><?= $row["name"]; ?></td>
                                      <td><?= $row["author"]; ?></td>
                                      <td><?= $row["nn"]; ?></td>
                                      <td><?= $row["number_stamp"]; ?></td>
                                      <td><?= number_format($row["cost_price"],3); ?> $</td>
                                            	<td><?= number_format($row["sale_price"],3); ?> $</td>
                                                <td><?= $row["note"]; ?></td>
                                      <td>
                    <button type="button" id="editbutton" class="btn btn-default btn-xs m-r-5" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $row['id']; ?>"><i class="fa fa-pencil font-14"></i></button>
                                        <a href="?BookIdDeleted=<?= $row['id'];?>">
                                          <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                        </a>
                                      </td>
                                    </tr>
                              			<?php
                                  }
                            //  $conn->close();
                              ?>


                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                    </div>

                                </div>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: -webkit-right;">
                            <div class="modal-dialog" role="document"style="    direction: rtl;">
                            		    <div class="modal-content">
                            		      <div class="modal-header">

                            						  <h5 class="modal-title" id="exampleModalLabel">تعديل كتاب رقم : </h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                            		      </div>
                            		      <div class="modal-body">
                                        <form class="form-horizontal" id="form-updatabooks"  novalidate="novalidate">
                                          <div class="form-group row">
                                              <label class="col-sm-2 col-form-label">القسم او المجموعة</label>
                                              <div class="col-sm-10">
                                              <select class="form-control " name="group_books" id="group_books">
                                                  <optgroup label="الكتب">
                                                    <?php
                                                    $sql = "SELECT * FROM group_books";
                                              $result = $conn->query($sql);

                                              if ($result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) {
                                              ?>
                                              <option value=<?= $row["id"]; ?>>
                                              <?= $row["name"]; ?>
                                              </option>
                                              <?php
                                              }

                                              } else {
                                              echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
                                              }
                                              ?>

                                                  </optgroup>

                                              </select>
                                            </div>
                                          </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"> الاسم الكتاب : </label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text " id="name" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">المؤلف : </label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="author" name="author">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                  <label class="col-sm-2 col-form-label">الاسعار :  </label>
                                                <div class="col-sm-5">
                                                  <div class="input-group">
                                                      <div class="input-group-addon bg-white">$</div>
                                                      <input class="form-control" type="text" placeholder="سعر الشراء" id="cost_price" name="cost_price">
                                                      <div class="input-group-addon bg-white">.00</div>
                                                      </div>

                                                </div>

                                                <div class="col-sm-5">
                                                  <div class="input-group">
                                      <div class="input-group-addon bg-white">$</div>
                                      <input class="form-control" type="text" placeholder="سعر البيع" id="sale_price" name="sale_price">
                                      <div class="input-group-addon bg-white">.00</div>
                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">رقم الطبع :  </label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="number_stamp" name="number_stamp">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">ملاحظات :  </label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="note" name="note">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 ml-sm-auto">
                                                    <button class="btn btn-primary btn-block" type="submit">تعديل</button>
                                                </div>
                                            </div>

                                        </form>
                            					</div>
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
<?= $script ?>

    $('#example-table').DataTable({
      pageLength: 10,
      "language": {
"search": "بحث عن الكتب :",
"lengthMenu": "عرض  _MENU_ صفوف",
  "zeroRecords": "لا يوجد بيانات ",
  "info": "النتائج _PAGE_ في _PAGES_",
  "infoEmpty": "لا يوجد بيانات لعرضها",
  "infoFiltered": "(تم البحث  _MAX_ من جميع البيانات)"
}

    });

var table = $('#example-table').DataTable();

$('#example-table tbody').on( 'click', '#editbutton', function () {
  var button = $(this); // Button that triggered the modal
  var id_book = button.data('whatever') ;
$("#exampleModalLabel").html("تعديل كتب رقم : "+id_book);
var book_name = $(this).closest('tr').find('td:eq(0)').html();
var author = $(this).closest('tr').find('td:eq(1)').html();
var group_books = $(this).closest('tr').find('td:eq(2)').html();
var number_stamp = $(this).closest('tr').find('td:eq(3)').html();
var cost_price = $(this).closest('tr').find('td:eq(4)').html();
var sale_price = $(this).closest('tr').find('td:eq(5)').html();
var note = $(this).closest('tr').find('td:eq(6)').html();

$("input[name=name]").val(book_name);
$("input[name=author]").val(author);
$("input[name=group_books]").val(group_books);
$("input[name=number_stamp]").val(number_stamp);
$("input[name=cost_price]").val(cost_price);
$("input[name=sale_price]").val(sale_price);
$("input[name=note]").val(note);
} );
    </script>
    <script type="text/javascript">
    $("#form-updatabooks").validate({
        rules: {
          totalqty: {

              minlength: 4,
              number: !0
          },
            name: {
                minlength: 3,
                required: !0

            },
            author: {
                required: !0,
                 minlength: 3
            },

            cost_price: {
                number: !0
            },
            sale_price: {
                required: !0,
               number: !0
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        }
    });
     $("#form-updatabooks").on("submit", function (event) {
if (event.isDefaultPrevented()) {
   // handle the invalid form...
} else {
   // everything looks good!
   event.preventDefault();
   $.ajax({
       type: 'POST',
       url: '../Operations/updatabooks.php',
       data: $(this).serialize()
   })
   .done(function(data){
$('#response').append(data);
$('.alert-success').removeClass( "hidden" ).addClass( "show" );
$("#form-updatabooks")[0].reset();

   })
   .fail(function() {

       // just in case posting your form failed
       alert( "حصل خطأ ما الرجاء اعادة المحاولة ! ..." );

   });

   // to prevent refreshing the whole page page
   return false;
}
});
</script>
</body>

</html>
