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
            <form action="" id="invoice">
            <div class="row">
            <!-- View sales -->
            <!-- purchase list start -->
            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto">
                <div class="card p-4">
                <?php
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                    }else{
                        echo "<script>window.location.href='/pos'</script>";
                    }
                    $purchase=Purchase::findbyCode($id);
                    $company=CompanyProfile::singleFetch(1);
                ?>
                    <div class="row">
                        <div class="col-xl-6"><h5>پسوڵەی گەڕاندنەوە</h5></div>
                        <div class="col-xl-6 text-end">بەروار : <?php echo $purchase->purchase_date;?></div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-xl-4">
                            <h5>فڕۆشیار</h5>
                            <p>ناوی کۆمپانیا : <span><?php echo $company->name;?></span></p>
                            <p>ناونیشان : <span><?php echo $company->country.",".$company->state.",".$company->city;?></span></p>
                            <p>مۆبایل : <span><?php echo $company->mobile;?></span>، تەلەفۆن : <span><?php echo $company->phone;?></span></p>
                            <p>ئیمەیڵ : <span><?php echo $company->email;?></span></p>
                            <p>GST : <span><?php echo $company->gst;?></span></p>
                            <p>VAT : <span><?php echo $company->vat;?></span></p>
                            <p>PAN : <span><?php echo $company->pan;?></span></p>
                        </div>
                        <div class="col-xl-4">
                        <?php
                            $supplier=Supplier::singleFetch($purchase->supplier);
                        ?>
                        <h5>دابینکەر</h5>
                        <p>ناوی کۆمپانیا : <span><?php echo $supplier->name;?></span></p>
                            <p>ناونیشان : <span><?php echo $supplier->country.",".$supplier->state.",".$supplier->city;?></span></p>
                            <p>مۆبایل : <span><?php echo $supplier->mobile;?></span></p>
                            <p>ئیمەیڵ : <span><?php echo $supplier->email;?></span></p>
                            <p>GST : <span><?php echo $supplier->gst;?></span></p>
                            <p>TAX : <span><?php echo $supplier->tax;?></span></p>
                        </div>
                        <div class="col-xl-4">
                            <h6>پسوڵەی : #<span><?php echo $purchase->code;?></span></h6>
                            <h6>دۆخی گەڕاندنەوە : <span><?php echo $purchase->return_status;?></span></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table my-3" id="invoice_item_table">
                            <thead class="bg-primary">
                                            <tr >
                                                <th class="text-white">#</th>
                                                <th class="text-white">ناوی کاڵا</th>
                                                <th class="text-white">عەدەد</th>
                                                <th class="text-white">نرخی کڕین</th>
                                                <th class="text-white">جۆری داشکاندن</th>
                                                <th class="text-white">داشکاندن</th>
                                                <th class="text-white">باج</th>
                                                <th class="text-white">تێکڕای باج</th>
                                                <th class="text-white">یەکەی تێچوو</th>
                                                <th class="text-white">تێکڕای گشتی</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $payments=Item::fetchAll();
                                            if(Item::numRows()>0){
                                                $a=1;
                                                foreach($payments as $item){
                                                    if($item->code == $id){
                                            ?>
                                            <tr>
                                            <td><?php echo $a++; ?></td>
                                            <td><?php echo $item->name; ?></td>
                                            <td><?php echo $item->quantity; ?></td>
                                            <td><?php echo $item->price; ?></td>
                                            <td><?php echo $item->discount; ?></td>
                                            <td><?php echo $item->discount_amount; ?></td>
                                            <td><?php echo $item->tax; ?></td>
                                            <td><?php echo $item->tax_amount; ?></td>
                                            <td><?php echo $item->unit_cost; ?></td>
                                            <td><?php echo $item->total_price; ?></td>
                                        </tr>
                                            <?php }} } ?>
                                        </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h6>داشکاندی هەمووی : <span></span> (%)</h6>
                                    <p>
                                        <span>تیبینی : </span>
                                        <?php echo $purchase->note;?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                <div class="card-datatable text-nowrap">
                                    <h6>زانیاری پارەدانی پێشوو :</h6>
                                    <table class="table" id="invoice_payment_table">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th class="text-white">#</th>
                                                <th class="text-white">بەروار</th>
                                                <th class="text-white">جۆری پارەدان</th>
                                                <th class="text-white">تێبینی</th>
                                                <th class="text-white">پارەدان</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $payments=Payment::fetchAll();
                                            if(Payment::numRows()>0){
                                                $a=1;
                                                foreach($payments as $payment){
                                                    if($payment->code == $id){
                                            ?>
                                            <tr>
                                            <td><?php echo $a++; ?></td>
                                            <td><?php echo $payment->created_at; ?></td>
                                            <td><?php echo $payment->pay_type; ?></td>
                                            <td><?php echo $payment->pay_amount; ?></td>
                                            <td><?php echo $payment->pay_note; ?></td>
                                        </tr>
                                            <?php }} } ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 ps-5">
                        <h6>کۆی گشتی : <span><?php echo "0.00";?></span> دینار</h6>
                                <h6>خەرجیەکانی تر : <span><?php echo $purchase->other_charges;?></span> دینار</h6>
                                <h6>داشکاندی هەمووی : <span><?php echo $purchase->discount_all;?></span> دینار</h6>
                                <h6>کۆتا کۆی گشتی : <span><?php echo $purchase->grand_total;?></span> دینار</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="co-xl-12">
                            <a href="edit_purchase.php?id=<?php echo $id;?>" type="button" class="btn btn-info" >گۆڕانکاری</a>
                            <button type="button" id="inovice_barcode" class="btn btn-secondary">باڕکۆد</button>
                            <button type="button" id="inovice_print" onclick="invoicePrint()" class="btn btn-warning">چاپکردن</button>
                            <a href="edit_purchase.php?id=<?php echo $id;?>" type="button" class="btn btn-danger">گەڕاندنەوە کڕین</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- purchase list end -->
            </div>
            </form>
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