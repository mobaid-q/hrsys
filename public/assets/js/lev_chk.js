function qty_chk() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    // var qty = jQuery('#il_qty').val();
    var quo = jQuery('#ilq_id').val();
    var qString = 'quo='+quo;
    var type = "POST";
    var ajaxurl = '/get_rem_lev';
    $.ajax({
        type: type,
        url: ajaxurl,
        data: qString,
        success: function(result) {
            jQuery('#il_qty').attr('max', result);
            var alt = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Leaves should be less than '+result+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            jQuery('#alert_lev_days').html(alt);
        }
    });
}
