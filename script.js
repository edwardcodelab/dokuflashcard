
    let cardcount = 1;
	let frontback = 1;
    let cardarray = new Array();
	let cardarraybr = new Array();
	

    function flipcard(){
	

    if(frontback === 0){

	   jQuery("#cardpanel").addClass('unflipped').removeClass('flipped');
	   jQuery("#cardpanel").text(cardarraybr[cardcount][0]); 
	   
	   frontback = 1;
	   console.log(cardcount);
	   console.log(cardarraybr[cardcount][0]);
	  
    }
    else
    {

	   jQuery("#cardpanel").text(cardarraybr[cardcount][1]); 
	   jQuery("#cardpanel").addClass('flipped').removeClass('unflipped');
	   frontback = 0;
	   console.log(cardcount);
	   console.log(cardarraybr[cardcount][1]);
	   
    }
	
}


function newcard(){
  cardcount = cardcount +1;
  jQuery("#cardpanel").text(cardarraybr[cardcount][0]); 
  jQuery("#cardpanel").addClass('unflipped').removeClass('flipped');
  frontback = 1
}

function oldcard(){
  cardcount = cardcount -1;
  jQuery("#cardpanel").text(cardarraybr[cardcount][0]); 
  jQuery("#cardpanel").addClass('unflipped').removeClass('flipped');
  frontback = 1
}

function startcard(){
	
	console.log(jQuery('#carddata').text());
	cardarray = jQuery('#carddata').text().split("^");
	console.log(cardarray);
	cardarraybr = cardarray.map((value) => value.split('|'));
	console.log(cardarraybr);
	jQuery("#cardpanel").text(cardarraybr[cardcount][0]); 
	
}


function randomcard(){
  cardcount = rand(cardarraybr);
  jQuery("#cardpanel").text(cardarraybr[cardcount][0]); 
  jQuery("#cardpanel").addClass('unflipped').removeClass('flipped');
  frontback = 1
}




function rand(items) {
    // "|" for a kinda "int div"
    return items.length * Math.random() | 0;
}




