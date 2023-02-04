
$(function(){
    $('#category_table').DataTable({
      "fnCreatedRow": function(nRow,aData,iDataIndex){
          $(nRow).attr('id',aData[0]);
      },
      processing: true,
      serverSide: true,
      pagin:true,
      order:[],
      responsive: true,
      ajax: {
          url:'category_api.php',
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
        targets: 5,
        searchable: false,
        visible: false
    },        {
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

dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
        columns: [1,2],
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
        columns: [1,2],
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
        columns: [1,2],
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
        columns: [1,2],
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
        columns: [1,2],
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
    text: '<span data-bs-toggle="modal" data-bs-target="#add_category_modal"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">زیادکردنی جۆر</span></span>',
    className: 'btn btn-primary waves-effect waves-light me-3',
  }
],

});
$('div.head-label').html('<h5 class="card-title mb-0">لیستی جۆرەکان</h5>');
$('div.dt-buttons').append('<button type="button" class="btn btn-danger waves-effect waves-light me-3" onclick="deleteAll()" id="delete_all" ><i class="ti ti-trash"></i></button>');
      
  })

$(document).on('submit','#add_category',
function(e){
    e.preventDefault();
    var name =$('#category_name').val();
    var description =$('#category_desc').val();
    var status =$('#category_status').val();
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
                    $("#alert").show();
                }catch(e){
                    console.log(e);
                }
                $("#alert").fadeOut(4000); 
                mytable = $('#category_table').DataTable();
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



$(document).on('submit','#edit_category',function(e){
    e.preventDefault();
    var name=$('#ecategory_name').val();
    var status=$('#ecategory_status').val();
    var description=$('#ecategory_desc').val();
    var id=$('#id').val();
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
    }else if(description.length>100){
        $("#alert").html('<div class="alert alert-danger" role="alert">تکایە باسکردن لە ١٠٠ پیت زیاتر نەبێ</div>');
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
            url:'category_api.php',
            type: "POST",
            data:{
                name:name,
                status:status,
                description:description,
                id:id,
                edit:true
            },
            success:function(data){
                var json = JSON.parse(data);
                var success=json.success;
                if(success=='true'){
                    mytable = $('#category_table').DataTable();
                    mytable.draw();
                $('#edit_category_modal').modal('hide');
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


$("#category_table").on('click','.edit_btn_category',function(event){
    var trid = $(this).closest('tr').attr('id');
    $('#edit_category_modal').modal('show');
    var id=$(this).data('id');
    $.ajax({
        url:"category_api.php",
        data:{
            id:id,
            get:true
        },
        type:"POST",
        success:function(data){
            var json = JSON.parse(data);
            $('#ecategory_name').val(json.name);
            $('#ecategory_desc').val(json.description);
            $('#ecategory_status').val(json.status);
            $('#added_by').val(json.added_by);
            $('#created_at').val(json.created_at);
            $('#id').val(json.id);
            $('#trid').val(trid);
      }
    })
    })

    $(document).on('click','.delete_category',function(event){
        event.preventDefault();
        var id=$(this).data('id');
      if(confirm("دڵنیایت لە سرینەوەی؟")){
          $.ajax({
            url:'category_api.php',
            type:'POST',
            data:{
                id:id,
                delete:true
            },
            success:function(data){
              var json=JSON.parse(data);
              success=json.success
              $('#'+id).closest('tr').remove();
          }
           
        }) }
    })
  
    function deleteAll(){
      var checked=$('#check[name="check[]"]').filter(':checked');
      var checked_id=new Array();
      checked.each(function(){
          checked_id.push($(this).val());
      });
      for (let i = 0; i < checked_id.length; i++) {
      $.ajax({
          url: 'category_api.php',
          type: 'POST',
          data: {
              id:checked_id[i],
              delete:true
          },success: function(data){
            mytable = $('#category_table').DataTable();
            mytable.draw();
          }
      })
    }
    }