global.$ = global.jQuery = require('jquery');
//
jQuery(document).ready(function() {
    //
    // $('#levels').on('change', function() {
    //     // $.get('admin/test', function(data) {
    //     //     console.log(data);
    //     // });
    //     let test = ['dupa1', 'dupa2'];
    //     $.post('test', {
    //         '_token': $('meta[name="csrf-token"]').attr('content'),
    //         values: test,
    //     }, function(data) {
    //         console.log(data);
    //     });
    // });
    //
    //
    let i = 1;
    $('.level-add').on('click', function() {
        let element = "<div class='col-md-5 test'><label for='level'>Number of parking spaces on level <span class='level-number'>" + i + "</span></label><input type='number' id='level' data-level='" + i + "' class='form-control'><div class='btn btn-danger level-delete'>X</div></div>";
        i++;
        $('.level-group').append(element);
        $('.level-delete').on('click', function() {
            $(this).parent().remove();
        });
    });
      $('.level-save').on('click', function() {
      	console.log( $('.test') );
      });
});