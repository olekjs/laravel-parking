global.$ = global.jQuery = require('jquery');
//
jQuery(document).ready(function() {
    let i = 1;
    $('.level-add').on('click', function() {
        let element = "<div class='col-md-5'><label for='level'>Number of parking spaces on level <span class='level-number'>" + i + "</span></label><input type='number' name='level' id='level' data-level='" + i + "' class='form-control level-properties' required><div class='btn btn-danger level-delete'>X</div></div>";
        i++;
        $('.level-group').append(element);
        $('.level-delete').on('click', function() {
            $(this).parent().remove();
        });
    });
    //
    function getTotals() {
        let elements = $('.level-properties');
        let elementsLength = elements.length;
        let totalSpaces = 0;
        let totalLevels = 0;
        for (let i = 0; i < elementsLength; i++) {
            totalLevels = $('.level-properties')[i].attributes[3].value;

            let space = $('.level-properties')[i].value;
            totalSpaces += parseInt(space);
        }
        $("input[name='level_total']").val(totalLevels);
        $("input[name='spaces_total']").val(totalSpaces);
    }
    //
    function getParkingLevel() {
        let elements = $('.level-properties');
        let elementsLength = elements.length;
        let elementArr = [];
        $("input[name='level_val']").val(1);
        //
        for (let i = 0; i < elementsLength; i++) {
            elementArr[i] = new Array($('.level-properties')[i].attributes[3].value, $('.level-properties')[i].value);
        }
        //
        return elementArr;
    }

    function getLevelId() {
        return $("input[name='level_id']").val();
    }
    //
    $('.level-save').on('click', function() {
        if ($('.level-properties').length == 0) {
            return alert('You must add min. 1 level to parking model');
        } else {
            getTotals();
            $.post('save-parking-level', {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                values: getParkingLevel(),
                level_id: getLevelId(),
            }, function(data) {
                console.log(data);
            });
        }
    });
});