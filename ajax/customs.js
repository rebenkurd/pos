
$(document).ready(function(){
  $('#custom_table').DataTable({
      "fnCreatedRow": function(nRow,aData,iDataIndex){
          $(nRow).attr('id',aData[0]);
      },
      processing: true,
      serverSide: true,
      pagin:true,
      order:[],
      responsive: true,
      ajax: {
          url:'custom_api.php',
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
          { data: 9 },
          { data: 10 },
          { data: 11 },
          { data: 12 },
      ],
      columnDefs: [
        {
        targets: [12],
        searchable: false,
        orderable: false
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
    dom: '<"card-header flex-column flex-md-row"<"head-label text-center"<"custom">><"dt-action-buttons text-end pt-3 pt-md-0"<"delete_all_custom"B>>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
            columns: [1,2,3,4,5,6,7,8,9,10],
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
          customize: function (win) {
            //customize print view for dark
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
            columns: [1,2,3,4,5,6,7,8,9,10],
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
            columns: [1,2,3,4,5,6,7,8,9,10],
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
            columns: [1,2,3,4,5,6,7,8,9,10],
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
            columns: [1,2,3,4,5,6,7,8,9,10],
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
    },     
     {
        text: '<span data-bs-toggle="modal" data-bs-target="#add_custom_modal"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">زیادکردنی کاڵا</span></span>',
        className: 'btn btn-primary waves-effect waves-light me-3',
      } 
  ],

  });
    $('div.custom').html('<h5 class="card-title mb-0">لیستی کاڵاکان</h5>');
    $('div.delete_all_custom div.dt-buttons').append('<button type="button" class="btn btn-danger waves-effect waves-light me-3" onclick="deleteAllCustom()" id="delete_all" ><i class="ti ti-trash"></i></button>');
  })


  $(document).on('submit','#add_custom',
function(e){
    e.preventDefault();
    var name =$('#custom_name').val();
    var barcode =$('#custom_barcode').val();
    var qty =$('#custom_qty').val();
    var price =$('#custom_price').val();
    var status =$('#custom_status').val();
    var debt =$('#custom_debt').val();
    var tax =$('#custom_tax').val();
    var unit =$('#custom_unit').val();
    var tax_type =$('#custom_tax_type').val();
    var purchase_price =$('#custom_purchase_price').val();
    var profit_margin =$('#custom_profit_margin').val();
    var sales_price =$('#custom_sales_price').val();
    var final_price =$('#custom_final_price').val();
    var discount =$('#custom_discount').val();
    var discount_type =$('#custom_discount_type').val();
    var category =$('#custom_category').val();
    var brand =$('#custom_brand').val();
    var mfd =$('#custom_mfd').val();
    var exd =$('#custom_exd').val();
    var description =$('#custom_desc').val();

    if(name=="" && unit=="" && status=="" && debt=="" && category=="" && price=="" && tax=="" && tax_type=="" && purchase_price=="" && profit_margin=="" && sales_price=="" && final_price==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەکان پربکەرەوە </div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(name == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی بەرهەم بنوسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(name.length<3){
        $("#alert").html('<div class="alert alert-warning" role="alert">تکایە بە ناوی بەرهەم لە سێ پیت کەمتر نەبێ</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(status==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە دۆخێک هەڵبژیرە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(debt == ""){
        $("#alert").html('<div class="alert alert-danger" role="alert">خانەی قەرزت بیرچوو</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(category==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە جۆرێک هەڵبژیرە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }
    else if(price == ""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی بەرهەم بنوسە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
    else if(tax == ""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە باجێک هەڵبژێرە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
    else if(tax_type == ""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە جۆرێکی باج هەڵبژێرە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
    else if(purchase_price == ""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با نرخی کڕین بەتاڵ نەبێ</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
    else if(isNaN(purchase_price)){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با نرخی کڕین بەتاڵ نەبێ</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
    else if(profit_margin == ""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ڕێژەی قازانج بنووسە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
    else if(sales_price == ""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی فرۆشتن بنووسە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
    else if(isNaN(sales_price)){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی فرۆشتن بنووسە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
    else if(final_price == ""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی کۆتای بنووسە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
    else if(isNaN(final_price)){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی کۆتای بنووسە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
  else{
    $.ajax({
        url:"custom_api.php",
        type:"POST",
        data:{
            name:name,
            barcode:barcode,
            qty:qty,
            price:price,
            status:status,
            debt:debt,
            category:category,
            brand:brand,
            mfd:mfd,
            exd:exd,
            tax:tax,
            tax_type:tax_type,
            purchase_price:purchase_price,
            profit_margin:profit_margin,
            sales_price:sales_price,
            unit:unit,
            final_price:final_price,
            discount:discount,
            discount_type:discount_type,
            description:description,
            add:true
        },
        success:function(data){
            var json = JSON.parse(data);
            var success = json.success;
            if(success=="true"){
                $("#alert").html('<div class="alert alert-success" role="alert">بەسەرکەوتووی زیادکرا</div>');
                try{
                    $("#alert").show();
                }catch(e){
                    console.log(e);
                }
                $("#alert").fadeOut(4000); 
                mytable = $('#custom_table').DataTable();
                mytable.draw();



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
}

}
)


$("#custom_table").on('click','.edit_btn_custom',function(event){
    var trid = $(this).closest('tr').attr('id');
    $('#edit_custom_modal').modal('show');
    var id=$(this).data('id');
    $.ajax({
        url:"custom_api.php",
        data:{
            id:id,
            get:true
        },
        type:"POST",
        success:function(data){
            var json = JSON.parse(data);
            $('#ecustom_name').val(json.name);
            $('#ecustom_barcode').val(json.id);
            $('#ecustom_qty').val(json.quantity);
            $('#ecustom_price').val(json.price);
            $('#ecustom_status').val(json.status);
            $('#ecustom_debt').val(json.debt);
            $('#ecustom_category').val(json.category);
            $('#ecustom_brand').val(json.brand);
            $('#ecustom_mfd').val(json.mf_date);
            $('#ecustom_exd').val(json.ex_date);
            $('#ecustom_desc').val(json.description);
            $('#ecustom_tax').val(json.tax);
            $('#ecustom_unit').val(json.unit);
            $('#ecustom_tax_type').val(json.tax_type);
            $('#ecustom_purchase_price').val(json.total_price_tax);
            $('#ecustom_profit_margin').val(json.profit_margin);
            $('#ecustom_sales_price').val(json.sales_price);
            $('#ecustom_final_price').val(json.final_price);
            $('#ecustom_discount').val(json.discount);
            $('#ecustom_discount_type').val(json.discount_type);
            $('#id').val(json.id);
            $('#trid').val(trid);
      }
    })
    })


    
$(document).on('submit','#edit_custom',function(e){
    e.preventDefault();
    var name =$('#ecustom_name').val();
    var barcode =$('#ecustom_barcode').val();
    var qty =$('#ecustom_qty').val();
    var price =$('#ecustom_price').val();
    var status =$('#ecustom_status').val();
    var debt =$('#ecustom_debt').val();
    var tax =$('#ecustom_tax').val();
    var unit =$('#ecustom_unit').val();
    var tax_type =$('#ecustom_tax_type').val();
    var purchase_price =$('#ecustom_purchase_price').val();
    var profit_margin =$('#ecustom_profit_margin').val();
    var sales_price =$('#ecustom_sales_price').val();
    var final_price =$('#ecustom_final_price').val();
    var discount =$('#ecustom_discount').val();
    var discount_type =$('#ecustom_discount_type').val();
    var category =$('#ecustom_category').val();
    var brand =$('#ecustom_brand').val();
    var mfd =$('#ecustom_mfd').val();
    var exd =$('#ecustom_exd').val();
    var description =$('#ecustom_desc').val();
    var id=$('#id').val();
    if(name=="" && unit=="" && status=="" && debt=="" && category=="" && price=="" && tax=="" && tax_type=="" && purchase_price=="" && profit_margin=="" && sales_price=="" && final_price==""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەکان پربکەرەوە </div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }else if(name == ''){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی بەرهەم بنوسە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }else if(name.length<3){
      $("#alert").html('<div class="alert alert-warning" role="alert">تکایە بە ناوی بەرهەم لە سێ پیت کەمتر نەبێ</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }else if(status==""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە دۆخێک هەڵبژیرە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }else if(debt == ""){
      $("#alert").html('<div class="alert alert-danger" role="alert">خانەی قەرزت بیرچوو</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }else if(category==""){
      $("#alert").html('<div class="alert alert-danger" role="alert">تکایە جۆرێک هەڵبژیرە</div>');
      try{
          $("#alert").show();
      }catch(e){
          console.log(e);
      }
      $("#alert").fadeOut(4000);
  }
  else if(price == ""){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی بەرهەم بنوسە</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}
  else if(tax == ""){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە باجێک هەڵبژێرە</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}
  else if(tax_type == ""){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە جۆرێکی باج هەڵبژێرە</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}
  else if(purchase_price == ""){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با نرخی کڕین بەتاڵ نەبێ</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}
  else if(isNaN(purchase_price)){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با نرخی کڕین بەتاڵ نەبێ</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}
  else if(profit_margin == ""){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ڕێژەی قازانج بنووسە</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}
  else if(sales_price == ""){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی فرۆشتن بنووسە</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}
  else if(isNaN(sales_price)){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی فرۆشتن بنووسە</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}
  else if(final_price == ""){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی کۆتای بنووسە</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}
  else if(isNaN(final_price)){
    $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی کۆتای بنووسە</div>');
    try{
        $("#alert").show();
    }catch(e){
        console.log(e);
    }
    $("#alert").fadeOut(4000);
}else{
    $.ajax({
        url:"custom_api.php",
        type:"POST",
        data:{
            id:id,
            name:name,
            barcode:barcode,
            qty:qty,
            price:price,
            status:status,
            debt:debt,
            category:category,
            brand:brand,
            mfd:mfd,
            exd:exd,
            tax:tax,
            tax_type:tax_type,
            purchase_price:purchase_price,
            profit_margin:profit_margin,
            sales_price:sales_price,
            unit:unit,
            final_price:final_price,
            discount:discount,
            discount_type:discount_type,
            description:description,
            edit:true
        },
            success:function(data){
                var json = JSON.parse(data);
                var success=json.success;
                if(success=='true'){
                //     table=$('#custom_table').DataTable();
                // var button='<td><a href="javascript:void();" data-id="'+id+'" class="text-info edit_btn_custom"><i class="ti ti-edit"></i></a>  <a href="#!" data-id="'+id+'" class="text-danger delete_category"><i class="ti ti-trash"></i></a>  </td>';

                // var row =table.row("[id='"+trID+"']");
                // row.row("[id='"+trID+"']").data([id,name,status,description,created_at,added_by,button]);
                mytable = $('#custom_table').DataTable();
                mytable.draw();
                $('#edit_custom_modal').modal('hide');
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
}
})



$(document).on('click','.delete_custom',function(event){
    var table=$('#custom_table').DataTable();
    event.preventDefault();
    var id=$(this).data('id');
  if(confirm("دڵنیایت لە سرینەوەی؟")){
      $.ajax({
        url:'custom_api.php',
        data:{
            id:id,
            delete:true
        },
        type:'POST',
        success:function(data){
          var json=JSON.parse(data);
          success=json.success;
          mytable = $('#custom_table').DataTable();
          mytable.draw();
      }
       
    }) }
})


  // for edit 
$(function(){
  // function to calculate price by tax and tax type
function calculatePrice(originalPrice, taxRate, taxType) {
    originalPrice = parseFloat(originalPrice);
    taxRate = parseFloat(taxRate);
    if (taxType === "inclusive") {
      return originalPrice / (1 + (taxRate / 100));
    } else if(taxType !== ""){
      return originalPrice + (originalPrice * (taxRate / 100));
    }
  }

  // function to fetch purchase price by tax
  function fetchPurchasePrice(originalPrice, taxRate, taxType) {
    return calculatePrice(originalPrice, taxRate, taxType);
  }

  // function to calculate sales price by profit margin
  function calculateSalesPrice(purchasePrice, profitMargin) {
    purchasePrice = parseFloat(purchasePrice);
    profitMargin = parseFloat(profitMargin);
    return purchasePrice + (purchasePrice * (profitMargin / 100));
  }

  
  $("#custom_price, #custom_tax, #custom_tax_type, #custom_profit_margin").on("change", function() {
      var originalPrice = $("#custom_price").val();
      var taxRate = $("#custom_tax").val();
      var taxType = $("#custom_tax_type").val();
      var profitMargin = $("#custom_profit_margin").val();
      fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin);
    });

    // function to fetch final price by tax and profit margin
    function fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin) {
      var purchasePrice = fetchPurchasePrice(originalPrice, taxRate, taxType);
      var salesPrice = calculateSalesPrice(purchasePrice, profitMargin);
      $("#custom_purchase_price").val(purchasePrice.toFixed(2));
      $("#custom_sales_price").val(salesPrice.toFixed(2));
      $("#custom_final_price").val((salesPrice + (salesPrice * (taxRate / 100))).toFixed(2));
    }

    $("#custom_sales_price").on("change", function() {
        var taxRate = $("#custom_tax").val();
        var salesPrice = $("#custom_sales_price").val();
        var finalPrice = salesPrice + (salesPrice * (taxRate / 100));
        $("#custom_final_price").val(finalPrice.toFixed(2));
      });


    })


    // for edit 
$(function(){
// function to calculate price by tax and tax type
function calculatePrice(originalPrice, taxRate, taxType) {
    originalPrice = parseFloat(originalPrice);
    taxRate = parseFloat(taxRate);
    if (taxType === "inclusive") {
      return originalPrice / (1 + (taxRate / 100));
    } else if(taxType !== ""){
      return originalPrice + (originalPrice * (taxRate / 100));
    }
  }

  // function to fetch purchase price by tax
  function fetchPurchasePrice(originalPrice, taxRate, taxType) {
    return calculatePrice(originalPrice, taxRate, taxType);
  }

  // function to calculate sales price by profit margin
  function calculateSalesPrice(purchasePrice, profitMargin) {
    purchasePrice = parseFloat(purchasePrice);
    profitMargin = parseFloat(profitMargin);
    return purchasePrice + (purchasePrice * (profitMargin / 100));
  }

  
  $("#ecustom_price, #ecustom_tax, #ecustom_tax_type, #ecustom_profit_margin").on("change", function() {
      var originalPrice = $("#ecustom_price").val();
      var taxRate = $("#ecustom_tax").val();
      var taxType = $("#ecustom_tax_type").val();
      var profitMargin = $("#ecustom_profit_margin").val();
      fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin);
    });

    // function to fetch final price by tax and profit margin
    function fetchFinalPrice(originalPrice, taxRate, taxType, profitMargin) {
      var purchasePrice = fetchPurchasePrice(originalPrice, taxRate, taxType);
      var salesPrice = calculateSalesPrice(purchasePrice, profitMargin);
      $("#ecustom_purchase_price").val(purchasePrice.toFixed(2));
      $("#ecustom_sales_price").val(salesPrice.toFixed(2));
      $("#ecustom_final_price").val((salesPrice + (salesPrice * (taxRate / 100))).toFixed(2));
    }
    fetchFinalPrice();
    $("#ecustom_sales_price").on("change", function() {
        var taxRate = $("#ecustom_tax").val();
        var salesPrice = $("#ecustom_sales_price").val();
        var finalPrice = salesPrice + (salesPrice * (taxRate / 100));
        $("#ecustom_final_price").val(finalPrice.toFixed(2));
      });
    })




    
$(document).on('submit','#add_custom_category',
function(e){
    e.preventDefault();
    var name =$('#custom_category_name').val();
    var description =$('#custom_category_desc').val();
    var status =$('#custom_category_status').val();
    if(name=="" && status==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەی ناو و دۆخ پربکەرەوە </div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(name == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی جۆر بنوسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(name.length<3){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە بە ناوی جۆر لە سێ پیت کەمتر نەبێ</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(status==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە دۆخێک هەڵبژیرە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else{
    $.ajax({
        url:"category_api.php",
        type:"POST",
        data:{
            name:name,
            description:description,
            status:status,
            add:true
        },
        success:function(data){
            var json = JSON.parse(data);
            var success = json.success;
            if(success=="true"){
                $("#alert").html('<div class="alert alert-success" role="alert">بەسەرکەوتووی زیادکرا</div>');
                try{
                    $("#alert");
                }catch(e){
                    console.log(e);
                }
                $("#alert").fadeOut(4000); 
                $('#add_custom').load("customs.php #add_custom");
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
}
}
)





$(document).on('submit','#add_custom_brand',
function(e){
    e.preventDefault();
    var name=$('#custom_brand_name').val();
    var status=$('#custom_brand_status').val();
    var description=$('#custom_brand_desc').val();

    if(name=="" && status==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەکان پربکەرەوە </div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(name == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی بڕاند بنوسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(name.length<3){
        $("#alert").html('<div class="alert alert-warning" role="alert">تکایە بە ناوی بڕاند لە سێ پیت کەمتر نەبێ</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    } else if(status==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە دۆخێک هەڵبژیرە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }
    else {
    $.ajax({
        url:'brand_api.php',
        type:"POST",
        data:{
            name:name,
            status:status,
            description:description,
            add:true
        },
        success:function(data){
            var json = JSON.parse(data);
            var success = json.success;

            if(success=="true"){
                $("#alert").html('<div class="alert alert-success" role="alert">بەسەرکەوتووی زیادکرا</div>');
                try{
                    $("#alert").show();
                }catch(e){
                    console.log(e);
                }
                $("#alert").fadeOut(4000); 
                $('#add_custom').load("customs.php #add_custom");
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
}
}
)


function deleteAllCustom(){
  var checked=$('#check[name="check[]"]').filter(':checked');
  var checked_id=new Array();
  checked.each(function(){
      checked_id.push($(this).val());
  });
  if(confirm("دڵنیایت لە سرینەوەییان؟")){
  for (let i = 0; i < checked_id.length; i++) {
  $.ajax({
      url: 'custom_api.php',
      type: 'POST',
      data: {
          id:checked_id[i],
          delete:true
      },success: function(data){
        mytable = $('#custom_table').DataTable();
        mytable.draw();
      }
  })
}
}
}