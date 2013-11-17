
var edan = {

	addToFavorites: function (record_id, user, callback) {

		var url = "addToFavorites.php?ls.id=" + user + "&record_id=" + record_id;
		$.get(url, {}, callback);
	},

	getFavorites: function (user, callback) {

		var url = "getFavorites.php?ls.id=" + user;
		$.get(url, {}, callback);
	}
};
