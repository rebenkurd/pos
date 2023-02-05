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


    <!-- brand list start -->
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-datatable text-nowrap">
          <table class="table" id="brand_table">
            <thead>
              <tr>
                <th></th>
                <th>ناو</th>
                <th>دەربارە</th>
                <th>دۆخ</th>
                <th>کردارەکان</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>


          <!-- edit brand -->
          <div class="modal fade" id="edit_brand_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="edit_brand_label">گۆڕانکاری</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div id="alert"></div>
                  <form action="" id="edit_brand">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                          <label for="ebrand_name" class="form-label">ناوی بڕاند <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="ebrand_name" name="ebrand_name" placeholder="ناوی ىڕاند بنووسە..." />
                        </div>

                      <div class="mb-3">
                      <label for="ebrand_status" class="form-label">دۆخ <span class="text-danger">*</span></label>
                      <select name="ebrand_status" id="ebrand_status" class="form-control">
                        <option value="">تکایە دۆخێک هەڵبژێرە</option>
                        <option value="0">چالاکە</option>
                        <option value="1">ناچالاکە</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="ebrand_desc" class="form-label">باسکردن</label>
                      <textarea name="ebrand_desc" id="ebrand_desc" maxlength="100" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 text-center">
                      <button type="submit" class="btn btn-primary">پاشەکەوتکردن</button>
                      <button type="reset" class="btn btn-secondary">پاکردنەوە</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- add brand -->
          <div class="modal fade" id="add_brand_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="add_brand_label">زیادکردنی بڕاند</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div id="alert"></div>
                  <form action="" id="add_brand">
                        <div class="mb-3">
                          <label for="brand_name" class="form-label">ناوی بڕاند <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="ناوی ىڕاند بنووسە..." />
                        </div>
                      <div class="mb-3">
                      <label for="brand_status" class="form-label">دۆخ <span class="text-danger">*</span></label>
                      <select name="brand_status" id="brand_status" class="form-control">
                        <option value="">تکایە دۆخێک هەڵبژێرە</option>
                        <option value="0">چالاکە</option>
                        <option value="1">ناچالاکە</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="brand_desc" class="form-label">باسکردن</label>
                      <textarea name="brand_desc" maxlength="100" id="brand_desc" class="form-control"></textarea>
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
    <!-- brand list end -->
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

