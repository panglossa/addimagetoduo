var done = -1;
var checkExist = setInterval(function() {
	translation = document.getElementsByClassName('_2qRu2');
	elements = document.getElementsByClassName('_3eQwU');
   if ((translation.length)&&(elements.length)) {
      dothings();
      }
	}, 100);

function dothings() {
	var kwd = '';
	if (done!=1){
		translation = document.getElementsByClassName('_2qRu2');
		for (i = 0; i < translation.length; i++) {
			p = translation[i].innerHTML.indexOf('</span>') + 7;
			kwd = translation[i].innerHTML.substring(p);
			}
		elements = document.getElementsByClassName('_3eQwU');
		for (i = 0; i< elements.length; i++){
			elements[i].innerHTML = elements[i].innerHTML + '<img width="200" src="https://oderalon.net/getimage/index.php?sentence=' + encodeURI(kwd) + '" />';
			}
		done = 1;
		clearInterval(checkExist);
		}
	}
