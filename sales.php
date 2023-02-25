
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
<!-- sale list start -->
<div class="col-md-10 mx-auto">
<div class="card">
<div class="card-datatable text-nowrap">
<table class="table" id="sale_table">
    <thead>
        <tr>
            <th></th>
            <th>بەرواری فرؤشتن</th>
            <th>کۆد</th>
            <th>دۆخ</th>
            <th>ژمارەی سەرچاوە</th>
            <th>کۆی گشتی</th>
            <th>پارەی ماوە</th>
            <th>زیادکراوە لە لەلایەن</th>
            <th>کردارەکان</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<!-- add brand -->
<div class="modal fade" id="pay_now_modal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="pay_now_label">زیادکردنی بڕاند</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <div id="alert"></div>
        <form action="" id="pay_now">
                    <div class="row">
                        <input type="hidden" id="pay_code">
                        <div class="mb-3">
                            <label for="payment_amount"
                                class="form-label">تێکڕا </label>
                            <input type="text" class="form-control"
                                id="payment_amount"
                                name="payment_amount" />
                        </div>
                        <div class="mb-3">
                            <label for="payment_type"
                                class="form-label">جۆری پارەدان</label>
                            <select class="form-control" name="payment_type" id="payment_type">
                            <option value="cash">کاش</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="payment_note"
                                class="form-label">تێبینی</label>
                                <textarea name="payment_note" id="payment_note" class="form-control"></textarea>
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
</div>
</div>
<!-- add brand -->
<div class="modal modal-lg fade" id="view_payment_modal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="view_payment_label">لیستی پارەدراوەکان</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <h6>زانیاری پارەدانی پێشوو :</h6>
    <table class="table" id="view_payment_table">
        <thead class="bg-secondary">
            <tr>
                <th class="text-white">#</th>
                <th class="text-white">بەروار</th>
                <th class="text-white">جۆری پارەدان</th>
                <th class="text-white">تێبینی</th>
                <th class="text-white">پارەدان</th>
            </tr>
        </thead>
        <tbody></tbody>
        </table>
    </div>
    </div>
</div>
</div>



</div>
</div>
</div>
<!-- sale list end -->
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