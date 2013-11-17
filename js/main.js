
var gUser = 'Martin';

function switchUser() {
	gUser = result;
}

function onScan(result) {
  switchUser(result);
}

function onAddFavorites(result) {
  alert('added ' + result);
}

