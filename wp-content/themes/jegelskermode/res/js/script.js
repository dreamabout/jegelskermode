jQuery(document).ready(function($) {

	// Center of
	$("ul li.dropdown").hover(
		function () {
			var parentWidth = $(this).outerWidth();	
			var childWidth = $(this).find('ul').outerWidth();
			var positionCalculation = (parentWidth - childWidth)/2;
			$(this).find('ul').css({'margin-left' : Math.round(positionCalculation)});
		},
		function () {
			// Nothing to do.
		}
	);
		
	//html5 polyfill placeholder
     $('input, textarea').placeholder();	
		
});

// Return a range of numbers based on letters a-å starting from array position 1 and -x or 30+ of not in range
function checkChar(firstLetter) {

var number = firstLetter.charCodeAt(0)-96;

  if (firstLetter === "æ"){
	 var number = number - 107;
  }

  else if (firstLetter === "ø") {
	 var number = number - 124;
  }

  else if (firstLetter === "å") {
	 var number = number - 104;
  }

  else {
	 var number = firstLetter.charCodeAt(0)-96;
  }

  return number;

}

function transformToIndex(targetUL){

  //Get children of target id or class to array
  var items = jQuery(targetUL).find('li');

  jQuery(targetUL).remove();

  // 0-29
  var letters = ['#', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'y', 'z', 'æ', 'ø', 'å'];

  jQuery.each(letters, function(i, letter) {

	 var sortedItems = getSortedItems(items, letter);

	 // if == "" then there is no date for current letter, therefor dont place it.
	 if (sortedItems !== ""){
		jQuery(".result").append('<ul class="letters '+letter+' dontsplit"><li class="bigLetter">' + letter.toUpperCase() + '</li>'+sortedItems+'</ul>');

	 }
  });

}

function getSortedItems(items, letter){

  var str = "";

  jQuery.each(items, function(i, item) {

	 var currentString = item.innerText.toLowerCase();
	 console.log(item.innerHTML);

	 if (letter === "#"){
		var toNum = checkChar(currentString.charAt(0));
		if (toNum <= 0 || toNum > 29){
			str += "<li>"+item.innerHTML+"</li>";
		}
	 }

	if (currentString.charAt(0) === letter && letter !== "#" ) {
		//item.innerText = item.innerText.charAt(0).toUpperCase() + item.innerText.slice(1);

		str += "<li>"+item.innerHTML+"</li>";

	}

  });

  return str;
}