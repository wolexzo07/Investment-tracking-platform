<?php
  include_once("../finishit.php");

  xstart("0");
  xreq("validation.php");
  xreq("headtop.php");
  xtitle("Abocent - DashBoard");
  xreq("headbt.php");
  ?>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <?php xreq("sidebar.php");?>

            <!-- Page Content Holder -->
			<?php xreq("bar.php")?>
        </div>
<?php xreq("foot.php")?>
