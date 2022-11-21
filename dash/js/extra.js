function displayChange(str){
	/****$("#taramount").hide();$("#wdate").hide();
	$("#initial_deposit").hide();$("#fundlocker").hide();
	$("#SavingDuration").hide();$("#amount2invest").hide();
	$("#additionalNote").hide();$("#deductFrom").hide();
	****/
	
	
	if(str == ""){resetForm();hideDate();hidelock();}
	else if(str == "Normal"){}
	else if(str == "Dated"){dated();}
	else if(str == "Fund Lock"){locker();}
	else if(str == "Targeted"){}
	else{}
}

function resetForm(){
	$("#createSavings").trigger("reset");
}
function dated(){
		$("#wdate").show("slow");
		$("#initial_deposit").show("slow");
		$("#additionalNote").show("slow");
		$("#deductFrom").show("slow");
}
function hideDate(){
		$("#wdate").hide("slow");
		$("#initial_deposit").hide("slow");
		$("#additionalNote").hide("slow");
		$("#deductFrom").hide("slow");
}

function norm(){
		$("#wdate").show("slow");
		$("#initial_deposit").show("slow");
		$("#additionalNote").show("slow");
		$("#deductFrom").show("slow");
}
function hidenorm(){
		$("#wdate").hide("slow");
		$("#initial_deposit").hide("slow");
		$("#additionalNote").hide("slow");
		$("#deductFrom").hide("slow");
}

function locker(){
	hideDate();
	$("#fundlocker").show("slow");
	$("#additionalNote").show("slow");
	$("#SavingDuration").show("slow");
	$("#deductFrom").show("slow");
	
	/***$("#taramount").hide();$("#wdate").hide();
	$("#initial_deposit").hide();$("#fundlocker").hide();
	$("#SavingDuration").hide();$("#amount2invest").hide();
	$("#additionalNote").hide();$("#deductFrom").hide();***/
	
}
function hidelock(){
	$("#fundlocker").hide();
	$("#additionalNote").hide();
	$("#SavingDuration").hide();
	$("#deductFrom").hide();
}
function target(){
		$("#wdate").show("slow");
		$("#initial_deposit").show("slow");
		$("#additionalNote").show("slow");
		$("#deductFrom").show("slow");
}
function hideTarget(){
		$("#wdate").hide("slow");
		$("#initial_deposit").hide("slow");
		$("#additionalNote").hide("slow");
		$("#deductFrom").hide("slow");
}
