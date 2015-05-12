var see = document.getElementById('disc');
var changed = 0
var force
see.onclick = function () {
	if (changed == 0) {
			var thedisc = see.innerHTML
	
	see.innerHTML = "<textarea class='form-control' rows='20' name='disc'>"+thedisc+"</textarea>"
	changed = 1;
	};


}
