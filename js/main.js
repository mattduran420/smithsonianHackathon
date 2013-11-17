
var gUser = 'Martin';

function switchUser() {
	gUser = result;
}

function onScan(result) {
  switchUser(result);
  $('#bottomSection').show();
  $("#userInfo").append(/[^/]*$/.exec(result)[0])
  $('#video').toggle();
}

function onAddFavorites(result) {
  alert('added ' + result);
}

