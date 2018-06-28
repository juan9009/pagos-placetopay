$(document).ready(function () {
    // $(".loading").hide();
    $("input[type=submit]").click(function () {
        // $(".loading").show();
        $(".loading").removeClass('hide');
    });

    $(document).on('change','input, select',function(){
        $('.alert').remove();
   });
});