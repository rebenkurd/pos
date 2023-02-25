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
                        <h5>گەڕاندنەوەی کڕین</h5>
                        <div id="alert"></div>
                            <!-- add purchase -->
                            <form action="" id="return_purchase">
                                <?php
                                    if(isset($_GET['id'])){
                                        $id=$_GET['id'];
                                    }else{
                                        echo "<script>window.location.href='/pos'</script>";
                                    }
                                    $purchase=Purchase::findbyCode($id);
                                    echo '<input type="hidden" id="code" name="code[]" value="'.$id.'"/>';
                                    echo '<input type="hidden" id="purchase_id" name="purchase_id" value="'.$purchase->id.'"/>';;
                                   ?>
                                <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <p>کۆدی کڕین : <span><?php echo $purchase->code;?></span></p>
                                    <div class="mb-3">
                                        <label class="form-label" for="return_status">دۆخ</label>
                                        <select class="form-control w-25" id="return_status">
                                            <option value="return">گەڕاندنەوە</option>
                                            <option value="cancel">ڕەتکردنەوە</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <p>ناوی دابینکەر : <span><?php echo Supplier::singleFetch($purchase->supplier)->name;?></span></p>
                                    <div class="mb-3">
                                        <label class="form-label" for="return_date">بەروار</label>
                                        <input class="form-control w-25" id="return_date" type="date" value="<?php echo date('Y-m-d');?>"/>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
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
                                        <?php
                                            $items=Item::fetchAll();
                                            if(Item::numRows()>0){
                                                foreach($items as $item){
                                                    if($item->code == $id){
                                                        echo '<tr>';
                                                        echo '<input type="hidden" name="custom_id[]" id="custom_id" value="'.$item->custom_id.'">';
                                                        echo '<input type="hidden" name="item_id[]" id="item_id" value="'.$item->id.'">';                                                        echo '<td><input type="text" name="item_name[]" id="item_name" size="100" value="'.$item->name.'" readonly class="form-control item_name"></td>';
                                                        echo '<td><div class="input-group flex-nowrap">
                                                        <button type="button" class="btn btn-secondary btn-sm item_btn_minus" id="item_btn_minus" ><i class="ti ti-minus"></i></button>
                                                        <input type="text" id="item_qty" name="item_qty[]" size="100" value="'.$item->quantity.'" class="form-control input-sm text-center item_qty">
                                                        <button type="button" class="btn btn-secondary btn-sm item_btn_plus" id="item_btn_plus" ><i class="ti ti-plus"></i></button>
                                                        </div></td>';
                                                        echo '<td><input type="text" name="item_price[]" id="item_price" size="120" value="'.$item->price.'" readonly class="form-control item_price"></td>';
                                                        echo '<td><select name="item_discount_type[]" id="item_discount_type" class="form-control item_discount_type">
                                                        <option value="per">%</option>
                                                        <option value="amt">پارە</option>
                                                        </select></td>';
                                                        echo '<td><input type="text" name="item_discount_amount[]" id="item_discount_amount" size="100" value="'.$item->discount.'" readonly class="form-control item_discount_amount"></td>';
                                                        echo '<td><input type="text" name="item_tax[]" id="item_tax" size="50" value="'.$item->tax.'" class="form-control item_tax"></td>';
                                                        echo '<td><input type="text" name="item_tax_amount[]" id="item_tax_amount" value="0.00" size="100" readonly class="form-control item_tax_amount"></td>';
                                                        echo '<td><input type="text" name="item_unit_cost[]" id="item_unit_cost" size="100" value="0.00" readonly class="form-control item_unit_cost"></td>';
                                                        echo '<td><input type="text" name="item_total_price[]" id="item_total_price" size="100" value="0.00" readonly class="form-control item_total_price"></td>';
                                                        echo '<td><button type="button" id="btn_remove_item" class="btn btn-danger btn-sm btn_remove_item"><i class="ti ti-minus"></i></button></td>';
                                                        echo '</tr>';
                                                    }} } ?>
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
                                            <span id="total_quantity"><?php echo $purchase->total_quantity; ?></span>
                                        </h4>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-4"><h6>خەرجیەکانی تر : </h6></div>
                                            <div class="col-6">
                                        <input type="text" class="form-control"
                                            id="tax_amount" name="tax_amount" value="<?php echo $purchase->tax_amount ?>"/>
                                            </div>
                                            <div class="col-2">
                                                <select class="form-control" name="" id="tax">
                                                    <option value="5" <?php echo $purchase->tax==5?"selected":null; ?>>5%</option>
                                                    <option value="10" <?php echo $purchase->tax==10?"selected":null; ?>>10%</option>
                                                    <option value="15" <?php echo $purchase->tax==15?"selected":null; ?>>15%</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-4"><h6>داشکاندنی هەمووی : </h6></div>
                                            <div class="col-6">
                                        <input type="text" class="form-control"
                                            id="discount" name="discount" value="<?php echo $purchase->discount; ?>" />
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
                                        <textarea name="purchase_note" id="purchase_note" class="form-control"><?php echo $purchase->note ?></textarea>
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
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <h6>زانیاری پارەدانی پێشوو :</h6>
                                    <table class="table" id="payment_table">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th class="text-white">#</th>
                                                <th class="text-white">بەروار</th>
                                                <th class="text-white">جۆری پارەدان</th>
                                                <th class="text-white">تێبینی</th>
                                                <th class="text-white">پارەدان</th>
                                                <th class="text-white">کردارەکان</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $payments=Payment::fetchAll();
                                            if(Payment::numRows()>0){
                                                $a=1;
                                                foreach($payments as $payment){
                                                    if($payment->code == $id){
                                            ?>
                                            <tr>
                                            <td><?php echo $payment->created_at; ?></td>
                                            <td><?php echo $payment->pay_type; ?></td>
                                            <td><?php echo $payment->pay_amount; ?></td>
                                            <td><?php echo $payment->pay_note; ?></td>
                                            <td><a href="javascript:void(0);" data-id="<?php echo $row['id'];?>" class="text-danger delete_payment"><i class="ti ti-trash"></i></a></td>
                                        </tr>
                                            <?php 
                                        }
                                            } 
                                                } ?>
                                        </table>
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