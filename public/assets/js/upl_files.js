jQuery(document).ready(function($){
    $("#file_add_btn").click(function () {
        var incr = jQuery('#incr').val();
        incr++;
        var upl_blk = " <div class='row mb-3' id='upl_blk_"+incr+"'><div class='col f_title'><input type='text' class='form-control' placeholder='Title' name='ifile_title[]' id='ifile_title[]' required></div><div class='col f_doc'><input type='file' class='form-control' name='idoc_files[]' id='idoc_files[]' required></div><div class='col rem_btn'><button type='button' onclick=rem_upl_blk("+incr+") class='btn btn-danger' >Remove</button></div></div> ";
        jQuery('#upl_blk').append(upl_blk);
        jQuery('#incr').val(incr);
    });   
});

function rem_upl_blk(id) {
    jQuery('#upl_blk_'+id).remove();
}
