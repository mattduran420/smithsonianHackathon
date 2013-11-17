
var edan = {

	// courtest of stack overflow...
	make_base_auth: function(user, password) {
		var tok = user + ':' + password;
		var hash = Base64.encode(tok);
		return "Basic " + hash;
	},

	exec: function(rurl, callback) {
		    $.ajax({
		      url      : rurl,
		      type     : 'GET',
		      headers  : { Authorization: this.make_base_auth('HACK', 'hackme2013!') },
		      success  : callback,
		      error    : function(){ console.log('error'); }
		    });

		},


	addToList: function (itemId, listId, callback) {

		var url = "http://edan-api.si.edu/api/list?action=add&itemId=" + itemId + "&listId=" + listId;
		$.get(url, {}, callback);
	},

	getListData: function (listId, callback) {

		var url = "http://edan-api.si.edu/collectService?sl.type=lists&sl.action=review&sl.owner=artpass"
				+ "&sl.id=" + listId
				+ "&sl.min.private=0&wt=json";
		
		this.exec(url, callback);
	}
};