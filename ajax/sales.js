
$(document).ready(function(){
    $('#sale_table').DataTable({
      "fnCreatedRow": function(nRow,aData,iDataIndex){
          $(nRow).attr('id',aData[0]);
      },
      processing: true,
      serverSide: true,
      pagin:true,
      order:[],
      // responsive: true,
      ajax: {
          url:'sale_api.php',
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
    dom: '<"card-header flex-column flex-md-row"<"head-label text-center" <"sale">><"dt-action-buttons text-end pt-3 pt-md-0"<"delete_all_sale"B>>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
          saleize: function (win) {
            //saleize print view for dark
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
  
    $('div.sale').html('<h5 class="card-title mb-0">لیستی فرۆشتنەکان</h5>');
    $('div.delete_all_sale div.dt-buttons').append('<button type="button" class="btn btn-danger waves-effect waves-light me-3" onclick="deleteAllSale()" id="delete_all" ><i class="ti ti-trash"></i></button>');
  })
  
  
    $(document).on('submit','#add_sale',
  function(e){
      e.preventDefault();
      var pay_amount =$('#sale_payment_amount').val();
      var code =$('#code').val();
      var supplier_id =$('#supplier_id').val();
      var sale_date =$('#sale_date').val();
      var supplier_status =$('#supplier_status').val();
      var sale_ref_num =$('#sale_ref_num').val();
      var total_quantity =parseInt($('#total_quantity').text());
      var tax =$('#tax').val();
      var tax_amount =$('#tax_amount').val();
      var discount =$('#discount').val();
      var sale_note =$('#sale_note').val();
      var total_price =parseFloat($('#total_price').text());
      var other_charges =parseFloat($('#other_charges').text());
      var discount_all =parseFloat($('#discount_all').text());
      var grand_total =parseFloat($('#gtotal').text());
      var rows=$('#item_table tbody tr');
  
      if(rows.length>0){
      $.ajax({
          url:"sale_api.php",
          type:"POST",
          data:{
              pay_amount:parseFloat(pay_amount),
              code:code,
              supplier_id:supplier_id,
              sale_date:sale_date,
              supplier_status:supplier_status,
              sale_ref_num:sale_ref_num,
              total_quantity:total_quantity,
              tax:tax,
              tax_amount:parseFloat(tax_amount),
              discount:discount,
              sale_note:sale_note,
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
                  $("#add_sale")[0].reset();
                  $("#item_table tbody tr").remove();
                  window.location.href="sinvoice.php?id="+code;
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
  
  // $("#sale_table").on('click','.edit_btn_sale',function(event){
  //     var trid = $(this).closest('tr').attr('id');
  //     $('#edit_sale_modal').modal('show');
  //     var id=$(this).data('id');
  //     $.ajax({
  //         url:"sale_api.php",
  //         data:{
  //             id:id,
  //             get:true
  //         },
  //         type:"POST",
  //         success:function(data){
  //             var json = JSON.parse(data);
  //             $('#esale_name').val(json.name);
  //             $('#esale_barcode').val(json.barcode);
  //             $('#esale_qty').val(json.quantity);
  //             $('#esale_price').val(json.price);
  //             $('#esale_status').val(json.status);
  //             $('#esale_debt').val(json.debt);
  //             $('#esale_category').val(json.category);
  //             $('#esale_brand').val(json.brand);
  //             $('#esale_mfd').val(json.mf_date);
  //             $('#esale_exd').val(json.ex_date);
  //             $('#esale_desc').val(json.description);
  //             $('#esale_tax').val(json.tax);
  //             $('#esale_unit').val(json.unit);
  //             $('#esale_tax_type').val(json.tax_type);
  //             $('#esale_sale_price').val(json.total_price_tax);
  //             $('#esale_profit_margin').val(json.profit_margin);
  //             $('#esale_sales_price').val(json.sales_price);
  //             $('#esale_final_price').val(json.final_price);
  //             $('#esale_discount').val(json.discount);
  //             $('#esale_discount_type').val(json.discount_type);
  //             $('#id').val(json.id);
  //             $('#trid').val(trid);
  //       }
  //     })
  //     })
  
  
      
  $(document).on('submit','#edit_sale',function(e){
      e.preventDefault();
      var pay_amount =$('#sale_payment_amount').val();
      var sale_id =$('#sale_id').val();
      var supplier_id =$('#supplier_id').val();
      var sale_date =$('#sale_date').val();
      var supplier_status =$('#supplier_status').val();
      var sale_ref_num =$('#sale_ref_num').val();
      var total_quantity =parseInt($('#total_quantity').text());
      var tax =$('#tax').val();
      var tax_amount =$('#tax_amount').val();
      var discount =$('#discount').val();
      var sale_note =$('#sale_note').val();
      var total_price =parseFloat($('#total_price').text());
      var other_charges =parseFloat($('#other_charges').text());
      var discount_all =parseFloat($('#discount_all').text());
      var grand_total =parseFloat($('#gtotal').text());
      var rows=$('#item_table tbody tr');
  
    if(rows.length>0){
      $.ajax({
          url:"sale_api.php",
          type:"POST",
          data:{
            pay_amount:parseFloat(pay_amount),
            supplier_id:supplier_id,
            sale_id:sale_id,
            sale_date:sale_date,
            supplier_status:supplier_status,
            sale_ref_num:sale_ref_num,
            total_quantity:total_quantity,
            tax:tax,
            tax_amount:parseFloat(tax_amount),
            discount:discount,
            sale_note:sale_note,
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
                  window.location.href="sinvoice.php?id="+code;
                    console.log("success");
              }else{
                console.log("error");
              }
          }
      })
  }
  })
  
  $(document).on('submit','#return_sale',function(e){
      e.preventDefault();
      var code =$('#code').val();
      var sale_id =$('#sale_id').val();
      var return_date =$('#return_date').val();
      var return_status =$('#return_status').val();
      var total_quantity =parseInt($('#total_quantity').text());
      var tax =$('#tax').val();
      var tax_amount =parseFloat($('#tax_amount').text());
      var discount =$('#discount').val();
      var sale_note =$('#sale_note').val();
      var total_price =parseFloat($('#total_price').text());
      var other_charges =parseFloat($('#other_charges').text());
      var discount_all =parseFloat($('#discount_all').text());
      var grand_total =parseFloat($('#gtotal').text());
      var rows=$('#item_table tbody tr');
  
    if(rows.length>0){
      $.ajax({
          url:"sale_api.php",
          type:"POST",
          data:{
            sale_id:sale_id,
            return_date:return_date,
            return_status:return_status,
            total_quantity:total_quantity,
            tax:tax,
            tax_amount:parseFloat(tax_amount),
            discount:discount,
            sale_note:sale_note,
            total_price:parseFloat(total_price),
            other_charges:other_charges,
            discount_all:parseFloat(discount_all),
            grand_total:parseFloat(grand_total),
            return:true
          },
              success:function(data){
                  var json = JSON.parse(data);
                  var success=json.success;
                  if(success=='true'){
                  window.location.href="return_invoice.php?id="+code;
                    console.log("success");
                  }else{
                    console.log("error");
                  }
          }
      })
  }
  })
  
  
  
  $(document).on('click','.delete_sale',function(event){
      var table=$('#sale_table').DataTable();
      event.preventDefault();
      var id=$(this).data('id');
    if(confirm("دڵنیایت لە سرینەوەی؟")){
        $.ajax({
          url:'sale_api.php',
          data:{
              id:id,
              delete:true
          },
          type:'POST',
          success:function(data){
            mytable = $('#sale_table').DataTable();
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
  
  //   // function to fetch sale price by tax
  //   function fetchsalePrice(originalPrice, taxRate, taxType) {
  //     return calculatePrice(originalPrice, taxRate, taxType);
  //   }
  
  //   // function to calculate sales price by profit margin
  //   function calculateSalesPrice(salePrice, profitMargin) {
  //     salePrice = parseFloat(salePrice);
  //     profitMargin = parseFloat(profitMargin);
  //     return salePrice + (salePrice * (profitMargin / 100));
  //   }
  
    
  //   $("#sale_price, #sale_tax, #sale_tax_type, #sale_profit_margin").on("change", function() {
  //       var originalPrice = $("#sale_price").val();
  //       var taxRate = $("#sale_tax").val();
  //       var taxType = $("#sale_tax_type").val();
  //       var profitMargin = $("#sale_profit_margin").val();
  //       fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin);
  //     });
  
  //     // function to fetch final price by tax and profit margin
  //     function fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin) {
  //       var salePrice = fetchsalePrice(originalPrice, taxRate, taxType);
  //       var salesPrice = calculateSalesPrice(salePrice, profitMargin);
  //       $("#sale_sale_price").val(salePrice.toFixed(2));
  //       $("#sale_sales_price").val(salesPrice.toFixed(2));
  //       $("#sale_final_price").val((salesPrice + (salesPrice * (taxRate / 100))).toFixed(2));
  //     }
  
  //     $("#sale_sales_price").on("change", function() {
  //         var taxRate = $("#sale_tax").val();
  //         var salesPrice = $("#sale_sales_price").val();
  //         var finalPrice = salesPrice + (salesPrice * (taxRate / 100));
  //         $("#sale_final_price").val(finalPrice.toFixed(2));
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
  
  //   // function to fetch sale price by tax
  //   function fetchsalePrice(originalPrice, taxRate, taxType) {
  //     return calculatePrice(originalPrice, taxRate, taxType);
  //   }
  
  //   // function to calculate sales price by profit margin
  //   function calculateSalesPrice(salePrice, profitMargin) {
  //     salePrice = parseFloat(salePrice);
  //     profitMargin = parseFloat(profitMargin);
  //     return salePrice + (salePrice * (profitMargin / 100));
  //   }
  
    
  //   $("#esale_price, #esale_tax, #esale_tax_type, #esale_profit_margin").on("change", function() {
  //       var originalPrice = $("#esale_price").val();
  //       var taxRate = $("#esale_tax").val();
  //       var taxType = $("#esale_tax_type").val();
  //       var profitMargin = $("#esale_profit_margin").val();
  //       fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin);
  //     });
  
  //     // function to fetch final price by tax and profit margin
  //     function fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin) {
  //       var salePrice = fetchsalePrice(originalPrice, taxRate, taxType);
  //       var salesPrice = calculateSalesPrice(salePrice, profitMargin);
  //       $("#esale_sale_price").val(salePrice.toFixed(2));
  //       $("#esale_sales_price").val(salesPrice.toFixed(2));
  //       $("#esale_final_price").val((salesPrice + (salesPrice * (taxRate / 100))).toFixed(2));
  //     }
  
  //     $("#esale_sales_price").on("change", function() {
  //         var taxRate = $("#esale_tax").val();
  //         var salesPrice = $("#esale_sales_price").val();
  //         var finalPrice = salesPrice + (salesPrice * (taxRate / 100));
  //         $("#esale_final_price").val(finalPrice.toFixed(2));
  //       });
  //     })
  
  
  
  
      
  // $(document).on('submit','#add_sale_category',
  // function(e){
  //     e.preventDefault();
  //     var name =$('#sale_category_name').val();
  //     var description =$('#sale_category_desc').val();
  //     var status =$('#sale_category_status').val();
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
  //                 $('#add_sale').load("sales.php #add_sale");
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
  
  
  
  
  
  // $(document).on('submit','#add_sale_brand',
  // function(e){
  //     e.preventDefault();
  //     var name=$('#sale_brand_name').val();
  //     var status=$('#sale_brand_status').val();
  //     var description=$('#sale_brand_desc').val();
  
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
  //                 $('#add_sale').load("sales.php #add_sale");
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
  
  function deleteAllSale(){
    var checked=$('#check[name="check[]"]').filter(':checked');
    var checked_id=new Array();
    checked.each(function(){
        checked_id.push($(this).val());
    });
    if(confirm("دڵنیایت لە سرینەوەییان؟")){
    for (let i = 0; i < checked_id.length; i++) {
    $.ajax({
        url: 'sale_api.php',
        type: 'POST',
        data: {
            id:checked_id[i],
            delete:true
        },success: function(data){
          mytable = $('#sale_table').DataTable();
          mytable.draw();
        }
    })
  }
  }
  }
  
  
  