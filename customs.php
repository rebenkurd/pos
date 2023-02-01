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
<!-- custom list start -->
<div class="col-md-10 mx-auto">
<div class="card">
<div class="card-datatable text-nowrap">
<table class="table" id="custom_table">
    <thead>
        <tr>
            <th>کۆد</th>
            <th>ناو</th>
            <th>بڕاند</th>
            <th>جۆر</th>
            <th>یەکە</th>
            <th>عەدەد</th>
            <th>نرخ</th>
            <th>کۆتا نرخ</th>
            <th>باج</th>
            <th>قەرز</th>
            <th>دۆخ</th>
            <th>کردارەکان</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- edit custom -->
<div class="modal modal-xl fade " id="edit_custom_modal" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_custom_label">گۆڕانکاری</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="alert"></div>
                <form action="" id="edit_custom">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_name"
                                    class="form-label">ناوی
                                    بەرهەم<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="ecustom_name" name="ecustom_name"
                                    placeholder="ناوی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_barcode"
                                    class="form-label">کۆدی
                                    بەرهەم</label>
                                <input type="text" class="form-control"
                                    id="ecustom_barcode" name="ecustom_barcode"
                                    placeholder="کۆدی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_qty"
                                    class="form-label">عەدەدی
                                    بەرهەم</label>
                                <input type="number" class="form-control"
                                    id="ecustom_qty" name="ecustom_qty"
                                    placeholder="عەدەدی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_unit"
                                    class="form-label">یەکەی
                                    بەرهەم<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="ecustom_unit" name="ecustom_unit"
                                    placeholder="یەکەی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_image"
                                    class="form-label">وێنەی
                                    بەرهەم</label>
                                <input type="file" class="form-control"
                                    id="ecustom_image" name="ecustom_image"
                                    placeholder="وێنەی بەرهەم ..." />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_status"
                                    class="form-label">دۆخ<span
                                        class="text-danger">*</span></label>
                                <select name="ecustom_status"
                                    id="ecustom_status" class="form-control">
                                    <option value="">تکایە دۆخێک هەڵبژێرە
                                    </option>
                                    <option value="0">چالاکە</option>
                                    <option value="1">ناچالاکە</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_debt"
                                    class="form-label">ئایە
                                    قەرزە؟<span
                                        class="text-danger">*</span></label>
                                <select name="ecustom_debt" id="ecustom_debt"
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

                                <label for="ecustom_category"
                                    class="form-label">جۆری
                                    بەرهەم<span
                                        class="text-danger">*</span></label>
                                <select name="ecustom_category"
                                    id="ecustom_category" class="form-control">
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
                                <label for="ecustom_brand"
                                    class="form-label">بڕاند</label>
                                <select name="ecustom_brand" id="ecustom_brand"
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
                                <label for="ecustom_mfd"
                                    class="form-label">بەرواری
                                    دەرچوون</label>
                                <input type="date" class="form-control"
                                    id="ecustom_mfd" name="ecustom_mfd" />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_exd"
                                    class="form-label">بەرواری
                                    بەسەرچوون</label>
                                <input type="date" class="form-control"
                                    id="ecustom_exd" name="ecustom_exd" />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_desc"
                                    class="form-label">باسکردن</label>
                                <textarea name="ecustom_desc" maxlength="100"
                                    id="ecustom_desc"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>


                    <hr>


                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_price"
                                    class="form-label">نرخی بەرهەم
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="ecustom_price" name="ecustom_price"
                                    placeholder="نرخی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_tax" class="form-label">باج
                                    %<span class="text-danger">*</span></label>
                                <input type="text" name="ecustom_tax"
                                    class="form-control" id="ecustom_tax">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_tax_type"
                                    class="form-label">جۆری
                                    باج<span
                                        class="text-danger">*</span></label>
                                <select name="ecustom_tax_type"
                                    class="form-control" id="ecustom_tax_type">
                                    <option value="">جۆری باج هەڵبژێرە</option>
                                    <option value="exclusive">تایبەت</option>
                                    <option value="inclusive">گشتگیر</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_purchase_price"
                                    class="form-label">نرخی
                                    کڕین<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="ecustom_purchase_price"
                                    name="ecustom_purchase_price"
                                    placeholder="نرخی کڕین..." readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_profit_margin"
                                    class="form-label">ڕێژەی
                                    قازانج % <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="ecustom_profit_margin"
                                    name="ecustom_profit_margin"
                                    placeholder="ڕێژەی قازانج بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_sales_price"
                                    class="form-label">نرخی
                                    فرؤشتن<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="ecustom_sales_price"
                                    name="ecustom_sales_price"
                                    placeholder="نرخی فرشتن بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="ecustom_final_price"
                                    class="form-label">نرخی
                                    کۆتای<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="ecustom_final_price"
                                    name="ecustom_final_price"
                                    placeholder="نرخی کۆتای..." readonly />
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
<div class="col-xl-3 col-lg-6 col-md-6">
<div class="mb-3">
<label for="ecustom_discount_type" class="form-label">جۆری داشکاندن</label>
<select name="ecustom_discount_type" id="ecustom_discount_type" class="form-control"></select>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6">
<div class="mb-3">
<label for="ecustom_discount" class="form-label">داشکاندن</label>
<input type="number" class="form-control" id="ecustom_discount" name="ecustom_discount"
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

