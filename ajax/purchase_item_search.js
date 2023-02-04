$(function(){

	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"purchase_api.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#search-result').html(data);
			}
		});
	}
	
	$('#item_search').keyup(function(){
		var search = $(this).val();
		$("#search-result").show();
		if(search != '')
		{
			load_data(search);
		}

		else
		{
			load_data();			
		}
	});

 
$("#search-result").on('click',function(event){
    event.preventDefault()
    var id = $(event.target).attr('id');
    $.ajax({
      url:"purchase_api.php",
  type:"POST",
      data:{
          id:id,
          fetch_all:true
      },
      success:function(data){
         $("#item_table tbody").append(data);
        //  var a=$("#beep")[0];
        //  a.play();
        $("#search-result").hide();
        //   Quantity button click event
        var rows=$("#item_table tbody tr");
        rows.each(function(id){
          console.log($(this).attr('id','tr_'+id));

          $("#tr_"+id+" #item_btn_plus, #tr_"+id+" #item_btn_minus").click(function(){
            var $qty = $("#tr_"+id+" #item_qty");
            var currentVal = parseInt($qty.val());
            if ($(this).hasClass("item_btn_plus")) {
                $qty.val(currentVal + 1);
            } else {
              if(currentVal>1){
                $qty.val(currentVal - 1);
              }
            }
            calculatePrice();
            totals();
          });

          $("#tr_"+id+" #item_qty,#tr_"+id+" #item_tax").change(function(){
            calculatePrice();
          });
          // Calculate price function
          function calculatePrice() {
            var $price = $("#tr_"+id+" #item_price").val();
            var $discountType = $("#tr_"+id+" #item_discount_type").val();
            var $discountAmount = $("#tr_"+id+" #item_discount_amount").val();
            var $tax = $("#tr_"+id+" #item_tax").val();
            var $quantity = $("#tr_"+id+" #item_qty").val();
            var $taxAmount = ((parseFloat($price) * $tax/100)- $discountAmount) * $quantity;
            var taxAmount = ((parseFloat($price) * $tax/100)- $discountAmount);
            var taxAmount2 = ((parseFloat($price) * $tax/100));
            var discountAmount = $discountAmount * $quantity;
            var finalPrice;
            var purchasePrice;
            if($discountType == "per"){
              finalPrice = ((($price * $quantity) + parseFloat($taxAmount))) - (parseFloat($price) * parseFloat(discountAmount) / 100);
              purchasePrice = parseFloat($price) + parseFloat(taxAmount) - (parseFloat($price) * parseFloat($discountAmount) / 100);
            }
            else{
              $taxAmount = (taxAmount2-$discountAmount/10)*$quantity;   
              $taxAmount3= (taxAmount2-$discountAmount/10);   
              purchasePrice = (parseFloat($price) + parseFloat($taxAmount3)- ($discountAmount));
              finalPrice = ((($price*$quantity)) + (parseFloat($taxAmount))) - (parseFloat($discountAmount)*$quantity);
            }
        
        
            $("#tr_"+id+" #item_tax_amount").val($taxAmount.toFixed(2));
            $("#tr_"+id+" #item_unit_cost").val(purchasePrice.toFixed(2));
            $("#tr_"+id+" #item_total_price").val(finalPrice.toFixed(2));
          }
          // On form change event
            calculatePrice();

          $("#tr_"+id+" #btn_remove_item").click(function(){
            $(this).closest('tr').remove();
          })
          
        })


      function calculateGrandTotal() {
        var totalQuantity = parseInt($('#total_quantity').text());
        var totalPrice = parseFloat($('#total_price').text());
        var otherCharges = parseFloat($('#other_charges').text());
        var discount = parseFloat($('#discount_all').text());

        var grandTotal = totalPrice + otherCharges - discount;
        $('#gtotal').text(grandTotal.toFixed(2));
      }

      function totals(){
        var totalQuantity = 0;
        var totalPrice = 0;
        $('#item_table tbody tr').each(function() {
          totalQuantity += parseInt($(this).find('#item_qty').val());
          totalPrice += parseFloat($(this).find('#item_total_price').val());
        });
        $('#total_quantity').text(totalQuantity);
        $('#total_price').text(totalPrice.toFixed(2));
        calculateGrandTotal();
      };

      $("#tax_amount,#tax").change(function(){
        var $taxAmount=$("#tax_amount").val();
        var tax=$("#tax").val();
        if(tax !=0){
          var taxAmount=parseFloat($taxAmount)* (tax/100);
          var otherCharges=parseFloat($taxAmount)+taxAmount;
        }else{
          var otherCharges=parseFloat($taxAmount);
        }

        $("#other_charges").text(otherCharges.toFixed(2))
        calculateGrandTotal();
      })


      $("#discount,#discount_type").change(function(){
        var orginalPrice=$("#total_price").text();
        var $discountAmount=$("#discount").val();
        var discountType=$("#discount_type").val();
        if(discountType =="per"){
          var discountAmount=parseFloat(orginalPrice)*($discountAmount/100);
          var grandTotal=parseFloat(orginalPrice)-discountAmount.toFixed(2);
        }else{
          var discountAmount=$discountAmount/1;
          var grandTotal=parseFloat(orginalPrice)- parseFloat(discountAmount);
        }
        $("#discount_all").text(discountAmount.toFixed(2))
        calculateGrandTotal();
      })
      totals();

      }
  })
  
    })



    var rows=$("#item_table tbody tr");
    rows.each(function(id){
      console.log($(this).attr('id','tr_'+id));

      $("#tr_"+id+" #item_btn_plus, #tr_"+id+" #item_btn_minus").click(function(){
        var $qty = $("#tr_"+id+" #item_qty");
        var currentVal = parseInt($qty.val());
        if ($(this).hasClass("item_btn_plus")) {
            $qty.val(currentVal + 1);
        } else {
          if(currentVal>1){
            $qty.val(currentVal - 1);
          }
        }
        calculatePrice();
        totals();
      });

      $("#tr_"+id+" #item_qty,#tr_"+id+" #item_tax").change(function(){
        calculatePrice();
      });
      // Calculate price function
      function calculatePrice() {
        var $price = $("#tr_"+id+" #item_price").val();
        var $discountType = $("#tr_"+id+" #item_discount_type").val();
        var $discountAmount = $("#tr_"+id+" #item_discount_amount").val();
        var $tax = $("#tr_"+id+" #item_tax").val();
        var $quantity = $("#tr_"+id+" #item_qty").val();
        var $taxAmount = ((parseFloat($price) * $tax/100)- $discountAmount) * $quantity;
        var taxAmount = ((parseFloat($price) * $tax/100)- $discountAmount);
        var taxAmount2 = ((parseFloat($price) * $tax/100));
        var discountAmount = $discountAmount * $quantity;
        var finalPrice;
        var purchasePrice;
        if($discountType == "per"){
          finalPrice = ((($price * $quantity) + parseFloat($taxAmount))) - (parseFloat($price) * parseFloat(discountAmount) / 100);
          purchasePrice = parseFloat($price) + parseFloat(taxAmount) - (parseFloat($price) * parseFloat($discountAmount) / 100);
        }
        else{
          $taxAmount = (taxAmount2-$discountAmount/10)*$quantity;   
          $taxAmount3= (taxAmount2-$discountAmount/10);   
          purchasePrice = (parseFloat($price) + parseFloat($taxAmount3)- ($discountAmount));
          finalPrice = ((($price*$quantity)) + (parseFloat($taxAmount))) - (parseFloat($discountAmount)*$quantity);
        }
    
    
        $("#tr_"+id+" #item_tax_amount").val($taxAmount.toFixed(2));
        $("#tr_"+id+" #item_unit_cost").val(purchasePrice.toFixed(2));
        $("#tr_"+id+" #item_total_price").val(finalPrice.toFixed(2));
      }
      // On form change event
        calculatePrice();

      $("#tr_"+id+" #btn_remove_item").click(function(e){
        if($("#item_id").val()==""){
          $(this).closest('tr').remove();
        }else{
          var id=$("#item_id").val();
        if(confirm("دڵنیایت لە سرینەوەی؟")){
          $.ajax({
            url:'item_api.php',
            data:{
                id:id,
                delete:true
            },
            type:'POST',
            success:function(data){
              var json=JSON.parse(data);
              success=json.success;
              $(e.target).closest('tr').remove();
          }
          
    })}


        }
      })
      
    })


  function calculateGrandTotal() {
    var totalQuantity = parseInt($('#total_quantity').text());
    var totalPrice = parseFloat($('#total_price').text());
    var otherCharges = parseFloat($('#other_charges').text());
    var discount = parseFloat($('#discount_all').text());

    var grandTotal = totalPrice + otherCharges - discount;
    $('#gtotal').text(grandTotal.toFixed(2));
  }

  function totals(){
    var totalQuantity = 0;
    var totalPrice = 0;
    $('#item_table tbody tr').each(function() {
      totalQuantity += parseInt($(this).find('#item_qty').val());
      totalPrice += parseFloat($(this).find('#item_total_price').val());
    });
    $('#total_quantity').text(totalQuantity);
    $('#total_price').text(totalPrice.toFixed(2));
    calculateGrandTotal();
  };

  $("#tax_amount,#tax").change(function(){
    var $taxAmount=$("#tax_amount").val();
    var tax=$("#tax").val();
    if(tax !=0){
      var taxAmount=parseFloat($taxAmount)* (tax/100);
      var otherCharges=parseFloat($taxAmount)+taxAmount;
    }else{
      var otherCharges=parseFloat($taxAmount);
    }

    $("#other_charges").text(otherCharges.toFixed(2))
    calculateGrandTotal();
  })


  $("#discount,#discount_type").change(function(){
    var orginalPrice=$("#total_price").text();
    var $discountAmount=$("#discount").val();
    var discountType=$("#discount_type").val();
    if(discountType =="per"){
      var discountAmount=parseFloat(orginalPrice)*($discountAmount/100);
      var grandTotal=parseFloat(orginalPrice)-discountAmount.toFixed(2);
    }else{
      var discountAmount=$discountAmount/1;
      var grandTotal=parseFloat(orginalPrice)- parseFloat(discountAmount);
    }
    $("#discount_all").text(discountAmount.toFixed(2))
    calculateGrandTotal();
  })
  totals();


  




