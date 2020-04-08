<?php $__env->startSection('admin_content'); ?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <?php $message = Session::get('message') ?>
                    <?php if($message): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $message; ?>

                        <?php echo e(Session::put('message', null)); ?>

                    </div>
                    <?php endif; ?>
                    <form role="form" action="<?php echo e(URL::to('/save-category-product')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label for="exampleInputEmail1"> Tên danh mục:</label>
                            <input name="category_product_name" type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục:</label>
                            <textarea class="form-control" id="exampleInputPassword1"
                                name="category_product_description" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiện danh mục:</label>
                            <select name="category_product_status" class="form-control input-sm m-bot15" id="">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm danh mục</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/store/resources/views/admin/add_category_product.blade.php ENDPATH**/ ?>