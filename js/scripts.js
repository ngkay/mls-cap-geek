var mlsInfo = {

};

//api url
mlsInfo.apiUrl = 'https://sheetsu.com/apis/v1.0/90c54b608efe';

//initial player array - raw info from the Ajax call
mlsInfo.playersObject = {};

//teams array - with duplicates
mlsInfo.teamsDuplicates = [];

//teams array - singles - will be used to store players
mlsInfo.teams = [];

//array with players sorted by teams
mlsInfo.playersSorted = [];

//array with information about teams salaries
mlsInfo.teamsStanding = [];

mlsInfo.numberWithCommas = function(x){
	return x = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};

//initial function
mlsInfo.init = function(){

	$('.landing h1').css({'visibility': 'visible', 'opacity': 1});
	$('.landing').delay(1600).fadeOut(1000);
	$('.logo').delay(2600).css({'visibility': 'visible', 'opacity': 1});
	//add function that will listen to changes on the form.
	mlsInfo.getData();
};

//Ajax call function to get all players info
mlsInfo.getData = function(){
	$.ajax({
		url:mlsInfo.apiUrl,
		method:'GET',
		dataType:'json'
	})
	.then(function(playersInfo){
		// console.log(playersInfo)
		//store information into the main object
		mlsInfo.playersObject = playersInfo;
		// console.log(mlsInfo.playersObject);

		//call a function to sort players into teams arrays
		mlsInfo.getTeams(playersInfo);
		// mlsInfo.teamSelect();
	});
};

// mlsInfo.getData = function(){
// 	$.ajax({
// 		url:mlsInfo.apiUrl + '/Club' + '/Chicago Fire',
// 		method:'GET',
// 		dataType:'json'
// 	})
// 	.then(function(playersInfo){
// 		// console.log(playersInfo)
// 		//store information into the main object
// 		mlsInfo.playersObject = playersInfo;
// 		console.log(mlsInfo.playersObject);

// 		//call a function to sort players into teams arrays
// 		// mlsInfo.getTeams(playersInfo);
// 	});
// };

//function that sorts teams from the player objects
mlsInfo.getTeams = function(){
	//get team information from every player object
	for(var i = 0; i < mlsInfo.playersObject.length; i++){
		mlsInfo.teamsDuplicates.push(mlsInfo.playersObject[i].Club);
		// console.log('works');
	};
	// console.log(mlsInfo.teamsDuplicates);

	$.each(mlsInfo.teamsDuplicates, function(b, el){
		if($.inArray(el, mlsInfo.teams) === -1) {
			mlsInfo.teams.push(el)
		};
		// console.log(mlsInfo.teams);
	});

	//calls a function that will populate the select field
	// mlsInfo.populateSelect();
	$('.hero-team-select').css({'visibility': 'visible', 'opacity': 1});
	mlsInfo.teamSelect();

	//call a function that will sort players by teams
	mlsInfo.teamArrays();
}

//sorts players into arrays with team name
mlsInfo.teamArrays = function(){

	//for loop that will associate every player with a team and push their info into that team's array
	for(var x = 0; x < mlsInfo.teams.length; x++){
		mlsInfo.playersSorted[mlsInfo.teams[x]] = [];
		// console.log('works');

		for(var i = 0; i < mlsInfo.playersObject.length; i++){
			if(mlsInfo.playersObject[i].Club === mlsInfo.teams[x]){
				// console.log('working');
				mlsInfo.playersSorted[mlsInfo.teams[x]].push(mlsInfo.playersObject[i]);
			};
		};
	};
	// console.log(mlsInfo.playersSorted)
	//calls the function that will print the information about teams standing - salary mass
	mlsInfo.sortTeamsStanding();
}

// //function that populate select fields
// mlsInfo.populateSelect = function(){
// 	//using jQuery, populate automatically the select field
// 	for(var i = 0; i < mlsInfo.teams.length; i++){
// 		$('#teamSelect').append('<option value"' + mlsInfo.teams[i] + '">' + mlsInfo.teams[i] + '</option>');
// 	};
// 	//calls a function that will listen to any changes in to the select field
// 	mlsInfo.fieldChange();
// };

