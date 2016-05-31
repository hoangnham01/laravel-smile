$(document).ready(function(){
    $('.smile-per-page').change(function(){
        $(this).parents('form').submit();
    });
});