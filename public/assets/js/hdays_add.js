jQuery(document).ready(function($){
    $("#hday_add_btn").click(function () {
        var incr = jQuery('#incr').val();
        incr++;
        var hday_blk = " <div class='row mb-3' id='hday_blk_"+incr+"'><div class='col-4 hday_date'><input type='date' class='form-control' placeholder='Date of the holiday' name='ihd_date[]' id='ihd_date[]' required></div><div class='col rem_btn'><button type='button' onclick=rem_hday_blk("+incr+") class='btn btn-danger' >Remove</button></div></div> ";
        jQuery('#hday_blk').append(hday_blk);
        jQuery('#incr').val(incr);
    });   
});

function rem_hday_blk(id) {
    jQuery('#hday_blk_'+id).remove();
}
