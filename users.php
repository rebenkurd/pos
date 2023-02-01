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

                <!-- user list start -->
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-datatable text-nowrap">
                            <table class="table" id="user_table">
                                <thead>
                                    <th>وێنە</th>
                                    <th>ناو</th>
                                    <th>ئیمەیڵ</th>
                                    <th>ژمارە مۆبایلی ١</th>
                                    <th>ژمارە مۆبایلی ٢</th>
                                    <th>ڕۆڵ</th>
                                    <th>کردارەکان</th>
                                </thead>
                                <tbody></tbody>
                            </table>

                            <!-- add user -->
                            <div class="modal fade" id="add_user_modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="add_user_label">زیادکردنی بەکارهێنەر</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div id="alert"></div>

                                            <form action="" id="add_user" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_fname" class="form-label">ناوی
                                                                سەرەتا <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="user_fname"
                                                                name="user_fname" placeholder="ناوی سەرەتا بنووسە..." />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_lname" class="form-label">ناوی کۆتا</label>
                                                            <input type="text" class="form-control" id="user_lname"
                                                                name="user_lname" placeholder="ناوی کۆتا بنووسە..." />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="user_email" class="form-label">ئیمەیڵ <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="user_email"
                                                        name="user_email" placeholder="ئیمەیڵێک بنووسە..." />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="user_role" class="form-label">ڕۆڵ <span class="text-danger">*</span></label>
                                                    <select name="user_role" id="user_role" class="form-control">
                                                        <option value="">تکایە ڕۆڵێک هەڵبژێرە</option>
                                                        <option value="1">admin</option>
                                                        <option value="2">casher</option>
                                                        <?php 
                          // $role="SELECT * FROM roles";
                          // $res=$conn->query($role);
                          // if(mysqli_num_rows($res)>0){
                          //   while($rows=mysqli_fetch_assoc($res)){
                          //     echo '<option value="'.$rows['id'].'">'.$rows['name'].'</option>';
                          //   }
                          // }
                        ?>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_phone1" class="form-label">ژمارە مۆبایلی
                                                                یەکەم <span class="text-danger">*</span></label>
                                                            <input type="tel" class="form-control" id="user_phone1"
                                                                name="user_phone1"
                                                                placeholder="ژمارە مۆبایلی یەکەم بنووسە..." />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_phone2" class="form-label">ژمارە مۆبایلی
                                                                دووەم</label>
                                                            <input type="tel" class="form-control" id="user_phone2"
                                                                name="user_phone2"
                                                                placeholder="ژمارە مۆبایلی دووەم بنووسە..." />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_password" class="form-label">وشەی
                                                                تێپەڕ <span class="text-danger">*</span></label>
                                                            <input type="password" class="form-control"
                                                                id="user_password" name="user_password"
                                                                placeholder="وشەی تێپەڕ بنووسە..." />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="user_cpassword" class="form-label">وشەی تێپەڕ
                                                                دڵنیای <span class="text-danger">*</span></label>
                                                            <input type="password" class="form-control"
                                                                id="user_cpassword" name="user_cpassword"
                                                                placeholder="وشەی تێپەڕ دڵنیای بنووسە..." />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="user_address" class="form-label">ناونیشان</label>
                                                    <input type="text" id="user_address" name="user_address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                    <label for="user_image" class="form-label">وێنە</label>
                                                    <input type="file" id="user_image" name="user_image" multiple
                                                        class="form-control">
                                                </div>
                                            </div>
                                                <div class="mb-3">
                                                    <label for="user_bio" class="form-label">دەربارە</label>
                                                    <textarea name="user_bio" maxlength="100" id="user_bio"
                                                        class="form-control"></textarea>
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
                            <!-- edit user -->
                            <div class="modal fade" id="edit_user_modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_user_label">گۆڕانکاری</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="alert"></div>
                                            <form action="" id="edit_user">
                                                <input type="hidden" name="id" id="id">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="euser_fname" class="form-label">ناوی
                                                                سەرەتا <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="euser_fname"
                                                                name="euser_fname"
                                                                placeholder="ناوی سەرەتا بنووسە..." />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="euser_lname" class="form-label">ناوی
                                                                کۆتا</label>
                                                            <input type="text" class="form-control" id="euser_lname"
                                                                name="euser_lname" placeholder="ناوی کۆتا بنووسە..." />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="euser_email" class="form-label">ئیمەیڵ <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="euser_email"
                                                        name="euser_email" placeholder="ئیمەیڵێک بنووسە..." />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="euser_role" class="form-label">ڕۆڵ <span class="text-danger">*</span></label>
                                                    <select name="euser_role" id="euser_role" class="form-control">
                                                        <option value="">تکایە ڕۆڵێک هەڵبژێرە</option>
                                                        <option value="1">admin</option>
                                                        <option value="2">casher</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="euser_phone1" class="form-label">ژمارە مۆبایلی
                                                                یەکەم <span class="text-danger">*</span></label>
                                                            <input type="tel" class="form-control" id="euser_phone1"
                                                                name="euser_phone1"
                                                                placeholder="ژمارە مۆبایلی یەکەم بنووسە..." />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="euser_phone2" class="form-label">ژمارە مۆبایلی
                                                                دووەم</label>
                                                            <input type="tel" class="form-control" id="euser_phone2"
                                                                name="euser_phone2"
                                                                placeholder="ژمارە مۆبایلی دووەم بنووسە..." />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="euser_password" class="form-label">وشەی
                                                                تێپەڕ <span class="text-danger">*</span></label>
                                                            <input type="password" class="form-control"
                                                                id="euser_password" name="euser_password"
                                                                placeholder="وشەی تێپەڕ بنووسە..." />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="euser_cpassword" class="form-label">وشەی تێپەڕ
                                                                دڵنیای <span class="text-danger">*</span></label>
                                                            <input type="password" class="form-control"
                                                                id="euser_cpassword" name="euser_cpassword"
                                                                placeholder="وشەی تێپەڕ دڵنیای بنووسە..." />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="euser_address" class="form-label">ناونیشان</label>
                                                    <textarea name="euser_address" id="euser_address"
                                                        class="form-control"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="euser_bio" class="form-label">دەربارە</label>
                                                    <textarea name="euser_bio" id="euser_bio"
                                                        class="form-control" maxlength="100"></textarea>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Content -->
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

