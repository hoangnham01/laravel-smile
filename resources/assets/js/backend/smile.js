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
tinymce.init({
    selector: '.tinymce-editor',
    height: 400,
    theme: 'modern',
    //language: 'vi_VN',
    //language_url : '/languages/vi.js',  // site absolute URL
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons',
    image_advtab: true,
    /*templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
    ],*/
    content_css: [
        '//www.tinymce.com/css/codepen.min.css'
    ]
});
$(document).ready(function(){
    $('.smile-per-page').change(function(){
        var $form = $(this).parents('form');
        $form.find('input, textarea');
        $(this).parents('form').submit();
    });
    $('.input-tags').tagsInput({
        width: 'auto'
    });
    $('.fileinput').fileinput();
});