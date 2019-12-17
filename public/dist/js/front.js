$(document).ready(function(){

    $("#chSize").change(function(){
        var chidSize = $(this).val();

         if(chidSize == ""){
            return false;
        }
   
         $.ajax({
            type:'get',
            url:'/select-priceof-product',
            data:{chidSize:chidSize},
            success:function(resp){

            var precise = resp.split('#');
               


                $("#proPrice").html("$"+precise[0]);

                $("#price").val(precise[0]);

                if(precise[1]==0){
                    $("#shopbut").hide();
                    $("#purchasable").text("Out Of Stock");
                }else{
                    $("#shopbut").show();
                    $("#purchasable").text("In Stock");
                }


            },error:function(){
                alert("Error");
            }
        });

    });
 });


