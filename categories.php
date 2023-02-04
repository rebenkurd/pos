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


    <!-- Category list start -->
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-datatable text-nowrap">
          <table class=" table" id="category_table">
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
          <!-- edit category -->
          <div class="modal fade" id="edit_category_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="edit_category_label">گۆڕانکاری</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="_alert"></div>
                  <form action="" id="edit_category">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                      <label for="ecategory_name" class="form-label">ناوی جۆر <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="ecategory_name" name="ecategory_name"
                        placeholder="ناوی جۆر بنووسە..." />
                    </div>
                    <div class="mb-3">
                      <label for="ecategory_status" class="form-label">دۆخ <span class="text-danger">*</span></label>
                      <select name="ecategory_status" id="ecategory_status" class="form-control">
                        <option value="">تکایە دۆخێک هەڵبژێرە</option>
                        <option value="0">چالاکە</option>
                        <option value="1">ناچالاکە</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="ecategory_desc" class="form-label"></label>
                      <textarea name="ecategory_desc" maxlength="100" id="ecategory_desc" class="form-control"></textarea>
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

          <!-- add category -->
          <div class="modal fade" id="add_category_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="add_category_label">زیادکردنی جۆر</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div id="alert"></div>
                  <form action="" id="add_category">
                    <div class="mb-3">
                      <label for="category_name" class="form-label">ناوی جۆر <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="category_name" name="category_name"
                        placeholder="ناوی جۆر بنووسە..." />
                    </div>
                    <div class="mb-3">
                      <label for="category_status" class="form-label">دۆخ <span class="text-danger">*</span></label>
                      <select name="category_status" id="category_status" class="form-control">
                        <option value="">تکایە دۆخێک هەڵبژێرە</option>
                        <option value="0">چالاکە</option>
                        <option value="1">ناچالاکە</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="category_desc" class="form-label">باسکردن</label>
                      <textarea name="category_desc" id="category_desc" maxlength="100" class="form-control"></textarea>
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
    <!-- Category list end -->
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

