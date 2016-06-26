define(function(require, exports) {
	var $ = jQuery = require("jquery");
	/*
	 * 获取客户端信息，做统计分析
	 */
	require("module/jquery.cookie");
	(function() {
		var BrowserDetect = {

			getVersion : function(browser) {

				var ua = navigator.userAgent;
				switch(browser) {
					case "MSIE":
						try {
							var regx = new RegExp(/msie \d+(\.(\d+))/i);
							var browserFlag = ua.match(regx)[0];
							var regxVersion = new RegExp(/\d+(\.?(\d+))/);
							var type = browserFlag.match(regxVersion)[0];
							var info = "IE/" + type;
						} catch(e) {
							var info = null;
						};

						break;
					case "Chrome":
						try {
							var regx = new RegExp(/Chrome\/\d+\.\d+\.\d+\.\d+/);
							var browserFlag = ua.match(regx)[0];
							var regxVersion = new RegExp(/\d+\.\d+\.\d+\.\d+/);
							var type = browserFlag.match(regxVersion)[0];
							var info = "Chrome/" + type;
						} catch(e) {
							var info = null;
						};
						break;
					case "Firefox":
						try {
							var regx = new RegExp(/Firefox\/\d+\.([a-z0-9\.]*)/i);
							var browserFlag = ua.match(regx)[0];
							var regxVersion = new RegExp(/\d+\.([a-z0-9\.]*)/);
							var type = browserFlag.match(regxVersion)[0];
							var info = "Firefox/" + type;
						} catch(e) {
							var info = null;
						};
						break;
					case "Apple":
						try {
							var regx = new RegExp(/Safari\/\d+\.\d+\.\d+/i);
							var browserFlag = ua.match(regx)[0];
							var regxVersion = new RegExp(/\d+\.\d+\.\d+/);
							var type = browserFlag.match(regxVersion)[0];
							var info = "Safari/" + type;
						} catch(e) {
							var info = null;
						};
						break;
					case "Netscape":
						try {
							var regx = new RegExp(/(navigator|netscape)\/\d+\.[a-z0-9\.]+/i);
							var browserFlag = ua.match(regx)[0];
							var regxVersion = new RegExp(/\d+\.[a-z0-9\.]+/i);
							var type = browserFlag.match(regxVersion)[0].replace(/\s+/g, "");
							var info = "Netscape/" + type;
						} catch(e) {
							var info = null;
						};
						break;
					default:
						info = null;
				};
				return info;

			},

			init : function() {
				this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
				this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "an unknown version";
				this.OS = this.searchString(this.dataOS) || "an unknown OS";
			},
			getInfo : function() {
				var info = {};
				info.resolution = window.screen.width + "x" + window.screen.height;
				//分辨率
				info.referrerinfo = document.referrer;
				//referrer
				info.url = window.location.href;
				//URL
				info.useragent = navigator.userAgent;
				info.cookie = $.cookie('JSESSIONID');
				return info;
			},

			//获取客户端操作系统
			detectOS : function() {
				var sUserAgent = navigator.userAgent;

				var is_mobile = /; U/i.test(sUserAgent) || /android/i.test(sUserAgent) || /iphone|ipod|ipad/i.test(sUserAgent) || /nokia/i.test(sUserAgent) || /mobile/i.test(sUserAgent);
				var is_iPad = /ipad/gi.test(window.navigator.platform);
				if (is_mobile && is_iPad)
					return "IOS/iPad";
				var is_android = /android/i.test(sUserAgent);
				if (is_mobile && is_android)
					return "Android";

				var is_blackberry = /blackberry/i.test(sUserAgent);
				if (is_mobile && is_blackberry)
					return "BlackBerry";

				var is_iPhone = /iPhone/gi.test(window.navigator.platform);
				if (is_mobile && is_iPhone && !is_iPad)
					return "IOS/iPhone";

				var is_iPod = /iPod/gi.test(window.navigator.platform);
				if (is_mobile && is_iPod)
					return "IOS/iPod";

				var is_windowPhone = /windows phone/i.test(sUserAgent);
				if (is_mobile && is_windowPhone)
					return "Windows Phone";

				var is_nokia = /nokia/i.test(sUserAgent);
				if (is_mobile && is_nokia)
					return "Symbian";

				var isWin = (navigator.platform == "Win32") || (navigator.platform == "Windows");
				var isMac = (navigator.platform == "Mac68K") || (navigator.platform == "MacPPC") || (navigator.platform == "Macintosh") || (navigator.platform == "MacIntel");
				if (isMac)
					return "Mac";
				var isUnix = (navigator.platform == "X11") && !isWin && !isMac;
				if (isUnix)
					return "Unix";
				var isLinux = (String(navigator.platform).indexOf("Linux") > -1);
				if (isLinux)
					return "Linux";
				if (isWin) {
					var isWin2K = sUserAgent.indexOf("Windows NT 5.0") > -1 || sUserAgent.indexOf("Windows 2000") > -1;
					if (isWin2K)
						return "Win2000";
					var isWinXP = sUserAgent.indexOf("Windows NT 5.1") > -1 || sUserAgent.indexOf("Windows XP") > -1;
					if (isWinXP)
						return "WinXP";
					var isWin2003 = sUserAgent.indexOf("Windows NT 5.2") > -1 || sUserAgent.indexOf("Windows 2003") > -1;
					if (isWin2003)
						return "Win2003";
					var isWinVista = sUserAgent.indexOf("Windows NT 6.0") > -1 || sUserAgent.indexOf("Windows Vista") > -1;
					if (isWinVista)
						return "WinVista";
					var isWin7 = sUserAgent.indexOf("Windows NT 6.1") > -1 || sUserAgent.indexOf("Windows 7") > -1;
					if (isWin7)
						return "Win7";
				}

				return "other";
			},
			searchString : function(data) {
				for (var i = 0; i < data.length; i++) {
					var dataString = data[i].string;
					var dataProp = data[i].prop;
					this.versionSearchString = data[i].versionSearch || data[i].identity;
					if (dataString) {
						if (dataString.indexOf(data[i].subString) > -1) {
							var ret = this.getVersion(data[i].subString);
							if (ret != null) {
								return ret;
							} else {
								return data[i].identity;
							}
						};
					} else if (dataProp)
						return data[i].identity;
				}
			},
			searchVersion : function(dataString) {
				var index = dataString.indexOf(this.versionSearchString);
				if (index == -1)
					return;
				return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
			},
			dataBrowser : [{
				string : navigator.userAgent,
				subString : "Chrome",
				identity : "Chrome"
			}, {
				string : navigator.userAgent,
				subString : "OmniWeb",
				versionSearch : "OmniWeb/",
				identity : "OmniWeb"
			}, {
				string : navigator.vendor,
				subString : "Apple",
				identity : "Safari",
				versionSearch : "Version"
			}, {
				prop : window.opera,
				identity : "Opera",
				versionSearch : "Version"
			}, {
				string : navigator.vendor,
				subString : "iCab",
				identity : "iCab"
			}, {
				string : navigator.vendor,
				subString : "KDE",
				identity : "Konqueror"
			}, {
				string : navigator.userAgent,
				subString : "Firefox",
				identity : "Firefox"
			}, {
				string : navigator.vendor,
				subString : "Camino",
				identity : "Camino"
			}, {// for newer Netscapes (6+)
				string : navigator.userAgent,
				subString : "Netscape",
				identity : "Netscape"
			}, {
				string : navigator.userAgent,
				subString : "MSIE",
				identity : "Explorer",
				versionSearch : "MSIE"
			}, {
				string : navigator.userAgent,
				subString : "Gecko",
				identity : "Mozilla",
				versionSearch : "rv"
			}, {// for older Netscapes (4-)
				string : navigator.userAgent,
				subString : "Mozilla",
				identity : "Netscape",
				versionSearch : "Mozilla"
			}],
			dataOS : [{
				string : window.navigator.platform,
				subString : "iPad",
				identity : "iPad"
			}, {
				string : navigator.platform,
				subString : "Win",
				identity : "Windows"
			}, {
				string : navigator.platform,
				subString : "Mac",
				identity : "Mac"
			}, {
				string : navigator.userAgent,
				subString : "iPhone",
				identity : "iPhone/iPod"
			}, {
				string : navigator.platform,
				subString : "Linux",
				identity : "Linux"
			}]

		};
		BrowserDetect.init();

		var getInfo = BrowserDetect.getInfo();

		$.ajax({
			url : GUANGER.path + "/track",
			type : "post",
			dataType : "json",
			data : {
				url : getInfo.url,
				referrer : getInfo.referrerinfo,
				cookie : getInfo.cookie,
				browser : BrowserDetect.browser,
				userAgent : getInfo.useragent,
				os : BrowserDetect.detectOS(),
				resolution : getInfo.resolution
			}
		});
	})();

}); 
