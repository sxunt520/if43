define(function(require, exports){
	var $ = jQuery = require("jquery");
	require("module/validator")($);
	jQuery(function() {	
		$("#regCompleteForm").validator();
	});
});
