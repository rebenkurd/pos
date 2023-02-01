


$(document).on('submit','#add_purchase',
function(e){
    e.preventDefault();
    var purchase_code =$('#purchase_code').val();
    var item_id =[];
    var item_name =[];
    var item_quantity =[];
    var item_price =[];
    var item_discount_amount =[];
    var item_tax =[];
    var item_tax_amount =[];
    var item_unit_cost =[];
    var item_total_price =[];
    $('#item_id[name="item_id[]"]').each(function(){
        item_id.push($(this).val());
    });
    $('#item_name[name="item_name[]"]').each(function(){
        item_name.push($("#item_name").val());
    });
    $('#item_qty[name="item_qty[]"]').each(function(){
        item_quantity.push($(this).val());
    });
    $('#item_price[name="item_price[]"]').each(function(){
        item_price.push($(this).val());
    });
    $('#item_discount_amount[name="item_discount_amount[]"]').each(function(){
        item_discount_amount.push($(this).val());
    });
    $('#item_tax[name="item_tax[]"]').each(function(){
        item_tax.push($(this).val());
    });
    $('#item_tax_amount[name="item_tax_amount[]"]').each(function(){
        item_tax_amount.push($(this).val());
    });
    $('#item_unit_cost[name="item_unit_cost[]"]').each(function(){
        item_unit_cost.push($(this).val());
    });
    $('#item_total_price[name="item_total_price[]"]').each(function(){
        item_total_price.push($(this).val());
    });

    for (let i = 0; i < item_id.length; i++) {
        $.ajax({
            url:"item_api.php",
            type:"POST",
            data:{
                purchase_code:purchase_code,
                name:item_name[i],
                quantity:item_quantity[i],
                price:item_price[i],
                discount_amount:item_discount_amount[i],
                tax:item_tax[i],
                tax_amount:item_tax_amount[i],
                unit_cost:item_unit_cost[i],
                total_price:item_total_price[i],
                add:true
            },
            success:function(data){
                var json = JSON.parse(data);
                var success = json.success;
                if(success=="true"){
                    console.log("success")
                }else{
                    console.log("there is error");
                }
            }
        })
    }
})