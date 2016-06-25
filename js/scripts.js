var mlsInfo = {

};

mlsInfo.apiUrl = 'https://sheetsu.com/apis/v1.0/90c54b608efe';

//initial player array - raw info from the Ajax call
mlsInfo.playersObject = {};

//teams array - with duplicates
mlsInfo.teamsDuplicates = [];

//teams array - singles - will be used to store players
mlsInfo.teams = [];

//array with players sorted by teams
mlsInfo.playersSorted = [];

//initial function
mlsInfo.init = function(){
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
		console.log(mlsInfo.playersObject);

		//call a function to sort players into teams arrays
		mlsInfo.getTeams(playersInfo);
	});
};

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

	// for(var x = 0; x < mlsInfo.teams.length; x++){
	// 	var team = []
	// 	mlsInfo.playersSorted.push(team);
	// }

	//call a function that will sort players by teams
	mlsInfo.teamArrays();
}

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
	console.log(mlsInfo.playersSorted)
}

$(function(){
	mlsInfo.init();
});