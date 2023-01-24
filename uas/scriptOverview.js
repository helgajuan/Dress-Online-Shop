var keyword = document.getElementById('keyword');
var containerOverview = document.getElementById('containerOverview');

keyword.addEventListener('keyup', function(){
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			containerOverview.innerHTML = xhr.responseText;
		}
	}
	xhr.open('GET', 'ajax/productOverview.php?keyword=' + keyword.value, true);
	xhr.send();

})