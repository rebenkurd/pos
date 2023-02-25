
$(document).ready(function(){
  $('#supplier_table').DataTable({
    "fnCreatedRow": function(nRow,aData,iDataIndex){
        $(nRow).attr('id',aData[0]);
    },
    processing: true,
    serverSide: true,
    pagin:true,
    order:[],
    responsive: true,
    ajax: {
        url:'supplier_api.php',
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
    ],
    columnDefs: [{
      targets: [5],
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
  dom: '<"card-header flex-column flex-md-row"<"head-label text-center"<"supplier">><"dt-action-buttons text-end pt-3 pt-md-0"<"delete_all_supplier"B>>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
          columns: [0,1,2,3,4,5],
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
        supplierize: function (win) {
          //supplierize print view for dark
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
          columns: [0,1,2,3,4,5],
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
          columns: [0,1,2,3,4,5],
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
          columns: [0,1,2,3,4,5],
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
          columns: [0,1,2,3,4,5],
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
      text: '<span data-bs-toggle="modal" data-bs-target="#add_supplier_modal"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">زیادکردنی دابینکەر</span></span>',
      className: 'btn btn-primary waves-effect waves-light me-3',
    } 
],

});
  $('div.supplier').html('<h5 class="card-title mb-0">لیستی دابینکەرەکان</h5>');
  $('div.delete_all_supplier div.dt-buttons').append('<button type="button" class="btn btn-danger waves-effect waves-light me-3" onclick="deleteAllSupplier()" id="delete_all" ><i class="ti ti-trash"></i></button>');
})


$(document).on('submit','#add_supplier',
function(e){
  e.preventDefault();
  var name =$('#supplier_name').val();
  var mobile =$('#supplier_mobile').val();
  var email =$('#supplier_email').val();
  var gst =$('#supplier_gst').val();
  var status =$('#supplier_status').val();
  var tax =$('#supplier_tax').val(); 
  var open_balance =$('#supplier_open_balance').val(); 
  var country =$('#supplier_country').val();
  var state =$('#supplier_state').val();
  var city =$('#supplier_city').val();
  var postcode =$('#supplier_postcode').val();
  var address =$('#supplier_address').val();


//   if(name=="" && unit=="" && status=="" && debt=="" && category=="" && price=="" && tax=="" && tax_type=="" && purchase_price=="" && profit_margin=="" && sales_price=="" && final_price==""){
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
// }
// else{
  $.ajax({
      url:"supplier_api.php",
      type:"POST",
      data:{
          name:name,
          mobile:mobile,
          email:email,
          gst:gst,
          status:status,
          country:country,
          state:state,
          city:city,
          open_balance:open_balance,
          postcode:postcode,
          address:address,
          tax:tax,
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
              mytable = $('#supplier_table').DataTable();
              mytable.draw();
              $("#add_supplier")[0].reset();
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

// }
)


$("#supplier_table").on('click','.edit_btn_supplier',function(event){
  var trid = $(this).closest('tr').attr('id');
  $('#edit_supplier_modal').modal('show');
  var id=$(this).data('id');
  $.ajax({
      url:"supplier_api.php",
      data:{
          id:id,
          get:true
      },
      type:"POST",
      success:function(data){
          var json = JSON.parse(data);
          $('#esupplier_name').val(json.name);
          $('#esupplier_mobile').val(json.mobile);
          $('#esupplier_email').val(json.email);
          $('#esupplier_gst').val(json.gst);
          $('#esupplier_status').val(json.status);
          $('#esupplier_tax').val(json.tax); 
          $('#esupplier_open_balance').val(json.open_balance); 
          $('#esupplier_country').val(json.country);
          $('#esupplier_state').val(json.state);
          $('#esupplier_city').val(json.city);
          $('#esupplier_postcode').val(json.postcode);
          $('#esupplier_address').val(json.address);
          $('#id').val(json.id);
    }
  })
  })


  
$(document).on('submit','#edit_supplier',function(e){
  e.preventDefault();
var name =$('#esupplier_name').val();
var mobile =$('#esupplier_mobile').val();
var email =$('#esupplier_email').val();
var gst =$('#esupplier_gst').val();
var status =$('#esupplier_status').val();
var tax =$('#esupplier_tax').val(); 
var open_balance =$('#esupplier_open_balance').val(); 
var country =$('#esupplier_country').val();
var state =$('#esupplier_state').val();
var city =$('#esupplier_city').val();
var postcode =$('#esupplier_postcode').val();
var address =$('#esupplier_address').val();
var id=$('#id').val();
//   if(name=="" && unit=="" && status=="" && debt=="" && category=="" && price=="" && tax=="" && tax_type=="" && purchase_price=="" && profit_margin=="" && sales_price=="" && final_price==""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەکان پربکەرەوە </div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }else if(name == ''){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی بەرهەم بنوسە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }else if(name.length<3){
//     $("#alert").html('<div class="alert alert-warning" role="alert">تکایە بە ناوی بەرهەم لە سێ پیت کەمتر نەبێ</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }else if(status==""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە دۆخێک هەڵبژیرە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }else if(debt == ""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">خانەی قەرزت بیرچوو</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }else if(category==""){
//     $("#alert").html('<div class="alert alert-danger" role="alert">تکایە جۆرێک هەڵبژیرە</div>');
//     try{
//         $("#alert").show();
//     }catch(e){
//         console.log(e);
//     }
//     $("#alert").fadeOut(4000);
// }
// else if(price == ""){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی بەرهەم بنوسە</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }
// else if(tax == ""){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە باجێک هەڵبژێرە</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }
// else if(tax_type == ""){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە جۆرێکی باج هەڵبژێرە</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }
// else if(purchase_price == ""){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با نرخی کڕین بەتاڵ نەبێ</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }
// else if(isNaN(purchase_price)){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با نرخی کڕین بەتاڵ نەبێ</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }
// else if(profit_margin == ""){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ڕێژەی قازانج بنووسە</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }
// else if(sales_price == ""){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی فرۆشتن بنووسە</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }
// else if(isNaN(sales_price)){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی فرۆشتن بنووسە</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }
// else if(final_price == ""){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی کۆتای بنووسە</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }
// else if(isNaN(final_price)){
//   $("#alert").html('<div class="alert alert-danger" role="alert">تکایە نرخی کۆتای بنووسە</div>');
//   try{
//       $("#alert").show();
//   }catch(e){
//       console.log(e);
//   }
//   $("#alert").fadeOut(4000);
// }else{
  $.ajax({
      url:"supplier_api.php",
      type:"POST",
      data:{
          id:id,
          name:name,
          mobile:mobile,
          email:email,
          gst:gst,
          status:status,
          country:country,
          state:state,
          city:city,
          open_balance:open_balance,
          postcode:postcode,
          address:address,
          tax:tax,
          edit:true
      },
          success:function(data){
              var json = JSON.parse(data);
              var success=json.success;
              if(success=='true'){
                mytable = $('#supplier_table').DataTable();
                mytable.draw();
              $('#edit_supplier_modal').modal('hide');
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



$(document).on('click','.delete_supplier',function(event){
  var table=$('#supplier_table').DataTable();
  event.preventDefault();
  var id=$(this).data('id');
if(confirm("دڵنیایت لە سرینەوەی؟")){
    $.ajax({
      url:'supplier_api.php',
      data:{
          id:id,
          delete:true
      },
      type:'POST',
      success:function(data){
        var json=JSON.parse(data);
        success=json.success;
        mytable = $('#supplier_table').DataTable();
        mytable.draw();
    }
     
  }) }
})

function deleteAllSupplier(){
  var checked=$('#check[name="check[]"]').filter(':checked');
  var checked_id=new Array();
  checked.each(function(){
      checked_id.push($(this).val());
  });
  if(confirm("دڵنیایت لە سرینەوەییان؟")){
  for (let i = 0; i < checked_id.length; i++) {
  $.ajax({
      url: 'supplier_api.php',
      type: 'POST',
      data: {
          id:checked_id[i],
          delete:true
      },success: function(data){
        mytable = $('#supplier_table').DataTable();
        mytable.draw();
      }
  })}
}
}