<?php $__env->startSection('content'); ?>
<section id="form"><!--form-->
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập tài khoản của bạn</h2>
                <form action="<?php echo e(URL::to('/login-customer')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                        <input type="text" placeholder="Tên đăng nhập" name="customer_email"/>
                        <input type="password" placeholder="Mật khẩu" name="customer_password"/>
                        <span>
                            <input type="checkbox" class="checkbox">
                            Lưu thông tin đăng nhập
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng ký mới</h2>
                <form action="<?php echo e(URL::to('/add-customer')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                        <input name="customer_name" type="text" placeholder="Họ và tên"/>
                        <input type = "text" name="customer_email" placeholder="Email"/>
                        <input type= "password" name="customer_password" placeholder="Mạt khẩu"/>
                        <input name ="customer_phone" type="text" placeholder="Số điện thoại"/>

                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/store/resources/views/pages/login_checkout.blade.php ENDPATH**/ ?>