// //function that listens to changes in the select field and retrieves
// //the selected value
// //then searches the playersSorted array and spit back
// //only the team array related to the user's selection
// mlsInfo.fieldChange = function(){
// 	$('#teamSelect').on('change', function(){
// 		var userSelection = $('#teamSelect').val();
// 		// console.log(userSelection);
// 		var teamSelected = mlsInfo.playersSorted[userSelection];
// 		// console.log(mlsInfo.playersSorted[userSelection]);
// 		if(userSelection !== 'Select Team'){
// 			$('#playersTable').empty();
// 			$('#teamsTable').empty();

// 			//function that sorts the team players into descending order of salary cap hit
// 			teamSelected.sort(function(a, b) {
// 				// console.log('works')
// 				return parseFloat(b.SalaryCapHitNUM) - parseFloat(a.SalaryCapHitNUM);
// 			});

// 			mlsInfo.printInfo(teamSelected);
// 			mlsInfo.printTeamNumbers(teamSelected);
// 		}
// 	});
// };

//function that listens to change in the hero team select field
mlsInfo.teamSelect = function(){
	$('input[name="team"]').change(function(){
		var userSelection = $('input[name=team]:checked').val();
		console.log(userSelection);
		var teamSelected = mlsInfo.playersSorted[userSelection];

		mlsInfo.selectedTeamLogo = $('input[name=team]:checked + label > img').attr('src');

		mlsInfo.printInfo(teamSelected);
		mlsInfo.printTeamNumbers(teamSelected, userSelection);
		$('html, body').scrollTop(0);
		$('.hero-header').slideUp(800);
	});
};

//function that will populated the table
mlsInfo.printInfo = function(teamSelected){
	// console.log('works')
	// console.log(teamSelected.length);

	teamSelected.sort(function(a, b){
		return parseFloat(b.SalaryCapHitNUM) - parseFloat(a.SalaryCapHitNUM);
	});

	console.log(teamSelected)

	$('#playersTable tbody').empty().hide();

	var dpIcon = "<div class='dp-icon'>DP</div>";
	var yDpIcon = "<div class='dp-icon'>YDP</div>";

	//populates label of rows
	// var nameLabel = $('<th>').append('Player');
	// var positionLabel = $('<th>').append('Position');
	// // var clubLabel = $('<td>').append('Club');
	// var baseSalaryLabel = $('<th>').append('Base Salary');
	// var compensationLabel = $('<th>').append('Compensation');
	// var salaryCapHitLabel = $('<th>').append('Salary Cap Hit');
	// // var statusLabel = $('<td>').append('Status');
	// var rowLabel = $('<tr>').append(nameLabel, positionLabel, baseSalaryLabel, compensationLabel, salaryCapHitLabel);
	// $('.tableHead').append(rowLabel);

	//populates player rows
	for(var i = 0; i < teamSelected.length; i++){
		// console.log('works')
		var name = $('<td>').append(teamSelected[i].FirstName + " " + teamSelected[i].LastName);
		var position = $('<td>').append(teamSelected[i].Pos);
		// var club = $('<td>').append(teamSelected[i].Club);
		var baseSalary = $('<td>').append(teamSelected[i].BaseSalary);
		var compensation = $('<td>').append(teamSelected[i].Compensation);
		var salaryCapHit = $('<td>').append(teamSelected[i].SalaryCapHit);

		if(teamSelected[i].Status === 'DP' && teamSelected[i].Young === 'Y'){
			// var status = $('<td>').append('Young Designated Player');
			name = $('<td>').append(teamSelected[i].FirstName + " " + teamSelected[i].LastName + yDpIcon);
		}else if(teamSelected[i].Status === 'DP'){
			name = $('<td>').append(teamSelected[i].FirstName + " " + teamSelected[i].LastName + dpIcon);
		}else{};

		var playersRow = $('<tr>').append(name, position, baseSalary, compensation, salaryCapHit);
		$('#playersTable').append(playersRow);
	};

<<<<<<< HEAD
	$('#playersTable').fadeIn(600);
=======
	$('#playersTable tbody').fadeIn(600);
>>>>>>> f388ec33b87e8805c68c863ede3708a19163c3d5
	// mlsInfo.tableSorterInit();
};

mlsInfo.tableSorterInit = function(){
	$("#playersTable").tablesorter();
}

