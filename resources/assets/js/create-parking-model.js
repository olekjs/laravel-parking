global.$ = global.jQuery = require('jquery');

jQuery(document).ready(function() {
    class Model {
        constructor() {
            this.addLevelElement();
            this.createLevels();
        }
        test() {
            //tu bedzie wyswietlenie wszystkich elementow - edycja
        }

        addLevelElement() {
            let i = 1;
            $('.level-add').on('click', () => {
                let element = "<div class='col-md-5'><label for='level'>Number of parking spaces on level <span class='level-number'>" 
                + i + 
                "</span></label><input type='number' name='level' id='level' data-level='"
                + i + 
                "' class='form-control level-properties' required></div>";
                i++;

                //do zaorania :)

                this.appendLevelElement(element);
                this.removeLevelElement();
            });
        }

        appendLevelElement(element) {
            $('.level-group').append(element);
        }

        removeLevelElement() {
            $('.level-delete').on('click', () => {
                $('#level').parent().remove();
            });
        }

        setTotalValues() {
            let totalSpaces = 0;
            let totalLevels = 0;

            for (let i = 0; i < this.getElementLength(); i++) {
                totalLevels = $('.level-properties')[i].attributes[3].value;
                let space = $('.level-properties')[i].value;
                totalSpaces += parseInt(space);
            }

            $("input[name='level_total']").val(totalLevels);
            $("input[name='spaces_total']").val(totalSpaces);
        
        }

        getElementLength() {
            let elements = $('.level-properties');

            return elements.length;
        }

        getParkingLevels() {
            this.setValidationLevelValue();
            let elementArr = [];
            
            for (let i = 0; i < this.getElementLength(); i++) {
                elementArr[i] = new Array($('.level-properties')[i].attributes[3].value, $('.level-properties')[i].value);
            }

            return elementArr;
        }

        setValidationLevelValue() {
            return $("input[name='level_val']").val(1);
        }

        getLevelId() {
            return $("input[name='level_id']").val();
        }

        createLevels() {
            $('.level-save').on('click', () => {
                if ($('.level-properties').length == 0) {

                    return alert('You must add min. 1 level to parking model');

                } else {
                    this.setTotalValues();

                    $.post('save-parking-level', {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        values:   this.getParkingLevels(),
                        level_id: this.getLevelId(),
                    }, function(data) {
                    //
                    });
                }
            });
    }

    }
    new Model();
});