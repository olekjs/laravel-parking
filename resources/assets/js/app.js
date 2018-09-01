require('./bootstrap');

import $ from 'jquery';
global.$ = global.jQuery = require('jquery');

require("jquery-ui/ui/widgets/draggable");

// require('./jquery-ui');


import 'webpack-jquery-ui/css'
import 'webpack-jquery-ui' 
import 'jquery-ui/ui/widgets/datepicker.js';


window.jQuery = $;
