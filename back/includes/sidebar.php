<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="https://www.w3schools.com/howto/img_avatar.png" width="50" class="img-responsive" alt="Icon">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">المسؤول</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>متصل</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<form role="search" action="search-results.php" name="search" method="POST" enctype="multipart/form-data">

			<!--  -->

			<div class="form-group">
				<input type="text" class="form-control" id="searchdata" name="searchdata" placeholder="بحث عن تسجيل المركبة">
			</div>

		</form>
		<ul class="nav menu">
			<li class="<?php if($page=="dashboard") {echo "active";}?>"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> لوحة التحكم</a></li>
			<li class="<?php if($page=="vehicle-category") {echo "active";}?>"><a href="vehicle-category.php"><em class="fa fa-th-large">&nbsp;</em>  فئة المركبات </a></li>
			<li class="<?php if($page=="lieu-carburant") {echo "active";}?>"><a href="lieu-carburant.php"><em class="fa fa-th-large">&nbsp;</em>  مكان التزود بالوقود </a></li>
			<li class="<?php if($page=="income") {echo "active";}?>"><a href="total-income.php"><em class="fa fa-dashboard">&nbsp;</em>  استهلاك الوقود</a></li>
			<li class="<?php if($page=="manage-vehicles") {echo "active";}?>"><a href="manage-vehicles.php"><em class="fa fa-car">&nbsp;</em> إضافة مركبات</a></li>
			<li class="<?php if($page=="in-vehicle") {echo "active";}?>"><a href="in-vehicles.php"><em class="fa fa-toggle-on">&nbsp;</em> المركبات في الخدمة</a></li>
            <li class="<?php if($page=="out-vehicle") {echo "active";}?>"><a href="out-vehicles.php"><em class="fa fa-toggle-off">&nbsp;</em> المركبات في حالة عطل</a></li>
			<li class="<?php if($page=="reports") {echo "active";}?>"><a href="reports.php"><em class="fa fa-file">&nbsp;</em>   تقرير المركبات</a></li>
			<li class="<?php if($page=="reports") {echo "active";}?>"><a href="message.php"><em class="fa fa-file">&nbsp;</em>    تقارير  الرسائل  </a></li>
			<li class="<?php if($page=="reports") {echo "active";}?>"><a href="plan.php"><em class="fa fa-file">&nbsp;</em>      إضافة خطة  </a></li>
			<!-- <li class="<?php if($page=="about") {echo "active";}?>"><a href="about.php"><em class="fa fa-info">&nbsp;</em> About Page</a></li> -->
		
			
		</ul>
		
	</div><!--/.sidebar-->