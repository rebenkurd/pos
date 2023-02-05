
$(document).ready(function(){
  $('#purchase_table').DataTable({
    "fnCreatedRow": function(nRow,aData,iDataIndex){
        $(nRow).attr('id',aData[0]);
    },
    processing: true,
    serverSide: true,
    pagin:true,
    order:[],
    responsive: true,
    ajax: {
        url:'purchase_api.php',
        type: 'POST',
        data:{
            fetch:true,
        }
    },
    columns: [
        { data: 0 },
        { data: 1 },
        { data: 2 },
        { data: 3 },
        { data: 4 },
        { data: 5 },
        { data: 6 },
        { data: 7 },
        { data: 8 },

    ],
    columnDefs: [{
          targets: 8,
          searchable: false,
          orderable: false,
          visible: true
      },
    {
      // For Checkboxes
      targets: 0,
      orderable: false,
      searchable: false,
      responsivePriority: 3,
      checkboxes: true,
      render: function (id) {
        return '<input type="checkbox" id="check" name="check[]" value="'+id+'" class="dt-checkboxes form-check-input">';
      },
      checkboxes: {
        selectAllRender: '<input type="checkbox" id="check_all" class="form-check-input">'
      }
    },
  ],
  dom: '<"card-header flex-column flex-md-row"<"head-label text-center" <"purchase">><"dt-action-buttons text-end pt-3 pt-md-0"<"delete_all_purchase"B>>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
displayLength:10,
lengthMenu: [5, 10, 25, 50, 75, 100,250,500,750,1000],    
buttons: [
  {
    extend: 'collection',
    className: 'btn btn-label-primary dropdown-toggle me-2',
    text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
    buttons: [
      {
        extend: 'print',
        text: '<i class="ti ti-printer me-1" ></i>چاپکردن',
        className: 'dropdown-item',
        exportOptions: {
          columns: [1,2,3,4,5,6,7],
          // prevent avatar to be display
          format: {
            body: function (inner, coldex, rowdex) {
              if (inner.length <= 0) return inner;
              var el = $.parseHTML(inner);
              var result = '';
              $.each(el, function (index, item) {
                if (item.classList !== undefined && item.classList.contains('user-name')) {
                  result = result + item.lastChild.firstChild.textContent;
                } else if (item.innerText === undefined) {
                  result = result + item.textContent;
                } else result = result + item.innerText;
              });
              return result;
            }
          }
        },
        purchaseize: function (win) {
          //purchaseize print view for dark
          $(win.document.body)
            .css('color', config.colors.headingColor)
            .css('border-color', config.colors.borderColor)
            .css('background-color', config.colors.bodyBg);
          $(win.document.body)
            .find('table')
            .addClass('compact')
            .css('color', 'inherit')
            .css('border-color', 'inherit')
            .css('background-color', 'inherit');
        }
      },
      {
        extend: 'csv',
        text: '<i class="ti ti-file-text me-1" ></i>Csv',
        className: 'dropdown-item',
        exportOptions: {
          columns: [1,2,3,4,5,6,7],
          // prevent avatar to be display
          format: {
            body: function (inner, coldex, rowdex) {
              if (inner.length <= 0) return inner;
              var el = $.parseHTML(inner);
              var result = '';
              $.each(el, function (index, item) {
                if (item.classList !== undefined && item.classList.contains('user-name')) {
                  result = result + item.lastChild.firstChild.textContent;
                } else if (item.innerText === undefined) {
                  result = result + item.textContent;
                } else result = result + item.innerText;
              });
              return result;
            }
          }
        }
      },
      {
        extend: 'excel',
        text: 'Excel',
        className: 'dropdown-item',
        exportOptions: {
          columns: [1,2,3,4,5,6,7],
          // prevent avatar to be display
          format: {
            body: function (inner, coldex, rowdex) {
              if (inner.length <= 0) return inner;
              var el = $.parseHTML(inner);
              var result = '';
              $.each(el, function (index, item) {
                if (item.classList !== undefined && item.classList.contains('user-name')) {
                  result = result + item.lastChild.firstChild.textContent;
                } else if (item.innerText === undefined) {
                  result = result + item.textContent;
                } else result = result + item.innerText;
              });
              return result;
            }
          }
        }
      },
      {
        extend: 'pdf',
        text: '<i class="ti ti-file-description me-1"></i>Pdf',
        className: 'dropdown-item',
        exportOptions: {
          columns: [1,2,3,4,5,6,7],
          // prevent avatar to be display
          format: {
            body: function (inner, coldex, rowdex) {
              if (inner.length <= 0) return inner;
              var el = $.parseHTML(inner);
              var result = '';
              $.each(el, function (index, item) {
                if (item.classList !== undefined && item.classList.contains('user-name')) {
                  result = result + item.lastChild.firstChild.textContent;
                } else if (item.innerText === undefined) {
                  result = result + item.textContent;
                } else result = result + item.innerText;
              });
              return result;
            }
          }
        }
      },
      {
        extend: 'copy',
        text: '<i class="ti ti-copy me-1" ></i>کۆپی',
        className: 'dropdown-item',
        exportOptions: {
          columns: [1,2,3,4,5,6,7],
          // prevent avatar to be display
          format: {
            body: function (inner, coldex, rowdex) {
              if (inner.length <= 0) return inner;
              var el = $.parseHTML(inner);
              var result = '';
              $.each(el, function (index, item) {
                if (item.classList !== undefined && item.classList.contains('user-name')) {
                  result = result + item.lastChild.firstChild.textContent;
                } else if (item.innerText === undefined) {
                  result = result + item.textContent;
                } else result = result + item.innerText;
              });
              return result;
            }
          }
        }
      },

  ],
  }
],

});

  $('div.purchase').html('<h5 class="card-title mb-0">لیستی کڕینەکان</h5>');
  $('div.delete_all_purchase div.dt-buttons').append('<button type="button" class="btn btn-danger waves-effect waves-light me-3" onclick="deleteAllPurchase()" id="delete_all" ><i class="ti ti-trash"></i></button>');
})


  $(document).on('submit','#add_purchase',
function(e){
    e.preventDefault();
    var pay_amount =$('#purchase_payment_amount').val();
    var purchase_code =$('#purchase_code').val();
    var supplier_id =$('#supplier_id').val();
    var purchase_date =$('#purchase_date').val();
    var supplier_status =$('#supplier_status').val();
    var purchase_ref_num =$('#purchase_ref_num').val();
    var total_quantity =parseInt($('#total_quantity').text());
    var tax =$('#tax').val();
    var tax_amount =$('#tax_amount').val();
    var discount =$('#discount').val();
    var purchase_note =$('#purchase_note').val();
    var total_price =parseFloat($('#total_price').text());
    var other_charges =parseFloat($('#other_charges').text());
    var discount_all =parseFloat($('#discount_all').text());
    var grand_total =parseFloat($('#gtotal').text());
    var rows=$('#item_table tbody tr');

    if(rows.length>0){
    $.ajax({
        url:"purchase_api.php",
        type:"POST",
        data:{
            pay_amount:parseFloat(pay_amount),
            purchase_code:purchase_code,
            supplier_id:supplier_id,
            purchase_date:purchase_date,
            supplier_status:supplier_status,
            purchase_ref_num:purchase_ref_num,
            total_quantity:total_quantity,
            tax:tax,
            tax_amount:parseFloat(tax_amount),
            discount:discount,
            purchase_note:purchase_note,
            total_price:parseFloat(total_price),
            other_charges:other_charges,
            discount_all:parseFloat(discount_all),
            grand_total:parseFloat(grand_total),
            add:true
        },
        success:function(data){
            var json = JSON.parse(data);
            var success = json.success;
            if(success=="true"){
                $("#add_purchase")[0].reset();
                $("#item_table tbody tr").remove();
                window.location.href="invoice.php?id="+purchase_code;
                console.log("success");
            }else{
                console.log("failed");
            }
        }
    })
    }else{
        $("#alert").html('<div class="alert alert-danger" role="alert">کاڵا هەڵبژێرە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    };
}
)

// $("#purchase_table").on('click','.edit_btn_purchase',function(event){
//     var trid = $(this).closest('tr').attr('id');
//     $('#edit_purchase_modal').modal('show');
//     var id=$(this).data('id');
//     $.ajax({
//         url:"purchase_api.php",
//         data:{
//             id:id,
//             get:true
//         },
//         type:"POST",
//         success:function(data){
//             var json = JSON.parse(data);
//             $('#epurchase_name').val(json.name);
//             $('#epurchase_barcode').val(json.barcode);
//             $('#epurchase_qty').val(json.quantity);
//             $('#epurchase_price').val(json.price);
//             $('#epurchase_status').val(json.status);
//             $('#epurchase_debt').val(json.debt);
//             $('#epurchase_category').val(json.category);
//             $('#epurchase_brand').val(json.brand);
//             $('#epurchase_mfd').val(json.mf_date);
//             $('#epurchase_exd').val(json.ex_date);
//             $('#epurchase_desc').val(json.description);
//             $('#epurchase_tax').val(json.tax);
//             $('#epurchase_unit').val(json.unit);
//             $('#epurchase_tax_type').val(json.tax_type);
//             $('#epurchase_purchase_price').val(json.total_price_tax);
//             $('#epurchase_profit_margin').val(json.profit_margin);
//             $('#epurchase_sales_price').val(json.sales_price);
//             $('#epurchase_final_price').val(json.final_price);
//             $('#epurchase_discount').val(json.discount);
//             $('#epurchase_discount_type').val(json.discount_type);
//             $('#id').val(json.id);
//             $('#trid').val(trid);
//       }
//     })
//     })


    
$(document).on('submit','#edit_purchase',function(e){
    e.preventDefault();
    var pay_amount =$('#purchase_payment_amount').val();
    var purchase_id =$('#purchase_id').val();
    var supplier_id =$('#supplier_id').val();
    var purchase_date =$('#purchase_date').val();
    var supplier_status =$('#supplier_status').val();
    var purchase_ref_num =$('#purchase_ref_num').val();
    var total_quantity =parseInt($('#total_quantity').text());
    var tax =$('#tax').val();
    var tax_amount =$('#tax_amount').val();
    var discount =$('#discount').val();
    var purchase_note =$('#purchase_note').val();
    var total_price =parseFloat($('#total_price').text());
    var other_charges =parseFloat($('#other_charges').text());
    var discount_all =parseFloat($('#discount_all').text());
    var grand_total =parseFloat($('#gtotal').text());
    var rows=$('#item_table tbody tr');

  if(rows.length>0){
    $.ajax({
        url:"purchase_api.php",
        type:"POST",
        data:{
          pay_amount:parseFloat(pay_amount),
          supplier_id:supplier_id,
          purchase_id:purchase_id,
          purchase_date:purchase_date,
          supplier_status:supplier_status,
          purchase_ref_num:purchase_ref_num,
          total_quantity:total_quantity,
          tax:tax,
          tax_amount:parseFloat(tax_amount),
          discount:discount,
          purchase_note:purchase_note,
          total_price:parseFloat(total_price),
          other_charges:other_charges,
          discount_all:parseFloat(discount_all),
          grand_total:parseFloat(grand_total),
          edit:true
        },
            success:function(data){
                var json = JSON.parse(data);
                var success=json.success;
                if(success=='true'){
                  console.log("success");
            }else{
              console.log("error");
            }
        }
    })
}
})



$(document).on('click','.delete_purchase',function(event){
    var table=$('#purchase_table').DataTable();
    event.preventDefault();
    var id=$(this).data('id');
  if(confirm("دڵنیایت لە سرینەوەی؟")){
      $.ajax({
        url:'purchase_api.php',
        data:{
            id:id,
            delete:true
        },
        type:'POST',
        success:function(data){
          mytable = $('#purchase_table').DataTable();
          mytable.draw();
      }
       
    }) }
})


//   // for edit 
// $(function(){
//   // function to calculate price by tax and tax type
// function calculatePrice(originalPrice, taxRate, taxType) {
//     originalPrice = parseFloat(originalPrice);
//     taxRate = parseFloat(taxRate);
//     if (taxType === "inclusive") {
//       return originalPrice / (1 + (taxRate / 100));
//     } else if(taxType !== ""){
//       return originalPrice + (originalPrice * (taxRate / 100));
//     }
//   }

//   // function to fetch purchase price by tax
//   function fetchPurchasePrice(originalPrice, taxRate, taxType) {
//     return calculatePrice(originalPrice, taxRate, taxType);
//   }

//   // function to calculate sales price by profit margin
//   function calculateSalesPrice(purchasePrice, profitMargin) {
//     purchasePrice = parseFloat(purchasePrice);
//     profitMargin = parseFloat(profitMargin);
//     return purchasePrice + (purchasePrice * (profitMargin / 100));
//   }

  
//   $("#purchase_price, #purchase_tax, #purchase_tax_type, #purchase_profit_margin").on("change", function() {
//       var originalPrice = $("#purchase_price").val();
//       var taxRate = $("#purchase_tax").val();
//       var taxType = $("#purchase_tax_type").val();
//       var profitMargin = $("#purchase_profit_margin").val();
//       fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin);
//     });

//     // function to fetch final price by tax and profit margin
//     function fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin) {
//       var purchasePrice = fetchPurchasePrice(originalPrice, taxRate, taxType);
//       var salesPrice = calculateSalesPrice(purchasePrice, profitMargin);
//       $("#purchase_purchase_price").val(purchasePrice.toFixed(2));
//       $("#purchase_sales_price").val(salesPrice.toFixed(2));
//       $("#purchase_final_price").val((salesPrice + (salesPrice * (taxRate / 100))).toFixed(2));
//     }

//     $("#purchase_sales_price").on("change", function() {
//         var taxRate = $("#purchase_tax").val();
//         var salesPrice = $("#purchase_sales_price").val();
//         var finalPrice = salesPrice + (salesPrice * (taxRate / 100));
//         $("#purchase_final_price").val(finalPrice.toFixed(2));
//       });


//     })


//     // for edit 
// $(function(){
// // function to calculate price by tax and tax type
// function calculatePrice(originalPrice, taxRate, taxType) {
//     originalPrice = parseFloat(originalPrice);
//     taxRate = parseFloat(taxRate);
//     if (taxType === "inclusive") {
//       return originalPrice / (1 + (taxRate / 100));
//     } else if(taxType !== ""){
//       return originalPrice + (originalPrice * (taxRate / 100));
//     }
//   }

//   // function to fetch purchase price by tax
//   function fetchPurchasePrice(originalPrice, taxRate, taxType) {
//     return calculatePrice(originalPrice, taxRate, taxType);
//   }

//   // function to calculate sales price by profit margin
//   function calculateSalesPrice(purchasePrice, profitMargin) {
//     purchasePrice = parseFloat(purchasePrice);
//     profitMargin = parseFloat(profitMargin);
//     return purchasePrice + (purchasePrice * (profitMargin / 100));
//   }

  
//   $("#epurchase_price, #epurchase_tax, #epurchase_tax_type, #epurchase_profit_margin").on("change", function() {
//       var originalPrice = $("#epurchase_price").val();
//       var taxRate = $("#epurchase_tax").val();
//       var taxType = $("#epurchase_tax_type").val();
//       var profitMargin = $("#epurchase_profit_margin").val();
//       fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin);
//     });

//     // function to fetch final price by tax and profit margin
//     function fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin) {
//       var purchasePrice = fetchPurchasePrice(originalPrice, taxRate, taxType);
//       var salesPrice = calculateSalesPrice(purchasePrice, profitMargin);
//       $("#epurchase_purchase_price").val(purchasePrice.toFixed(2));
//       $("#epurchase_sales_price").val(salesPrice.toFixed(2));
//       $("#epurchase_final_price").val((salesPrice + (salesPrice * (taxRate / 100))).toFixed(2));
//     }

//     $("#epurchase_sales_price").on("change", function() {
//         var taxRate = $("#epurchase_tax").val();
//         var salesPrice = $("#epurchase_sales_price").val();
//         var finalPrice = salesPrice + (salesPrice * (taxRate / 100));
//         $("#epurchase_final_price").val(finalPrice.toFixed(2));
//       });
//     })




    
// $(document).on('submit','#add_purchase_category',
// function(e){
//     e.preventDefault();
//     var name =$('#purchase_category_name').val();
//     var description =$('#purchase_category_desc').val();
//     var status =$('#purchase_category_status').val();
//     if(name=="" && status==""){
//         $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەی ناو و دۆخ پربکەرەوە </div>');
//         try{
//             $("#alert").show();
//         }catch(e){
//             console.log(e);
//         }
//         $("#alert").fadeOut(4000);
//     }else if(name == ''){
//         $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی جۆر بنوسە</div>');
//         try{
//             $("#alert").show();
//         }catch(e){
//             console.log(e);
//         }
//         $("#alert").fadeOut(4000);
//     }else if(name.length<3){
//         $("#alert").html('<div class="alert alert-danger" role="alert">تکایە بە ناوی جۆر لە سێ پیت کەمتر نەبێ</div>');
//         try{
//             $("#alert").show();
//         }catch(e){
//             console.log(e);
//         }
//         $("#alert").fadeOut(4000);
//     }else if(status==""){
//         $("#alert").html('<div class="alert alert-danger" role="alert">تکایە دۆخێک هەڵبژیرە</div>');
//         try{
//             $("#alert").show();
//         }catch(e){
//             console.log(e);
//         }
//         $("#alert").fadeOut(4000);
//     }else{
//     $.ajax({
//         url:"category_api.php",
//         type:"POST",
//         data:{
//             name:name,
//             description:description,
//             status:status,
//             add:true
//         },
//         success:function(data){
//             var json = JSON.parse(data);
//             var success = json.success;
//             if(success=="true"){
//                 $("#alert").html('<div class="alert alert-success" role="alert">بەسەرکەوتووی زیادکرا</div>');
//                 try{
//                     $("#alert");
//                 }catch(e){
//                     console.log(e);
//                 }
//                 $("#alert").fadeOut(4000); 
//                 $('#add_purchase').load("purchases.php #add_purchase");
//               }else{
//                 $("#alert").html('<div class="alert alert-danger" role="alert">هەڵەیەک ڕویدا تکایە دووبارەی بکەرەوە</div>');
//                 try{
//                     $("#alert").show();
//                 }catch(e){
//                     console.log(e);
//                 }
//                 $("#alert").fadeOut(4000);
//                 }
//         }
//     })
// }
// }
// )





// $(document).on('submit','#add_purchase_brand',
// function(e){
//     e.preventDefault();
//     var name=$('#purchase_brand_name').val();
//     var status=$('#purchase_brand_status').val();
//     var description=$('#purchase_brand_desc').val();

//     if(name=="" && status==""){
//         $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەکان پربکەرەوە </div>');
//         try{
//             $("#alert").show();
//         }catch(e){
//             console.log(e);
//         }
//         $("#alert").fadeOut(4000);
//     }else if(name == ''){
//         $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی بڕاند بنوسە</div>');
//         try{
//             $("#alert").show();
//         }catch(e){
//             console.log(e);
//         }
//         $("#alert").fadeOut(4000);
//     }else if(name.length<3){
//         $("#alert").html('<div class="alert alert-warning" role="alert">تکایە بە ناوی بڕاند لە سێ پیت کەمتر نەبێ</div>');
//         try{
//             $("#alert").show();
//         }catch(e){
//             console.log(e);
//         }
//         $("#alert").fadeOut(4000);
//     } else if(status==""){
//         $("#alert").html('<div class="alert alert-danger" role="alert">تکایە دۆخێک هەڵبژیرە</div>');
//         try{
//             $("#alert").show();
//         }catch(e){
//             console.log(e);
//         }
//         $("#alert").fadeOut(4000);
//     }
//     else {
//     $.ajax({
//         url:'brand_api.php',
//         type:"POST",
//         data:{
//             name:name,
//             status:status,
//             description:description,
//             add:true
//         },
//         success:function(data){
//             var json = JSON.parse(data);
//             var success = json.success;

//             if(success=="true"){
//                 $("#alert").html('<div class="alert alert-success" role="alert">بەسەرکەوتووی زیادکرا</div>');
//                 try{
//                     $("#alert").show();
//                 }catch(e){
//                     console.log(e);
//                 }
//                 $("#alert").fadeOut(4000); 
//                 $('#add_purchase').load("purchases.php #add_purchase");
//                }else{
//                 $("#alert").html('<div class="alert alert-danger" role="alert">هەڵەیەک ڕویدا تکایە دووبارەی بکەرەوە</div>');
//                 try{
//                     $("#alert").show();
//                 }catch(e){
//                     console.log(e);
//                 }
//                 $("#alert").fadeOut(4000);
//                 }
//         }
//     })
// }
// }
// )

function deleteAllPurchase(){
  var checked=$('#check[name="check[]"]').filter(':checked');
  var checked_id=new Array();
  checked.each(function(){
      checked_id.push($(this).val());
  });
  for (let i = 0; i < checked_id.length; i++) {
  $.ajax({
      url: 'purchase_api.php',
      type: 'POST',
      data: {
          id:checked_id[i],
          delete:true
      },success: function(data){
        mytable = $('#purchase_table').DataTable();
        mytable.draw();
      }
  })
}
}