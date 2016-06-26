/*
 全站模块启动js
 heiniu@guang.com 
 2012-08-14
 */
seajs.config({
	//配置路径别名
	alias: {
		"jquery" : "jquery/1.7.1/jquery",
		"json" : "module/json",
		"doT" : "module/doT.min",
		"ga" : "app/ga",
		"guang" : "app/guang",
		"track" : "app/track_info"
	},
	//预加载基础文件
    preload: [
      "jquery", 
	  //"seajs/plugin-combo", 
	  this.JSON ? '' : 'json'
    ],
	debug : true,
    map: [
    	[ /^(.*\.(?:css|js))(.*)$/i, '$1?t=' + GUANGER.staticVersion + '.js' ]//时间戳
    ],
    base: 'http://static.guang.com/js/front/'
	//comboSyntax: ['?', '&'],
	//comboExcludes: /jquery\.js/ // 从 combo 中排除掉 jquery.js 
});

//封装加载文件方法
define(function(require, exports) {
  require('guang');
  require('track');
  exports.load = function(filename) {
	if (!('forEach' in Array.prototype)) {//ie6-ie8不支持forEach
	    Array.prototype.forEach= function(action, that /*opt*/) {
	        for (var i= 0, n= this.length; i<n; i++)
	            if (i in this)
	                action.call(that, this[i], i, this);
	    };
	}
    filename.split(',').forEach(function(modName) {
        if (modName) {
            require.async(modName, function(mod) {
                if (mod && mod.init) {
                    mod.init();
                }
            });
        }
    });
  };
  
  //全站都需要加载的通用模块
  require.async('ga');
  require.async(['app/shareGuang', 'app/searchSuggest', 'app/common', 'module/jquery.cookie'], function(shareGuang, searchSuggest, common, cookie){});
  
});