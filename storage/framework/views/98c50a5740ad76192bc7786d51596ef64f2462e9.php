<?php $__env->startSection('content'); ?>

<?php $cart_content = Cart::content()?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description"></td>
                        <td class="price">Gía</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng cộng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $cart_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="<?php echo e(URL::to('/uploads/product/'.$value->options->image)); ?>" alt=""
                                    width="100"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""><?php echo e($value->name); ?></a></h4>
                            <p>Mã sản phẩm: <?php echo e($value->id); ?></p>
                        </td>
                        <td class="cart_price">
                            <p><?php echo e(number_format($value->price)); ?> đ</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="<?php echo e(URL::to('/update-cart-quantity')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo e($value->qty); ?>"
                                    autocomplete="off" size="2">
                                <input type="hidden" value="<?php echo e($value->rowId); ?>" name="rowId">
                                <input type="submit" value="Cập nhật" name="update_qty" class="btn btn_default">
                            </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php echo e(number_format($value->qty* $value->price).' đ'); ?></p>
                        </td>
                        <td class="cart_delete">
                        <a class="cart_quantity_delete" href="<?php echo e(URL::to('/delete-to-cart/'.$value->rowId)); ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Chi phí ước tính</h3>
            <p> Tính toán chi phí các sản phẩm.</p>
        </div>
        <div class="row">

            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span><?php echo e(Cart::subtotal()); ?></span></li>
                        <li>Thuế <span>$2</span></li>
                        <li>Phí vận chuyển <span>Miễn phí</span></li>
                    </ul>
                <a class="btn btn-default check_out" href="<?php echo e(URL::to('login-checkout')); ?>">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/store/resources/views/pages/show_cart.blade.php ENDPATH**/ ?>