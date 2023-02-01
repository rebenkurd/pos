$(document).on('submit','#company_profile',function(e){
    e.preventDefault();
    var id=$('#id').val();
    var name =$('#name').val();
    var mobile =$('#mobile').val();
    var email =$('#email').val();
    var phone =$('#phone').val();
    var gst =$('#gst').val();
    var vat =$('#vat').val();
    var pan =$('#pan').val();
    var website =$('#website').val();
    var upi_id =$('#upi_id').val();
    var bank =$('#bank').val();
    var country =$('#country').val();
    var state =$('#state').val();
    var city =$('#city').val();
    var postcode =$('#postcode').val();
    var address =$('#address').val();
    var formData = new FormData();
    formData.append("id",id);
    formData.append("name",name);id
    formData.append("mobile",mobile);
    formData.append("email",email);
    formData.append("phone",phone);
    formData.append("gst",gst);
    formData.append("vat",vat);
    formData.append("pan",pan);
    formData.append("website",website);
    formData.append("upi_id",upi_id);
    formData.append("upi_code",$('#upi_code')[0].files[0]);
    formData.append("bank",bank);
    formData.append("country",country);
    formData.append("state",state);
    formData.append("city",city);
    formData.append("postcode",postcode);
    formData.append("address",address);
    formData.append("logo",$('#logo')[0].files[0]);
    formData.append("edit",true);
//     if(name=="" && unit=="" && status=="" && debt=="" && category=="" && price=="" && tax=="" && tax_type=="" && purchase_price=="" && profit_margin=="" && sales_price=="" && final_price==""){
//       $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەکان پربکەرەوە </div>');
//       try{
//           $("#alert").show();
//       }catch(e){
//           console.log(e);
//       }
//       $("#alert").fadeOut(4000);
//   }else if(name == ''){
//       $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی بەرهەم بنوسە</div>');
//       try{
//           $("#alert").show();
//       }catch(e){
//           console.log(e);
//       }
//       $("#alert").fadeOut(4000);
//   }else if(name.length<3){
//       $("#alert").html('<div class="alert alert-warning" role="alert">تکایە بە ناوی بەرهەم لە سێ پیت کەمتر نەبێ</div>');
//       try{
//           $("#alert").show();
//       }catch(e){
//           console.log(e);
//       }
//       $("#alert").fadeOut(4000);
//   }else if(status==""){
//       $("#alert").html('<div class="alert alert-danger" role="alert">تکایە دۆخێک هەڵبژیرە</div>');
//       try{
//           $("#alert").show();
//       }catch(e){
//           console.log(e);
//       }
//       $("#alert").fadeOut(4000);
//   }else if(debt == ""){
//       $("#alert").html('<div class="alert alert-danger" role="alert">خانەی قەرزت بیرچوو</div>');
//       try{
//           $("#alert").show();
//       }catch(e){
//           console.log(e);
//       }
//       $("#alert").fadeOut(4000);
//   }else if(category==""){
//       $("#alert").html('<div class="alert alert-danger" role="alert">تکایە جۆرێک هەڵبژیرە</div>');
//       try{
//           $("#alert").show();
//       }catch(e){
//           console.log(e);
//       }
//       $("#alert").fadeOut(4000);
//   }
//   else if(price == ""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی بەرهەم بنوسە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
//   else if(tax == ""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە باجێک هەڵبژێرە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
//   else if(tax_type == ""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە جۆرێکی باج هەڵبژێرە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
//   else if(purchase_price == ""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با نرخی کڕین بەتاڵ نەبێ</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
//   else if(isNaN(purchase_price)){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با نرخی کڕین بەتاڵ نەبێ</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
//   else if(profit_margin == ""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ڕێژەی قازانج بنووسە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
//   else if(sales_price == ""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی فرۆشتن بنووسە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
//   else if(isNaN(sales_price)){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی فرۆشتن بنووسە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
//   else if(final_price == ""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی کۆتای بنووسە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
//   else if(isNaN(final_price)){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی کۆتای بنووسە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }else{
    $.ajax({
        url:"company_profile_api.php",
        type:"POST",
        data:formData,
        contentType: false,
        processData: false,
            success:function(data){
                var json = JSON.parse(data);
                var success=json.success;
                if(success=='true'){
                $('#company_profile').load();
            }else{
                $("#alert").html('<div class="alert alert-danger" role="alert">هەڵەیەک ڕویدا تکایە دووبارەی بکەرەوە</div>');
                try{
                    $("#alert").show();
                }catch(e){
                    console.log(e);
                }
                $("#alert").fadeOut(4000);
            }
        }
    })
// }
})
