<?php $__env->startSection('admin_content'); ?>
<?php $message = Session::get('message') ?>
<?php if($message): ?>
<div class="alert alert-success" role="alert">
    <?php echo $message; ?>

    <?php echo e(Session::put('message', null)); ?>

</div>
<?php endif; ?>
<div class="panel panel-default">
    <div class="panel-heading">
        Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Bulk action</option>
                <option value="1">Delete selected</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
            <div class="input-group">
                <input type="text" class="input-sm form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
                <tr>
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                    </th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Hình sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th>Hiển thị</th>
                    <th style="width:120px; text-align:right">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td><?php echo e($value->product_name); ?></td>
                    <td><?php echo e($value->product_price); ?></td>
                    <td><img src="uploads/product/<?php echo e($value->product_image); ?>" width="100"></td>
                    <td><?php echo e($value->category_name); ?></td>
                    <td><?php echo e($value->brand_name); ?></td>
                    <td><span class="text-ellipsis">
                            <?php if(!$value->product_status): ?>
                            Ẩn
                            <a style="text-decoration:underline; font-size:0.8em;"
                                href="<?php echo e(URL::to("/active-product/$value->product_id")); ?>"> Hiển thị</a>
                            <?php else: ?>
                            Hiển thị
                            <a style="text-decoration:underline ;font-size:0.8em;"
                                href="<?php echo e(URL::to("/unactive-product/$value->product_id")); ?>"> Ẩn</a>
                            <?php endif; ?>
                        </span></td>
                    <td align="right" style="margin-right:10px">
                    <a href="<?php echo e(URL::to("/edit-product/$value->product_id")); ?>" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a>
                        <a onclick="return confirm('Bạn có muốn xóa không?')" href="<?php echo e(URL::to("/delete-product/$value->product_id")); ?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text-active"></i></a>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">

            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-none m-b-none">
                    <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/store/resources/views/admin/all_product.blade.php ENDPATH**/ ?>