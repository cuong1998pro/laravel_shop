<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap.min.css')); ?>" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo e(asset('backend/css/style.css')); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo e(asset('backend/css/style-responsive.css')); ?>" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo e(asset('backend/css/font.css')); ?>" type="text/css"/>
<link href="<?php echo e(asset('backend/css/font-awesome.css')); ?>" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="<?php echo e(asset('backend/js/jquery2.0.3.min.js')); ?>"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
    <h2>Đăng nhập</h2>
        <?php $message = Session::get('message')?>
        <?php if($message): ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $message; ?>

            <?php echo e(Session::put('message', null)); ?>

            </div>
        <?php endif; ?>
		<form action="<?php echo e(URL::to('/admin-dashboard')); ?>" method="post">
			<?php echo e(csrf_field()); ?>

			<input type="text" class="ggg" name="admin_email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="admin_password" placeholder="MẬT KHẨU" required="">
			<span><input type="checkbox" />Nhớ đăng nhập</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng Nhập" name="login">
		</form>
</div>
</div>
<script src="<?php echo e(asset('backend/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.scrollTo.js')); ?>"></script>
</body>
</html>
<?php /**PATH /var/www/html/store/resources/views/admin_login.blade.php ENDPATH**/ ?>