//     var arg = {
//       resultFunction: function(result) {
//         var barcode=result.code;
//         $.ajax({
//         url:"purchase_api.php",
// 		type:"POST",
//         data:{
// 			      id:barcode,
//             fetch_all:true
//         },
//         success:function(data){
//           alert(data)
//  			    $("#item_table tbody").append(data);
//         	$("#search-result").hide();
//           //   Quantity button click event
//           var rows=$("#item_table tbody tr");
//           rows.each(function(id){
//             console.log($(this).attr('id','tr_'+id));

//             $("#tr_"+id+" #item_btn_plus, #tr_"+id+" #item_btn_minus").click(function(){
//               var $qty = $("#tr_"+id+" #item_qty");
//               var currentVal = parseInt($qty.val());
//               if ($(this).hasClass("item_btn_plus")) {
//                   $qty.val(currentVal + 1);
//               } else {
//                 if(currentVal>1){
//                   $qty.val(currentVal - 1);
//                 }
//               }
//               calculatePrice();
//               totals();
//             });

//             $("#tr_"+id+" #item_qty").change(function(){
//               calculatePrice();
//             });
//             // Calculate price function
//             function calculatePrice() {
//               var $price = $("#tr_"+id+" #item_price").val();
//               var $discountType = $("#tr_"+id+" #item_discount_type").val();
//               var $discountAmount = $("#tr_"+id+" #item_discount_amount").val();
//               var $tax = $("#tr_"+id+" #item_tax").val();
//               var $quantity = $("#tr_"+id+" #item_qty").val();
//               var $taxAmount = ((parseFloat($price) * $tax/100)- $discountAmount) * $quantity;
//               var taxAmount = ((parseFloat($price) * $tax/100)- $discountAmount);
//               var taxAmount2 = ((parseFloat($price) * $tax/100));
//               var discountAmount = $discountAmount * $quantity;
//               var finalPrice;
//               var purchasePrice;
//               if($discountType == "per"){
//                 finalPrice = ((($price * $quantity) + parseFloat($taxAmount))) - (parseFloat($price) * parseFloat(discountAmount) / 100);
//                 purchasePrice = parseFloat($price) + parseFloat(taxAmount) - (parseFloat($price) * parseFloat($discountAmount) / 100);
//               }
//               else{
//                 $taxAmount = (taxAmount2-$discountAmount/10)*$quantity;   
//                 $taxAmount3= (taxAmount2-$discountAmount/10);   
//                 purchasePrice = (parseFloat($price) + parseFloat($taxAmount3)- ($discountAmount));
//                 finalPrice = ((($price*$quantity)) + (parseFloat($taxAmount))) - (parseFloat($discountAmount)*$quantity);
//               }
          
          
//               $("#tr_"+id+" #item_tax_amount").val($taxAmount.toFixed(2));
//               $("#tr_"+id+" #item_purchase_price").val(purchasePrice.toFixed(2));
//               $("#tr_"+id+" #item_final_price").val(finalPrice.toFixed(2));
//             }
//             // On form change event
//               calculatePrice();

