function smileNotify(type, data){
    var _data = {
        title: data,
        text: '',
        type: 'error',
        styling: 'bootstrap3'
    };
    if(typeof data === 'object'){
        _data.title = data.title;
        _data.text = data.msg || '';
    }
    new PNotify(_data);
}
$(document).ready(function(){
    $('.smile-per-page').change(function(){
        var $form = $(this).parents('form');
        $form.find('input, textarea');
        $(this).parents('form').submit();
    });
});