<!-- add custom -->
<div class="modal fade modal-xl" id="add_custom_modal" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_custom_label">زیادکردنی بەرهەم
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="alert"></div>

                <form action="" id="add_custom">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_name" class="form-label">ناوی
                                    بەرهەم
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="custom_name" name="custom_name"
                                    placeholder="ناوی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_barcode"
                                    class="form-label">کۆدی
                                    بەرهەم</label>
                                <input type="number" class="form-control"
                                    id="custom_barcode" name="custom_barcode"
                                    placeholder="کۆدی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_qty"
                                    class="form-label">عەدەدی
                                    بەرهەم</label>
                                <input type="number" class="form-control"
                                    id="custom_qty" name="custom_qty"
                                    placeholder="عەدەدی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_unit"
                                    class="form-label">یەکەی بەرهەم
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="custom_unit" name="custom_unit"
                                    placeholder="یەکەی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_image"
                                    class="form-label">وێنەی
                                    بەرهەم</label>
                                <input type="file" class="form-control"
                                    id="custom_image" name="custom_image"
                                    placeholder="وێنەی بەرهەم ..." />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_status"
                                    class="form-label">دۆخ <span
                                        class="text-danger">*</span></label>
                                <select name="custom_status" id="custom_status"
                                    class="form-control">
                                    <option value="">تکایە دۆخێک هەڵبژێرە
                                    </option>
                                    <option value="0">چالاکە</option>
                                    <option value="1">ناچالاکە</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_debt" class="form-label">ئایە
                                    قەرزە؟
                                    <span class="text-danger">*</span></label>
                                <select name="custom_debt" id="custom_debt"
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
                                        <label for="custom_category"
                                            class="form-label">جۆری بەرهەم
                                            <span class="text-danger">*</span></label>
                                <div class="input-group">
                                <select name="custom_category"
                                    id="custom_category" class="form-control">
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
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#add_custom_category_modal"  ><i class="ti ti-plus"></i></button>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_brand"
                                    class="form-label">بڕاند</label>
                                <div class="input-group">
                                <select name="custom_brand" id="custom_brand"
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
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#add_custom_brand_modal"  ><i class="ti ti-plus"></i></button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_mfd"
                                    class="form-label">بەرواری
                                    دەرچوون</label>
                                <input type="date" class="form-control"
                                    id="custom_mfd" name="custom_mfd" />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_exd"
                                    class="form-label">بەرواری
                                    بەسەرچوون</label>
                                <input type="date" class="form-control"
                                    id="custom_exd" name="custom_exd" />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_desc"
                                    class="form-label">باسکردن</label>
                                <textarea name="custom_desc" id="custom_desc"
                                    maxlength="100"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_price"
                                    class="form-label">نرخی بەرهەم
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="custom_price" name="custom_price"
                                    placeholder="نرخی بەرهەم بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_tax" class="form-label">باج %
                                    <span class="text-danger">*</span></label>
                                <input type="text" name="custom_tax"
                                    class="form-control" id="custom_tax">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_tax_type"
                                    class="form-label">جۆری باج
                                    <span class="text-danger">*</span></label>
                                <select name="custom_tax_type"
                                    class="form-control" id="custom_tax_type">
                                    <option value="">جۆری باج هەڵبژێرە</option>
                                    <option value="exclusive">گشتگیر</option>
                                    <option value="inclusive">تایبەت</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_purchase_price"
                                    class="form-label">نرخی
                                    کڕین <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="custom_purchase_price"
                                    name="custom_purchase_price" readonly
                                    placeholder="نرخی کڕین..." />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_profit_margin"
                                    class="form-label">ڕێژەی
                                    قازانج % <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="custom_profit_margin"
                                    name="custom_profit_margin"
                                    placeholder="ڕێژەی قازانج بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_sales_price"
                                    class="form-label">نرخی
                                    فرؤشتن <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="custom_sales_price"
                                    name="custom_sales_price"
                                    placeholder="نرخی فرشتن بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="custom_final_price"
                                    class="form-label">نرخی
                                    کۆتای <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="custom_final_price"
                                    name="custom_final_price" readonly
                                    placeholder="نرخی کۆتای..." />
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
<div class="col-xl-3 col-lg-6 col-md-6">
<div class="mb-3">
<label for="custom_discount_type" class="form-label">جۆری داشکاندن</label>
<select name="custom_discount_type" id="custom_discount_type" class="form-control"></select>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6">
<div class="mb-3">
<label for="custom_discount" class="form-label">داشکاندن</label>
<input type="number" class="form-control" id="custom_discount" name="custom_discount"
placeholder="داشکاندن بنووسە..." />
</div>
</div>
</div> -->


                    <div class="mb-3 text-center">
                        <button type="submit"
                            class="btn btn-primary">زیادکردن</button>
                        <button type="reset"
                            class="btn btn-secondary">پاکردنەوە</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
          <!-- add category -->
          <div class="modal fade" id="add_custom_category_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="add_custom_category_label">زیادکردنی جۆر</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#add_custom_modal"><i class="ti ti-chevron-left"></i></button>
                </div>
                <div class="modal-body">
                  <div id="alert"></div>
                  <form action="" id="add_custom_category">
                    <div class="mb-3">
                      <label for="category_name" class="form-label">ناوی جۆر <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="custom_category_name" name="category_name"
                        placeholder="ناوی جۆر بنووسە..." />
                    </div>
                    <div class="mb-3">
                      <label for="category_status" class="form-label">دۆخ <span class="text-danger">*</span></label>
                      <select name="category_status" id="custom_category_status" class="form-control">
                        <option value="">تکایە دۆخێک هەڵبژێرە</option>
                        <option value="0">چالاکە</option>
                        <option value="1">ناچالاکە</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="category_desc" class="form-label">باسکردن</label>
                      <textarea name="category_desc" id="custom_category_desc" maxlength="100" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 text-center">
                      <button type="submit" class="btn btn-primary">زیادکردن</button>
                      <button type="reset" class="btn btn-secondary">پاکردنەوە</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

                  <!-- add brand -->
            <div class="modal fade" id="add_custom_brand_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="add_custom_brand_label">زیادکردنی بڕاند</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#add_custom_modal"><i class="ti ti-chevron-left"></i></button>

                </div>
                <div class="modal-body">
                <div id="alert"></div>
                  <form action="" id="add_custom_brand">
                        <div class="mb-3">
                          <label for="brand_name" class="form-label">ناوی بڕاند <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="custom_brand_name" name="brand_name" placeholder="ناوی ىڕاند بنووسە..." />
                        </div>
                      <div class="mb-3">
                      <label for="brand_status" class="form-label">دۆخ <span class="text-danger">*</span></label>
                      <select name="brand_status" id="custom_brand_status" class="form-control">
                        <option value="">تکایە دۆخێک هەڵبژێرە</option>
                        <option value="0">چالاکە</option>
                        <option value="1">ناچالاکە</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="brand_desc" class="form-label">باسکردن</label>
                      <textarea name="brand_desc" maxlength="100" id="custom_brand_desc" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 text-center">
                      <button type="submit" class="btn btn-primary">زیادکردن</button>
                      <button type="reset" class="btn btn-secondary">پاکردنەوە</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

</div>
</div>
</div>
<!-- custom list end -->
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