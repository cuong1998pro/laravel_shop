<?php $__env->startSection('content'); ?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="<?php echo e(URL::to('/')); ?>">Trang chủ</a></li>
              <li class="active">Thanh toán</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="register-req">
            <p>Hãy dùng thanh toán và đăng ký để dễ dàng truy cập vào lịch sử đơn hàng của bạn</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bill-to">
                        <p>Hóa đơn</p>
                        <div class="form-one" style="">
                        <form action="<?php echo e(URL::to('/save-checkout-customer')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                                <input name="shipping_email" type="text" placeholder="Email*:">
                                <input type="text" name="shipping_name" placeholder="Họ và tên:">
                                <input type="text" name="shipping_address" placeholder="Địa chỉ:">
                                <input type="text" name="shipping_phone" placeholder="Số điện thoại">

                            <div class="order-message">
                                <p>Ghi chú</p>
                                <textarea name="shipping_note" rows="8"></textarea>
                            </div>
                            <input type="submit" value="Gửi" name="send_order" class="btn btn-default"></form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>


</section> <!--/#cart_items-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/store/resources/views/pages/checkout.blade.php ENDPATH**/ ?>