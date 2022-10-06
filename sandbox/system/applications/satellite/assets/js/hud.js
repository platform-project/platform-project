const toggleHUDElt = (e) =>	{
	const rootElt = window.document.querySelector(":root");
	
	if (e.target.classList.contains("open")){
		e.target.classList.remove("open");
		e.target.classList.add("transition-out");
		window.setTimeout(function(){
			e.target.classList.remove("transition-out");
		}, 500);
	} else {
		e.target.classList.add("open");
		e.target.classList.add("transition-in");
		window.setTimeout(function(){
			e.target.classList.remove("transition-in");
		}, 500);
	}
};

const addEventListeners = () => {
	const hudElts = document.getElementsByClassName("hudEltParent");
	
	for (let i = 0; i < hudElts.length; i += 1){
		hudElts[i].addEventListener("click", toggleHUDElt);
	}
};

const init = () => {
	addEventListeners();
	
	window.setTimeout(function(){
		if (!document.querySelector("#hudBarGraph").classList.contains("open")){
			document.querySelector("#hudBarGraph").click();
		}
	}, 500);
	window.setTimeout(function(){
		if (!document.querySelector("#hudCircles").classList.contains("open")){
			document.querySelector("#hudCircles").click();
		}
	}, 1000);
	window.setTimeout(function(){
		if (!document.querySelector("#hudRadar").classList.contains("open")){
			document.querySelector("#hudRadar").click();
		}
	}, 1500);
	window.setTimeout(function(){
		if (!document.querySelector("#hudTerminal").classList.contains("open")){
			document.querySelector("#hudTerminal").click();
		}
	}, 2000);
	
}

window.onload = init();