function emp_lq() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var eid = jQuery('#ie_id').val();
    var qString = 'eid='+eid;
    var type = "POST";
    var ajaxurl = '/get_emxlq';
    $.ajax({
        type: type,
        url: ajaxurl,
        data: qString,
        success: function(result) {
            var old_html = "<option value=''>Select leave quota</option>";
            jQuery('#ilq_id').html(old_html);
            jQuery('#ilq_id').append(result);
        }
    });
}