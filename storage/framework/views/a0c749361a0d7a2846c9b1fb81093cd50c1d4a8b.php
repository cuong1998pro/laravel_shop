<?php $__env->startSection('admin_content'); ?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
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
                    <form role="form" action="<?php echo e(URL::to("/update-product/$product->product_id")); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label for="exampleInputEmail1"> Tên sản phẩm:</label>
                            <input name="product_name" type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Nhập tên danh mục" value="<?php echo e($product->product_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Giá sản phẩm:</label>
                            <input name="product_price" type="text" class="form-control" id="exampleInputEmail1"
                        placeholder="Nhập giá sản phẩm" value="<?php echo e($product->product_price); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Hình ảnh sản phẩm:</label>
                            <input name="product_image" type="file" class="" id="exampleInputEmail1">
                        </div>
                        <img src="<?php echo e(URL::to("uploads/product/".$product->product_image)); ?>" width="100">
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm:</label>
                            <textarea class="form-control" id="exampleInputPassword1"
                        name="product_description" placeholder="Mô tả danh mục"><?php echo e($product->product_desc); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Nội dung sản phẩm:</label>
                            <textarea class="form-control" id="exampleInputPassword1"
                        name="product_content" placeholder="Mô tả danh mục" ><?php echo e($product->product_content); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiện sản phẩm:</label>
                            <select name="product_status" class="form-control input-sm m-bot15" id="">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm:</label>
                            <select name="category_id" class="form-control input-sm m-bot15" id="">
                                <?php $__currentLoopData = $allcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($value->category_id == $product->category_id): ?>
                                        <option selected value=<?php echo e($value->category_id); ?>><?php echo e($value->category_name); ?></option>
                                    <?php else: ?>
                                    <option value=<?php echo e($value->category_id); ?>><?php echo e($value->category_name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm:</label>
                            <select name="brand_id" class="form-control input-sm m-bot15" id="">
                                <?php $__currentLoopData = $allbrand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->brand_id == $product->brand_id): ?>
                                <option selected value=<?php echo e($value->brand_id); ?>><?php echo e($value->brand_name); ?></option>
                                <?php else: ?>
                                <option value=<?php echo e($value->brand_id); ?>><?php echo e($value->brand_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/store/resources/views/admin/edit_product.blade.php ENDPATH**/ ?>