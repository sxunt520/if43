// Simple Set local storage
// Author: water2212683@gmail.com

var LocalStorage = {
	
	version: "1.0.0",
	clients: {}, // registered upload clients on page, indexed by id
	moviePath: "http://static.guang.com/js/front/module/localstorage.swf",
	nextId: 1, // ID of next movie
	
	setMoviePath: function(path) {
		// set path to localstorage.swf
		this.moviePath = path;
	},
	
	dispatch: function(id) {
		// receive event from flash movie, send to client		
		var client = this.clients[id];
		if (client) {
			client.loadSwfReady();
		}
	},
	
	register: function(id, client) {
		// register new client to receive events
		this.clients[id] = client;
	},
	
	Client:function(){
		// constructor for new simple upload client
		this.handlers = {};
		
		// unique ID
		this.id = ZeroClipboard.nextId++;
		this.movieId = 'LocalStorageMovie_' + this.id;
		
		// register client with singleton to receive flash events
		ZeroClipboard.register(this.id, this);
		
		// create movie
		if (elem) this.insertMovie(elem);
	}
}
LocalStorage.Client.prototype={

	id: 0, // unique ID for us
	ready: false, // whether movie is ready to receive events or not
	movie: null, // reference to movie object
	
	insertMovie:function(){
		this.div = document.createElement('div');
		var style = this.div.style;
		style.display = 'none';
		var appendElem = document.getElementsByTagName('body')[0];
		appendElem.appendChild(this.div);
		this.div.innerHTML = this.getHTML();
	},
	
	getHTML: function() {
		// return HTML for movie
		var html = '';
		var flashvars = 'id=' + this.id;
		if (navigator.userAgent.match(/MSIE/)) {
			// IE gets an OBJECT tag
			var protocol = location.href.match(/^https/i) ? 'https://' : 'http://';
			html += '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="'+protocol+'download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="1" height="1" id="'+this.movieId+'" align="middle"><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="false" /><param name="movie" value="'+LocalStorage.moviePath+'" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="best" /><param name="bgcolor" value="#ffffff" /><param name="flashvars" value="'+flashvars+'"/><param name="wmode" value="transparent"/></object>';
		}
		else {
			// all other browsers get an EMBED tag
			html += '<embed id="'+this.movieId+'" src="'+LocalStorage.moviePath+'" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="1" height="1" name="'+this.movieId+'" align="middle" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="'+flashvars+'" wmode="transparent" />';
		}
		return html;
	},
	
	setStorage: function(data) {
		// set local data
		if (this.ready) this.movie.set(newText);
	},
	
	getStorage: function(newText) {
		// get local data
		if (this.ready) this.movie.get(newText);
	},
	
	removeStorage: function(newText) {
		// remove local data
		if (this.ready) this.movie.remove(newText);
	},
	
	loadSwfReady: function(eventName, args) {
		// movie claims it is ready, but in IE this isn't always the case...
		// bug fix: Cannot extend EMBED DOM elements in Firefox, must use traditional function
		this.movie = document.getElementById(this.movieId);
		if (!this.movie) {
			var self = this;
			setTimeout( function() { self.loadSwfReady(); }, 100 );
			return;
		}
		
		// firefox on pc needs a "kick" in order to set these in certain cases
		if (!this.ready && navigator.userAgent.match(/Firefox/) && navigator.userAgent.match(/Windows/)) {
			var self = this;
			setTimeout( function() { self.loadSwfReady(); }, 100 );
			this.ready = true;
			return;
		}
		
		this.ready = true;
	}
}
	
	