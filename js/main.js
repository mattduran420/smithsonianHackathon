
var gUser = 'Martin';

function switchUser() {
	gUser = result;
}

function onScan(result) {
  switchUser(result);
  alert(result)
  $('#bottomSection').show();
  $("#userInfo").append(/[^/]*$/.exec(result)[0])
}

function onAddFavorites(result) {
  alert('added ' + result);
}