//             $("#tr_"+id+" #btn_remove_item").click(function(){
//               $(this).closest('tr').remove();
//             })
            
//           })

          

          
//         function calculateGrandTotal() {
//           var totalQuantity = parseInt($('#total_quantity').text());
//           var totalPrice = parseFloat($('#total_price').text());
//           var otherCharges = parseFloat($('#other_charges').text());
//           var discount = parseFloat($('#discount_all').text());

//           var grandTotal = totalPrice + otherCharges - discount;
//           $('#gtotal').text(grandTotal.toFixed(2));
//         }

//         function totals(){
//           var totalQuantity = 0;
//           var totalPrice = 0;
//           $('tbody tr').each(function() {
//             totalQuantity += parseInt($(this).find('#item_qty').val());
//             totalPrice += parseFloat($(this).find('#item_final_price').val());
//           });
//           $('#total_quantity').text(totalQuantity);
//           $('#total_price').text(totalPrice.toFixed(2));
//           calculateGrandTotal();
//         };
//         totals();

//         $("#tax_amount,#tax").change(function(){
//           var $taxAmount=$("#tax_amount").val();
//           var tax=$("#tax").val();
//           if(tax !=0){
//             var taxAmount=parseFloat($taxAmount)* (tax/100);
//             var otherCharges=parseFloat($taxAmount)+taxAmount;
//           }else{
//             var otherCharges=parseFloat($taxAmount);
//           }

//           $("#other_charges").text(otherCharges.toFixed(2))
//           calculateGrandTotal();
//         })


//         $("#discount,#discount_type").change(function(){
//           var orginalPrice=$("#total_price").text();
//           var $discountAmount=$("#discount").val();
//           var discountType=$("#discount_type").val();
//           if(discountType =="per"){
//             var discountAmount=parseFloat(orginalPrice)*($discountAmount/100);
//             var grandTotal=parseFloat(orginalPrice)-discountAmount.toFixed(2);
//           }else{
//             var discountAmount=$discountAmount/1;
//             var grandTotal=parseFloat(orginalPrice)- parseFloat(discountAmount);
//           }
//           $("#discount_all").text(discountAmount.toFixed(2))
//           calculateGrandTotal();
//         })



//         }
//     })
//   }
// };
// $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();

})
