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
                <div class="col-xl-12 col-lg-12 col-md-12 mx-auto">
                    <div class="card p-3">
                        <h5>زیادکردنی کڕین</h5>
                        <div id="alert"></div>
                            <!-- add purchase -->
                            <form action="" id="add_purchase">
                                <?php
                                    $check_id=Purchase::fetchAll();
                                    if(Purchase::numRows()>0){
                                        foreach($check_id as $check){
                                            $id=$check->id;
                                            $get_numbers=str_replace("PR","",$id);
                                            $id_increase=$get_numbers+1;
                                            $get_string=str_pad($id_increase,5,0,STR_PAD_LEFT);
                                            $new_id="PR".$get_string;
                                            echo  '<input type="hidden" id="code" value="'.$new_id.'" />';     
                                    }
                                }else{
                                    echo  '<input type="hidden" id="code" value="PR00001" />';     
                                }                           
                                ?>
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="supplier_id" class="form-label">ناوی
                                            دابینکەر
                                            <span class="text-danger">*</span></label>
                                            <select id="supplier_id" class="select2 form-select form-select-lg" data-allow-clear="true">
                                              <?php
                                                $suppliers=Supplier::fetchAll();
                                                foreach($suppliers as $supplier){
                                                    echo '<option value="'.$supplier->id.'">'.$supplier->name.'</option>';
                                                }
                                              ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="purchase_date"
                                            class="form-label">بەرواری کڕین <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control"
                                            id="purchase_date" name="purchase_date" value="<?php echo date('Y-m-d'); ?>" />
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="mb-3">
                                        <label for="supplier_status" class="form-label">ناوی
                                            دابینکەر
                                            <span class="text-danger">*</span></label>
                                            <select id="supplier_status" class="select2 form-select form-select-lg" data-allow-clear="true">
                                              <option value="received">وەرگیراو</option>
                                              <option value="pending">هەڵپەسێردراو</option>
                                              <option value="ordered">داواکراو</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="purchase_ref_num"
                                            class="form-label">ژمارەی سەرچاوە
                                            </label>
                                        <input type="text" class="form-control"
                                            id="purchase_ref_num" name="purchase_ref_num"
                                            placeholder="ژمارەی سەرچاوە بنووسە..." />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <audio id="beep" src="<?php echo ASSETS_PATH;?>/audio/beep.mp3"></audio>
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="mb-3 position-relative">
                                        <canvas class="d-none"></canvas>
                                    <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="ti ti-barcode"></i></span>
                                            <input
                                                id="item_search"
                                                class="form-control"
                                                type="text"
                                                autocomplete="off"
                                                placeholder="ناوی کاڵا / بارکۆدی کالا"
                                            />
                                        </div>
                                    <div id="search-result" class="card shadow position-absolute w-100 mt-2 zindex-5"></div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card-datatable text-nowrap overflow-auto">
                                    <table class="table" id="item_table">
                                        <thead class="bg-primary">
                                            <tr >
                                                <th class="text-white">ناوی کاڵا</th>
                                                <th class="text-white">عەدەد</th>
                                                <th class="text-white">نرخی کڕین</th>
                                                <th class="text-white">جۆری داشکاندن</th>
                                                <th class="text-white">داشکاندن</th>
                                                <th class="text-white">باج</th>
                                                <th class="text-white">تێکڕای باج</th>
                                                <th class="text-white">یەکەی تێچوو</th>
                                                <th class="text-white">تێکڕای گشتی</th>
                                                <th class="text-white">کردارەکان</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <h4>کۆی گشتی عەدەدەکان : 
                                            <span id="total_quantity">0</span>
                                        </h4>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-4"><h6>خەرجیەکانی تر : </h6></div>
                                            <div class="col-6">
                                        <input type="text" class="form-control"
                                            id="tax_amount" name="tax_amount"/>
                                            </div>
                                            <div class="col-2">
                                                <select class="form-control" name="" id="tax">
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-4"><h6>داشکاندنی هەمووی : </h6></div>
                                            <div class="col-6">
                                        <input type="text" class="form-control"
                                            id="discount" name="discount" />
                                            </div>
                                            <div class="col-2">
                                            <select class="form-control" name="" id="discount_type">
                                                    <option value="per">%</option>
                                                    <option value="fix">$</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="purchase_note">تێبینی : </label>
                                        <textarea name="purchase_note" id="purchase_note" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="row ps-5">
                                        <div class="mb-3 ">
                                        <h6>کۆی گشتی : <span id="total_price">0.00</span> دینار</h6>
                                    </div>
                                        <div class="mb-3">
                                        <h6>خەرجیەکانی تر : <span id="other_charges">0.00</span> دینار</h6>
                                        </div>
                                        <div class="mb-3">
                                        <h6>داشکاندنی هەمووی : <span id="discount_all">0.00</span> دینار</h6>
                                        </div>
                                        <div class="mb-3">
                                        <h6>کۆی گشتی کۆتای: <span id="gtotal">0.00</span> دینار</h6>
                                    </div>
                                    </div>

                                </div>
                            </div>
                            <!-- <hr> -->
                            <!-- <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card-datatable text-nowrap">
                                    <h6>زانیاری پارەدانی پێشوو :</h6>
                                    <table class="table" id="payment_table">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th class="text-white">بەروار</th>
                                                <th class="text-white">جۆری پارەدان</th>
                                                <th class="text-white">تێبینی</th>
                                                <th class="text-white">پارەدان</th>
                                                <th class="text-white">کردارەکان</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    </div>
                                </div>
                            </div> -->
                            <hr>
                            <div class="card bg-secondary p-3" >
                                <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <div class="mb-3">
                                        <label for="purchase_payment_amount"
                                            class="form-label text-white">تێکڕا </label>
                                        <input type="text" class="form-control"
                                            id="purchase_payment_amount"
                                            name="purchase_payment_amount" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <div class="mb-3">
                                        <label for="purchase_payment_type"
                                            class="form-label text-white">جۆری پارەدان</label>
                                       <select class="form-control" name="purchase_payment_type" id="purchase_payment_type">
                                        <option value="cash">کاش</option>
                                       </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <div class="mb-3">
                                        <label for="purchase_payment_note"
                                            class="form-label text-white">تێبینی</label>
                                            <textarea name="purchase_payment_note" id="purchase_payment_note" class="form-control"></textarea>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="my-3 text-center">
                                <button type="submit"
                                    class="btn btn-primary">پاشەکەوتکردن</button>
                                <button type="reset"
                                    class="btn btn-secondary">پاکردنەوە</button>
                            </div>
                        </form>
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