//function that populates the team information table
mlsInfo.printTeamNumbers = function(teamSelected, userSelection){

	// console.log(teamSelected);

	$('.team-info, .main-team-stats').hide();

	teamSelected.sort(function(a, b){
		return parseFloat(b.SalaryCapHitNUM) - parseFloat(a.SalaryCapHitNUM);
	});

	//variable that stores only the top 17 players (by salary cap hit)
	var teamTop17 = teamSelected.slice(0, 17);
	console.log(teamTop17);

	//values
	var salaryCap = 3660000;
	var salaryMassTop17 = 0;
	var totalSalaryMass = 0;

	//first for loop that sums up all base salaries
	for(var i = 0; i < teamSelected.length; i++){
		var totalSalaryMass = totalSalaryMass + parseInt(teamSelected[i].BaseSalaryNUM, 10);
	}

	//second for loop that sums the salary cap hit of the top 17 players
	for(var i = 0; i < teamTop17.length; i++){
		var salaryMassTop17 = salaryMassTop17 + parseInt(teamTop17[i].SalaryCapHitNUM, 10);
	}

	//variable that calculates the amount of cap left
	var spaceOnCap = salaryCap - salaryMassTop17;

	//putting commas in numbers using the above function
	var salaryMassThousands = mlsInfo.numberWithCommas(salaryMassTop17);
	console.log(salaryMassThousands);

	var salaryCapThousands = mlsInfo.numberWithCommas(salaryCap);
	console.log(salaryCapThousands);

	var spaceOnCapThousands = mlsInfo.numberWithCommas(spaceOnCap);
	console.log(spaceOnCapThousands);

	var totalSalaryMassThousands = mlsInfo.numberWithCommas(totalSalaryMass);
	console.log(totalSalaryMassThousands);

	var dpCounter = 0;
	for(var i = 0; i < teamSelected.length; i++){
		if(teamSelected[i].Status === 'DP'){
			dpCounter = dpCounter + 1;
			console.log(dpCounter);
		}
	}

	//printing all info unto the page: first labels, then values
	var teamSelectedOutput = $('<h1>').append(userSelection);
	$('.team-name h1').replaceWith(teamSelectedOutput);
	var totalSalaryMassPrint = $('<h2>').append('$' + totalSalaryMassThousands);
	$('.team-total-salary h2').replaceWith(totalSalaryMassPrint);
	var salaryMassPrint = $('<h2>').append('$' + salaryMassThousands);
	$('.team-cap-hit h2').replaceWith(salaryMassPrint);
	var spaceOnCapPrint = $('<h2>').append('$' + spaceOnCapThousands);
	$('.team-cap-space h2').replaceWith(spaceOnCapPrint);
	var dpCountPrint = $('<h2>').append(dpCounter);
	$('.team-dps h2').replaceWith(dpCountPrint);

	var teamEmblem = $('<img>').attr('src', mlsInfo.selectedTeamLogo);
	$('.team-emblem').empty().append(teamEmblem);

	$('.team-info, .main-team-stats').fadeIn(800);

	// var salaryMassLabel = $('<td>').append('Top 17 Salary Mass');
	// var salaryCapLabel = $('<td>').append('Salary Cap (2016)');
	// var spaceOnCapLabel = $('<td>').append('Space on Cap');
	// var totalSalaryMassLabel = $('<td>').append('Total Salary Mass');
	// var salaryCapRowLabel = $('<tr>').append(salaryMassLabel, salaryCapLabel, spaceOnCapLabel, totalSalaryMassLabel);
	// $('#teamsTable').append(salaryCapRowLabel);

	// var salaryMassPrint = $('<td>').append('$' + salaryMassThousands);
	// var salaryCapPrint = $('<td>').append('$' + salaryCapThousands);
	// var spaceOnCapPrint = $('<td>').append('$' + spaceOnCapThousands);
	// var totalSalaryMassPrint = $('<td>').append('$' + totalSalaryMassThousands);
	// var salaryCapRow = $('<tr>').append(salaryMassPrint, salaryCapPrint, spaceOnCapPrint, totalSalaryMassPrint);
	// $('#teamsTable').append(salaryCapRow);
}

