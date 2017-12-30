jQuery(document).ready(function(){
    jQuery("#frmAddProduct").validate({
        rules: {
            product_name: {
                required: true
            },
            price: {
                required: true,
                number:true
            },

            quantity: {
                required: true,
                number:true
            }
        },
        submitHandler: function(form) {
            var token = jQuery('input[name="_token"]').val();
            var product_name = jQuery('#product_name').val();
            var price = jQuery('#price').val();
            var quantity = jQuery('#quantity').val();

            jQuery.ajax({
                url: '/skilltest',
                type: 'POST',
                data: {"_token": token, product_name: product_name, price: price, quantity: quantity},
                success: function (resp) {
                    updateProductList();
                }
            });
        }
    });
});

function updateProductList() {
    var token = jQuery('input[name="_token"]').val();
    jQuery.ajax({
        url: '/skilltest/getProducts',
        type: 'GET',
        data: {"_token": token},
        success: function (resp) {
            //console.log(resp);
            jQuery("#producttable tbody").html(resp);
        }
    });
}