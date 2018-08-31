<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong"><?= $_SESSION['user_Name']; ?></div><small>مستخدم</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="#"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">الرئيسية</span>
                </a>
            </li>
            <li class="heading">مستودعات</li>
            <li>
                <a href="../Pages/Selection&OutBooks.php"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">استعلامات و اخراج الكتب <span>
                </a>
            </li>
            <li>
                <a href="../Pages/addbook&group.php"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">اضافة كتاب او قسم <span>
                </a>
            </li>
            <li>
                <a href="../Pages/Delete&EditBooks.php"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">حذف و تعديل الكتب<span>
                </a>
            </li>
            <li>
                <a href="../Pages/EnterMoveBooks.php"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">ادخال كميات الكتب<span>
                </a>
            </li>
            <li>
                <a href="MovementRep.php"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">استعلامات حركات الكتب <span>
                </a>
            </li>
            <li class="heading">--------</li>
            <li>
                <a href="../Pages/register.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">مستخدم جديد</span>
                </a>
            </li>
      

        </ul>
    </div>
</nav>