//function that sorts teams relatively to their salary mass
mlsInfo.sortTeamsStanding = function(){
	// console.log(mlsInfo.playersSorted);

	//for loop that goes through all team and sum up all their salary mass and print it
	for(var x = 0; x < mlsInfo.teams.length; x++){

		//set values
		var totalSalaryMass = 0;
		var totalCapSalaryMass = 0;

		//second loop goes through players salaries and add them together
		for(var i = 0; i < mlsInfo.playersSorted[mlsInfo.teams[x]].length; i++){
			mlsInfo.teamsStanding[x] = {};
			// console.log(mlsInfo.playersSorted[mlsInfo.teams[x]][i].BaseSalaryNUM);
			var totalSalaryMass = parseInt(totalSalaryMass, 10) + parseInt(mlsInfo.playersSorted[mlsInfo.teams[x]][i].BaseSalaryNUM, 10);
			var totalCapSalaryMass = parseInt(totalCapSalaryMass, 10) + parseInt(mlsInfo.playersSorted[mlsInfo.teams[x]][i].SalaryCapHitNUM, 10);
		};
		// console.log(totalSalaryMass)

		//set values
		mlsInfo.teamsStanding[x].totalCapSalaryMass = totalCapSalaryMass;
		mlsInfo.teamsStanding[x].totalSalaryMass = totalSalaryMass;
		mlsInfo.teamsStanding[x].teamName = mlsInfo.teams[x];
	};

	//sort values from highest to lowest
	mlsInfo.teamsStanding.sort(function(a, b) {
		// console.log('works');
		return parseFloat(b.totalSalaryMass) - parseFloat(a.totalSalaryMass);
	});

	//add commas and dollar signs
	for(var i = 0; i < mlsInfo.teamsStanding.length; i++){
		mlsInfo.teamsStanding[i].totalSalaryMass = '$' + mlsInfo.numberWithCommas(mlsInfo.teamsStanding[i].totalSalaryMass);
		mlsInfo.teamsStanding[i].totalCapSalaryMass ='$' + mlsInfo.numberWithCommas(mlsInfo.teamsStanding[i].totalCapSalaryMass);
	};

	// console.log(mlsInfo.teamsStanding);

	mlsInfo.printTeamsStanding();
};

mlsInfo.printTeamsStanding = function(){
	$('#teamsStandingTable tbody').empty().hide();

	// var teamLabel = $('<td>').append('Team');
	// // var totalCapSalaryMassLabel = $('<td>').append('Salary Cap Hit');
	// var totalSalaryMassLabel = $('<td>').append('Team Salary');

	// var salaryCapRowLabel = $('<tr>').append(teamLabel, totalSalaryMassLabel);
	// $('#teamsStandingTable').append(salaryCapRowLabel);

	for(var i = 0; i < mlsInfo.teamsStanding.length; i++){
		var teamClass =  mlsInfo.teamsStanding[i].teamName.replace(/\s+/g, '-');
		var teamName = $('<td>').append('<a href=\"#\">' + mlsInfo.teamsStanding[i].teamName + '</a>');
		// var totalCapSalaryMassTeam = $('<td>').append(mlsInfo.teamsStanding[i].totalCapSalaryMass);
		var totalSalaryMassTeam = $('<td>').append(mlsInfo.teamsStanding[i].totalSalaryMass);

		var salaryCapRowTeam = $('<tr>').append(teamName, totalSalaryMassTeam).addClass('teamStandingLink').attr('id', teamClass);
		$('#teamsStandingTable').append(salaryCapRowTeam);
	};

	$('#teamsStandingTable').fadeIn(600);

	mlsInfo.teamStandingLinkActivate();
};

mlsInfo.teamStandingLinkActivate = function(){
	$('.teamStandingLink').on('click', function(event){
		event.preventDefault();
		var teamClicked = $(this).attr('id');
		var teamClicked = teamClicked.replace(/-/g, ' ');
		console.log(teamClicked);
		var teamSelected = mlsInfo.playersSorted[teamClicked];
		console.log(teamSelected);
		var userSelection = teamClicked
		mlsInfo.selectedTeamLogo = $('input[value=\"' + teamClicked + '\"] + label > img').attr('src')
		mlsInfo.printInfo(teamSelected);
		mlsInfo.printTeamNumbers(teamSelected, userSelection);

		$('html, body').animate({
			scrollTop: $('.team-info-screen').offset().top
		}, 600);
	});
}

$(function(){
	mlsInfo.init();
});