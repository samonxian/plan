/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

seajs.use('/style/js/sea.config');
var nvalidform;
define(function(require,exports,module) {
    require.async(['other/validform/validform.min',
        'n/compatibility/placeholder',
    ],function(validform){
        validform.valid();
    });
});





