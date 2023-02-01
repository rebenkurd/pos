
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
<!-- supplier list start -->
<div class="col-md-10 mx-auto">
<div class="card">
<div class="card-datatable text-nowrap">
<table class="table" id="supplier_table">
    <thead>
        <tr>
            <th>ئایدی</th>
            <th>ناو</th>
            <th>مۆبایل</th>
            <th>ئیمەیڵ</th>
            <th>دۆخ</th>
            <th>کردارەکان</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- edit supplier -->
 <div class="modal modal-xl fade " id="edit_supplier_modal" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_supplier_label">گۆڕانکاری</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="alert"></div>
                <form action="" id="edit_supplier">
                    <input type="hidden" name="id" id="id">
                   <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="esupplier_name" class="form-label">ناوی
                                    دابینکەر
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="esupplier_name" name="esupplier_name"
                                    placeholder="ناوی دابینکەر بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="esupplier_mobile"
                                    class="form-label">مۆبایلی
                                    دابینکەر</label>
                                <input type="text" class="form-control"
                                    id="esupplier_mobile" name="esupplier_mobile"
                                    placeholder="کۆدی دابینکەر بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="esupplier_email"
                                    class="form-label">ئیمەیڵی
                                    دابینکەر</label>
                                <input type="email" class="form-control"
                                    id="esupplier_email" name="esupplier_email"
                                    placeholder="ئیمەیڵی دابینکەر بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="esupplier_gst"
                                    class="form-label">ژمارەی GST
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="esupplier_gst" name="esupplier_gst"
                                    placeholder="ژمارەی GST بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="esupplier_tax"
                                    class="form-label">ژمارەی باج</label>
                                <input type="text" class="form-control"
                                    id="esupplier_tax" name="esupplier_tax"
                                    placeholder=" ژمارەی باج ..." />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="esupplier_open_balance"
                                    class="form-label">هەژماری کراوە <span
                                        class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="esupplier_open_balance" name="esupplier_open_balance">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="esupplier_country" class="form-label">وڵات
                                    <span class="text-danger">*</span></label>
                                <select name="esupplier_country" id="esupplier_country"
                                    class="form-control">
                                    <option value="">تکایە دانەیەک هەڵبژێرە
                                    </option>
                                    <option value="usa">USA</option>
                                    <option value="iraq">IRAQ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">                                    
                                        <label for="esupplier_state"
                                            class="form-label">هەرێم
                                            <span class="text-danger">*</span></label>
                                <select name="esupplier_state"
                                    id="esupplier_state" class="form-control">
                                    <option value="">تکایە دانەیەک هەڵبژێرە
                                    </option>
                                    <option value="usa">New York</option>
                                    <option value="iraq">Erbil</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">                                    
                                        <label for="esupplier_city"
                                            class="form-label">شار
                                            <span class="text-danger">*</span></label>
                                <input type="text" name="esupplier_city"
                                    id="esupplier_city" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="esupplier_postcode"
                                    class="form-label">پۆست کۆد</label>
                                <input type="text" class="form-control"
                                    id="esupplier_postcode" name="esupplier_postcode" />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="mb-3">                                    
                                        <label for="esupplier_status"
                                            class="form-label">دۆخ
                                            <span class="text-danger">*</span></label>
                                <select name="esupplier_status"
                                    id="esupplier_status" class="form-control">
                                    <option value="">تکایە دانەیەک هەڵبژێرە
                                    </option>
                                    <option value="0">چالاکە</option>
                                    <option value="1">ناچالاکە</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="esupplier_address"
                                    class="form-label">ناونیشان</label>
                                <textarea name="esupplier_address" id="esupplier_address"
                                    maxlength="100"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

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

<!-- add supplier -->
<div class="modal fade modal-xl" id="add_supplier_modal" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_supplier_label">زیادکردنی دابینکەر
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="alert"></div>

                <form action="" id="add_supplier">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="supplier_name" class="form-label">ناوی
                                    دابینکەر
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="supplier_name" name="supplier_name"
                                    placeholder="ناوی دابینکەر بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="supplier_mobile"
                                    class="form-label">مۆبایلی
                                    دابینکەر</label>
                                <input type="text" class="form-control"
                                    id="supplier_mobile" name="supplier_mobile"
                                    placeholder="کۆدی دابینکەر بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="supplier_email"
                                    class="form-label">ئیمەیڵی
                                    دابینکەر</label>
                                <input type="email" class="form-control"
                                    id="supplier_email" name="supplier_email"
                                    placeholder="ئیمەیڵی دابینکەر بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="supplier_gst"
                                    class="form-label">ژمارەی GST
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="supplier_gst" name="supplier_gst"
                                    placeholder="ژمارەی GST بنووسە..." />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="supplier_tax"
                                    class="form-label">ژمارەی باج</label>
                                <input type="text" class="form-control"
                                    id="supplier_tax" name="supplier_tax"
                                    placeholder=" ژمارەی باج ..." />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                            <label for="supplier_open_balance"
                                    class="form-label">هەژماری کراوە <span
                                        class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="supplier_open_balance" name="supplier_open_balance">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="supplier_country" class="form-label">وڵات
                                    <span class="text-danger">*</span></label>
                                <select name="supplier_country" id="supplier_country"
                                    class="form-control">
                                    <option value="">تکایە دانەیەک هەڵبژێرە
                                    </option>
                                    <option value="usa">USA</option>
                                    <option value="iraq">IRAQ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">                                    
                                        <label for="supplier_state"
                                            class="form-label">هەرێم
                                            <span class="text-danger">*</span></label>
                                <select name="supplier_state"
                                    id="supplier_state" class="form-control">
                                    <option value="">تکایە دانەیەک هەڵبژێرە
                                    </option>
                                    <option value="usa">New York</option>
                                    <option value="iraq">Erbil</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">                                    
                                        <label for="supplier_city"
                                            class="form-label">شار
                                            <span class="text-danger">*</span></label>
                                <input type="text" name="supplier_city"
                                    id="supplier_city" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="supplier_postcode"
                                    class="form-label">پۆست کۆد</label>
                                <input type="text" class="form-control"
                                    id="supplier_postcode" name="supplier_postcode" />
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="mb-3">                                    
                                        <label for="supplier_status"
                                            class="form-label">دۆخ
                                            <span class="text-danger">*</span></label>
                                <select name="supplier_status"
                                    id="supplier_status" class="form-control">
                                    <option value="">تکایە دانەیەک هەڵبژێرە
                                    </option>
                                    <option value="0">چالاکە</option>
                                    <option value="1">ناچالاکە</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label for="supplier_address"
                                    class="form-label">ناونیشان</label>
                                <textarea name="supplier_address" id="supplier_address"
                                    maxlength="100"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>


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


</div>
</div>
</div>
<!-- supplier list end -->
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