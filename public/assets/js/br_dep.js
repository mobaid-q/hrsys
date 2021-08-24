function br_dep() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var bid = jQuery('#ibr_id').val();
    var qString = 'bid='+bid;
    var type = "POST";
    var ajaxurl = '/get_brxdept';
    $.ajax({
        type: type,
        url: ajaxurl,
        data: qString,
        success: function(result) {
            var old_html = "<option selected value=''>Select assigned department</option>";
            jQuery('#id_id').html(old_html);
            jQuery('#id_id').append(result);
        }
    });
}
