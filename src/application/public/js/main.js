/*
* @LitePanel 3.0.1
* @Developed by Dominator!?
*/

/* РћС€РёР±РєРё, РїСЂРµРґСѓРїСЂРµР¶РґРµРЅРёСЏ... */
function showError(text) {
	var element = $('<div class="alert alert-danger"><strong>РћС€РёР±РєР°!</strong> ' + text + '</div>').prependTo('#content');
	setTimeout(function() {
		element.fadeOut(500, function() {
			$(this).remove();
		});
	}, 10000);
}
function showWarning(text) {
	var element = $('<div class="alert alert-warning"><strong>РџСЂРѕРІРµСЂРєР° РґР°РЅРЅС‹С…...</strong> ' + text + '</div>').prependTo('#content');
	setTimeout(function() {
		element.fadeOut(500, function() {
			$(this).remove();
		});
	}, 10000);
}
function showSuccess(text) {
	var element = $('<div class="alert alert-success"><strong>Р’С‹РїРѕР»РЅРµРЅРѕ!</strong> ' + text + '</div>').prependTo('#content');
	setTimeout(function() {
		element.fadeOut(500, function() {
			$(this).remove();
		});
	}, 10000);
}

function redirect(url) {
	document.location.href=url;
}

function reloadImage(img) {
	var src = $(img).attr('src');
	$(img).attr('src', src+'?'+Math.random());
};

function reload() {
	window.location.reload();
}

function setNavMode(mode) {
	switch(mode) {
		case "user":
		{
			$('#administratorNavModeBtn').removeClass("active");
			$('#userNavModeBtn').addClass("active");
			$('#administratorNavMode').hide();
			$('#userNavMode').fadeIn(500);
			break;
		}
		case "administrator":
		{
			$('#userNavModeBtn').removeClass("active");
			$('#administratorNavModeBtn').addClass("active");
			$('#userNavMode').hide();
			$('#administratorNavMode').fadeIn(500);
			break;
		}
	}
}