

$(document).ready(function(){
  $('#user_table').DataTable({
      "fnCreatedRow": function(nRow,aData,iDataIndex){
          $(nRow).attr('id',aData[0]);
      },
      processing: true,
      serverSide: true,
      pagin:true,
      order:[],
      buttons:[],
      responsive: true,
      ajax: {
          url: 'user_api.php',
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
      ],
      columnDefs: [{
        targets: [1,7],
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
dom: '<"card-header flex-column flex-md-row"<"head-label text-center"<"users">><"dt-action-buttons text-end pt-3 pt-md-0"<"delete_all_user"B>>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
        columns: [1,2,3,4,5],
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
        columns: [1,2,3,4,5],
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
        columns: [1,2,3,4,5],
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
        columns: [1,2,3,4,5],
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
        columns: [1,2,3,4,5],
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
    text: '<span data-bs-toggle="modal" data-bs-target="#add_user_modal"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">زیادکردنی بەکارهێنەر</span></span>',
    className: 'btn btn-primary waves-effect waves-light me-3',
  } 
],

});
$('div.users').html('<h5 class="card-title mb-0">لیستی بەکارهێنەرەکان</h5>');
$('div.delete_all_user div.dt-buttons').append('<button type="button" class="btn btn-danger waves-effect waves-light me-3" onclick="deleteAllUser()" id="delete_all" ><i class="ti ti-trash"></i></button>');
  })

  $("#user_table").on('click','.edit_btn_user',function(event){
    var trid = $(this).closest('tr').attr('id');
    $('#edit_user_modal').modal('show');
    var id=$(this).data('id');
    $.ajax({
        url: 'user_api.php',
        data:{
            id:id,
            get:true,
        },
        type:"POST",
        success:function(data){
            var json = JSON.parse(data);
            $('#euser_fname').val(json.f_name);
            $('#euser_lname').val(json.l_name);
            $('#euser_email').val(json.email);
            $('#euser_role').val(json.role);
            $('#euser_phone1').val(json.phone1);
            $('#euser_phone2').val(json.phone2);
            $('#euser_address').val(json.address);
            $('#euser_bio').val(json.bio);
            $('#updated_by').val(json.updated_by);
            $('#updated_at').val(json.updated_at);
            $('#id').val(json.id);
            $('#trid').val(trid);
      }
    })
    })


    
