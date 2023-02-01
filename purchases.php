
<!-- HEADER -->
<?php include("includes/header.php");?>
<!-- !HEADER -->
<!-- Navbar -->
<?php include("includes/navbar.php");?>
<!-- / Navbar -->

<!-- Layout container -->
<div class="layout-page">
<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Menu -->
<?php include("includes/menu.php");?>
<!-- / Menu -->
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

<div class="row">
<!-- View sales -->
<!-- purchase list start -->
<div class="col-md-10 mx-auto">
<div class="card">
<div class="card-datatable text-nowrap">
<table class="table" id="purchase_table">
    <thead>
        <tr>
            <th>بەرواری كرین</th>
            <th>کۆد</th>
            <th>دۆخ</th>
            <th>ژمارەی سەرچاوە</th>
            <th>کۆی گشتی</th>
            <th>زیادکراوە لە لەلایەن</th>
            <th>کردارەکان</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- edit purchase -->
<div class="modal modal-xl fade " id="edit_purchase_modal" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_purchase_label">گۆڕانکاری</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="alert"></div>
                <form action="" id="edit_purchase">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_name"
                                    class="form-label">ناوی
                                    بەرهەم<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="epurchase_name" name="epurchase_name"
                                    placeholder="ناوی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_barcode"
                                    class="form-label">کۆدی
                                    بەرهەم</label>
                                <input type="text" class="form-control"
                                    id="epurchase_barcode" name="epurchase_barcode"
                                    placeholder="کۆدی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_qty"
                                    class="form-label">عەدەدی
                                    بەرهەم</label>
                                <input type="number" class="form-control"
                                    id="epurchase_qty" name="epurchase_qty"
                                    placeholder="عەدەدی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_unit"
                                    class="form-label">یەکەی
                                    بەرهەم<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="epurchase_unit" name="epurchase_unit"
                                    placeholder="یەکەی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_image"
                                    class="form-label">وێنەی
                                    بەرهەم</label>
                                <input type="file" class="form-control"
                                    id="epurchase_image" name="epurchase_image"
                                    placeholder="وێنەی بەرهەم ..." />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_status"
                                    class="form-label">دۆخ<span
                                        class="text-danger">*</span></label>
                                <select name="epurchase_status"
                                    id="epurchase_status" class="form-control">
                                    <option value="">تکایە دۆخێک هەڵبژێرە
                                    </option>
                                    <option value="0">چالاکە</option>
                                    <option value="1">ناچالاکە</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_debt"
                                    class="form-label">ئایە
                                    قەرزە؟<span
                                        class="text-danger">*</span></label>
                                <select name="epurchase_debt" id="epurchase_debt"
                                    class="form-control">
                                    <option value="">تکایە دانەیەک هەڵبژێرە
                                    </option>
                                    <option value="1">بەڵێ</option>
                                    <option value="0">نەخێر</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">

                                <label for="epurchase_category"
                                    class="form-label">جۆری
                                    بەرهەم<span
                                        class="text-danger">*</span></label>
                                <select name="epurchase_category"
                                    id="epurchase_category" class="form-control">
                                    <option value="">تکایە جۆرێک هەڵبژێرە
                                    </option>
                                    <?php 
                                    $categories=Category::fetchAll();
                                    if(Category::numRows()>0){
                                    foreach($categories as $category){
                                    echo '<option value="'.$category->id.'">'.$category->name.'</option>';
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_brand"
                                    class="form-label">بڕاند</label>
                                <select name="epurchase_brand" id="epurchase_brand"
                                    class="form-control">
                                    <option value="">تکایە بڕاندێک هەڵبژێرە
                                    </option>
                                    <?php 
                                $brands=Brand::fetchAll();
                                if(Brand::numRows()>0){
                                foreach($brands as $brand){
                                echo '<option value="'.$brand->id.'">'.$brand->name.'</option>';
                                }
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_mfd"
                                    class="form-label">بەرواری
                                    دەرچوون</label>
                                <input type="date" class="form-control"
                                    id="epurchase_mfd" name="epurchase_mfd" />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_exd"
                                    class="form-label">بەرواری
                                    بەسەرچوون</label>
                                <input type="date" class="form-control"
                                    id="epurchase_exd" name="epurchase_exd" />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_desc"
                                    class="form-label">باسکردن</label>
                                <textarea name="epurchase_desc" maxlength="100"
                                    id="epurchase_desc"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>


                    <hr>


                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_price"
                                    class="form-label">نرخی بەرهەم
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="epurchase_price" name="epurchase_price"
                                    placeholder="نرخی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_tax" class="form-label">باج
                                    %<span class="text-danger">*</span></label>
                                <input type="text" name="epurchase_tax"
                                    class="form-control" id="epurchase_tax">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_tax_type"
                                    class="form-label">جۆری
                                    باج<span
                                        class="text-danger">*</span></label>
                                <select name="epurchase_tax_type"
                                    class="form-control" id="epurchase_tax_type">
                                    <option value="">جۆری باج هەڵبژێرە</option>
                                    <option value="exclusive">تایبەت</option>
                                    <option value="inclusive">گشتگیر</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_purchase_price"
                                    class="form-label">نرخی
                                    کڕین<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="epurchase_purchase_price"
                                    name="epurchase_purchase_price"
                                    placeholder="نرخی کڕین..." readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_profit_margin"
                                    class="form-label">ڕێژەی
                                    قازانج % <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="epurchase_profit_margin"
                                    name="epurchase_profit_margin"
                                    placeholder="ڕێژەی قازانج بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_sales_price"
                                    class="form-label">نرخی
                                    فرؤشتن<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="epurchase_sales_price"
                                    name="epurchase_sales_price"
                                    placeholder="نرخی فرشتن بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="epurchase_final_price"
                                    class="form-label">نرخی
                                    کۆتای<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="epurchase_final_price"
                                    name="epurchase_final_price"
                                    placeholder="نرخی کۆتای..." readonly />
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
<div class="col-xl-3 col-lg-6 col-md-6">
<div class="mb-3">
<label for="epurchase_discount_type" class="form-label">جۆری داشکاندن</label>
<select name="epurchase_discount_type" id="epurchase_discount_type" class="form-control"></select>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6">
<div class="mb-3">
<label for="epurchase_discount" class="form-label">داشکاندن</label>
<input type="number" class="form-control" id="epurchase_discount" name="epurchase_discount"
placeholder="داشکاندن بنووسە..." />
</div>
</div>
</div> -->
                    <div class="mb-3 text-center">
                        <button type="submit"
                            class="btn btn-primary">پاشەکەوتکردن</button>
                        <button type="reset"
                            class="btn btn-secondary">پاکردنەوە</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



</div>
</div>
</div>
<!-- purchase list end -->
</div>


</div>
<!--/ Content -->

<!-- Footer -->
<?php include("includes/footer.php");?>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!--/ Content wrapper -->
</div>
<?php include("includes/scripts.php");?>