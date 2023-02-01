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
                <div class="card p-3">
                    <h5 class="m-2">زانیاری کۆمپانیا</h5>
                    <hr>
                    <form action="" id="company_profile">
                        <?php 
                        $company=CompanyProfile::singleFetch(1);
                        ?>
                    <input type="hidden" name="id" id="id" value="<?php echo $company->id;?>">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                                <label for="name"
                                    class="form-label">ناوی
                                    کۆمپانیا<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="name" name="name" value="<?php echo $company->name;?>"
                                    placeholder="ناوی کۆمپانیا بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="mobile"
                                    class="form-label">مۆبایل<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="mobile" name="mobile" value="<?php echo $company->mobile;?>"
                                    placeholder="ژمارە مۆبایل بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="email"
                                    class="form-label">ئیمەیڵ<span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control"
                                    id="email" name="email" value="<?php echo $company->email;?>"
                                    placeholder="ئیمەیڵ بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="phone"
                                    class="form-label">تەلەفۆن<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="phone" name="phone" value="<?php echo $company->phone;?>"
                                    placeholder="ژمارە تەلەفۆن بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="gst"
                                    class="form-label">ژمارەی GST</label>
                                <input type="text" class="form-control"
                                    id="gst" name="gst" value="<?php echo $company->gst;?>"
                                    placeholder="ژمارەی GST بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="vat"
                                    class="form-label">ژمارەی VAT</label>
                                <input type="text" class="form-control"
                                    id="vat" name="vat" value="<?php echo $company->vat;?>"
                                    placeholder="ژمارەی VAT بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="pan"
                                    class="form-label">ژمارەی PAN</label>
                                <input type="text" class="form-control"
                                    id="pan" name="pan" value="<?php echo $company->pan;?>"
                                    placeholder="ژمارەی PAN بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="website"
                                    class="form-label">ماڵپەڕ</label>
                                <input type="text" class="form-control"
                                    id="website" name="website" value="<?php echo $company->website;?>"
                                    placeholder="ماڵپەڕ بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="upi_id"
                                    class="form-label">UPI</label>
                                <input type="text" class="form-control"
                                    id="upi_id" name="upi_id" value="<?php echo $company->upi_id;?>"
                                    placeholder="UPI بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="upi_code"
                                    class="form-label">UPI كۆد</label>
                                <input type="file" class="form-control" value=""
                                    id="upi_code" name="upi_code"/>
                                    <img src="assets/img/company_profile/<?php echo $company->upi_code;?>" alt="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                                <label for="bank"
                                    class="form-label">زنیاری بانک</label>
                                <textarea name="bank" id="bank" class="form-control"><?php echo $company->bank;?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="country"
                                    class="form-label">وڵات</label>
                                <input type="text" class="form-control"
                                    id="country" name="country" value="<?php echo $company->country;?>"
                                    placeholder="وڵات بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="state"
                                    class="form-label">هەرێم</label>
                                <input type="text" class="form-control"
                                    id="state" name="state" value="<?php echo $company->state;?>"
                                    placeholder="هەرێم بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="city"
                                    class="form-label">شار</label>
                                <input type="text" class="form-control"
                                    id="city" name="city" value="<?php echo $company->city;?>"
                                    placeholder="شار بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="postcode"
                                    class="form-label">پۆستکۆد</label>
                                <input type="text" class="form-control"
                                    id="postcode" name="postcode" value="<?php echo $company->postcode;?>"
                                    placeholder="پۆستکۆد بنووسە..." />
                            </div>
                            <div class="mb-3">
                                <label for="address"
                                    class="form-label">ناونیشان</label>
                                <textarea name="address" id="address" class="form-control"><?php echo $company->address;?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="logo"
                                    class="form-label">لۆگۆی کۆمپانیا</label>
                                <input type="file" class="form-control" name="logo" id="logo">
                            </div>
                            <img src="assets/img/company_profile/<?php echo $company->logo;?>" alt="" class="img-thumbnail">
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
            <!--/ Content -->

            <!-- Footer -->
            <?php include("includes/footer.php");?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!--/ Content wrapper -->
        </div>
        <?php include("includes/scripts.php");?>