$(document).on('submit','#edit_user',function(e){
    e.preventDefault();
    var fname =$('#euser_fname').val();
    var lname =$('#euser_lname').val();
    var email =$('#euser_email').val();
    var role =$('#euser_role').val();
    var phone1 =$('#euser_phone1').val();
    var phone2 =$('#euser_phone2').val();
    var password =$('#euser_password').val();
    var cpassword =$('#euser_cpassword').val();
    var address =$('#euser_address').val();
    var bio =$('#euser_bio').val();
    var id=$('#id').val();
    if(fname==""&&email=="" &&role==""&&phone1==""&& password==""&&cpassword==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەکان پربکەرەوە </div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(fname == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی یەکەم بنوسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(fname.length<3){
        $("#alert").html('<div class="alert alert-warning" role="alert">تکایە بە ناوی بەکارهێنەر لە سێ پیت کەمتر نەبێ</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(email == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ئیمەیڵی بەکارهێنەر بنوسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(role == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ڕؤڵێک هەڵبژێرە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    } else if(phone1==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ژمارەی مۆبایل بنووسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(password == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">وشەی تێپەڕ بنووسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(cpassword == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">وشەی تێپەڕ دڵنیای بنووسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else if(password != cpassword){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با وشەی تێپەڕ و وشەی تێپەڕی دڵنیای وەک و یەک بن</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }else{
    $.ajax({
        url: 'user_api.php',
        type:"POST",
        data:{
            id:id,
            fname:fname,
            lname:lname,
            email:email,
            phone1:phone1,
            phone2:phone2,
            password:password,
            address:address,
            bio:bio,
            role:role,
            edit:true,
        },
            success:function(data){
                var json = JSON.parse(data);
                var success=json.success;
                if(success=='true'){
                //     table=$('#user_table').DataTable();
                // var button='<td><a href="javascript:void();" data-id="'+id+'" class="text-info edit_btn_user"><i class="ti ti-edit"></i></a>  <a href="#!" data-id="'+id+'" class="text-danger delete_category"><i class="ti ti-trash"></i></a>  </td>';

                // var row =table.row("[id='"+trID+"']");
                // row.row("[id='"+trID+"']").data([id,name,status,description,created_at,added_by,button]);
                mytable = $('#user_table').DataTable();
                mytable.draw();
                $('#edit_user_modal').modal('hide');
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



$(document).on('click','.delete_user',function(event){
    event.preventDefault();
    var id=$(this).data('id');
  if(confirm("دڵنیایت لە سرینەوەی؟")){
      $.ajax({
        url: 'user_api.php',
        type:'POST',
        data:{
            id:id,
            delete:true,
        },
        success:function(data){
          var json=JSON.parse(data);
          success=json.success;
          mytable = $('#user_table').DataTable();
          mytable.draw();
      }
       
    }) }
})


$(document).on('submit','#add_user',
function(e){
    e.preventDefault();
    var fname =$('#user_fname').val();
    var lname =$('#user_lname').val();
    var email =$('#user_email').val();
    var role =$('#user_role').val();
    var phone1 =$('#user_phone1').val();
    var phone2 =$('#user_phone2').val();
    var password =$('#user_password').val();
    var cpassword =$('#user_cpassword').val();
    var address =$('#user_address').val();
    var formData = new FormData();

    formData.append("fname",fname);
    formData.append("lname",lname);
    formData.append("email",email);
    formData.append("role",role);
    formData.append("phone1",phone1);
    formData.append("phone2",phone2);
    formData.append("password",password);
    formData.append("add",true);
    formData.append("address",address);
    formData.append("image",$('#user_image')[0].files[0]);
    
        if(fname==""&&email=="" &&role==""&&phone1==""&& password==""&&cpassword==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە خانەکان پربکەرەوە </div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
        }else if(fname == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ناوی یەکەم بنوسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
        }else if(fname.length<3){
        $("#alert").html('<div class="alert alert-warning" role="alert">تکایە بە ناوی بەکارهێنەر لە سێ پیت کەمتر نەبێ</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
        }else if(email == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ئیمەیڵی بەکارهێنەر بنوسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
        }else if(role == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ڕؤڵێک هەڵبژێرە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
        } else if(phone1==""){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە ژمارەی مۆبایل بنووسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
        }else if(password == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">وشەی تێپەڕ بنووسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
        }else if(cpassword == ''){
        $("#alert").html('<div class="alert alert-danger" role="alert">وشەی تێپەڕ دڵنیای بنووسە</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
        }else if(password != cpassword){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە با وشەی تێپەڕ و وشەی تێپەڕی دڵنیای وەک و یەک بن</div>');
        try{
            $("#alert").show();
        }catch(e){
            console.log(e);
        }
        $("#alert").fadeOut(4000);
    }
    else{
    $.ajax({
        url: 'user_api.php',
        type:"POST",
        data:formData,
        contentType: false,
        processData: false,
      
        success:function(data){
            var json = JSON.parse(data);
            var success = json.success;
            var error=json.errors;
            if(success=="true"){
                $("#alert").html('<div class="alert alert-success" role="alert">بەسەرکەوتووی زیادکرا</div>');
                try{
                    $("#alert").show();
                }catch(e){
                    console.log(e);
                }
                $("#alert").fadeOut(4000); 
                mytable = $('#user_table').DataTable();
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
                if(error){
                  $("#alert").html('<div class="alert alert-danger" role="alert">'+error+'</div>');
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

function deleteAllUser(){
  var checked=$('#check[name="check[]"]').filter(':checked');
  var checked_id=new Array();
  checked.each(function(){
      checked_id.push($(this).val());
  });
  for (let i = 0; i < checked_id.length; i++) {
  $.ajax({
      url: 'user_api.php',
      type: 'POST',
      data: {
          id:checked_id[i],
          delete:true
      },success: function(data){
        mytable = $('#user_table').DataTable();
        mytable.draw();
      }
  })
}
}