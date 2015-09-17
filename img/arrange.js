var configData = {};


configData.objects = [
	"Sun",
	//"Clouds",
	"Mountains",
	"Trees"
	//"Trees3",
	//"Trees2",
	//"Trees1",
	//"Uniques"
]

configData.SunData = [
	"New-Growth_sun.png|144|158"
]
configData.SunConfig = {};
configData.SunConfig.number = "1";
configData.SunConfig.bottom = "225";
configData.SunConfig.area = "3";
configData.SunConfig.min = "1";
configData.SunConfig.max = "1";
configData.SunConfig.maxTotal = "1";
configData.SunConfig.margin = "0";
configData.SunConfig.marginType = "1";
configData.SunConfig.edgeOffset = "160";

configData.CloudsData = [
]
configData.CloudsConfig = {};
configData.CloudsConfig.number = "0";
configData.CloudsConfig.area = "1";
configData.CloudsConfig.min = "1";
configData.CloudsConfig.max = "1";
configData.CloudsConfig.maxTotal = "1";
configData.CloudsConfig.margin = "0";
configData.CloudsConfig.marginType = "1";
configData.CloudsConfig.edgeOffset = "0";

configData.MountainsData = [
	"New-Growth_mountain1.png|446|214",
	"New-Growth_mountain2.png|354|144",
	"New-Growth_mountain3.png|352|172"
]
configData.MountainsConfig = {};
configData.MountainsConfig.number = "3";
configData.MountainsConfig.bottom = "20";
configData.MountainsConfig.area = "1";
configData.MountainsConfig.min = "3";
configData.MountainsConfig.max = "4";
configData.MountainsConfig.maxTotal = "10";
configData.MountainsConfig.margin = "180";
configData.MountainsConfig.marginType = "2";
configData.MountainsConfig.edgeOffset = "0";

configData.TreesData = [
	"New-Growth_tree1_leaves.png|290|158",
	"New-Growth_tree1_naked.png|290|158",
	"New-Growth_tree2_leaves.png|340|246",
	"New-Growth_tree2_naked.png|340|246",
	"New-Growth_tree3.png|98|306",
	"New-Growth_tree4.png|154|166"
]
configData.TreesConfig = {};
configData.TreesConfig.number = "6";
configData.TreesConfig.bottom = "30";
configData.TreesConfig.area = "2";
configData.TreesConfig.min = "18";
configData.TreesConfig.max = "25";
configData.TreesConfig.maxTotal = "50";
configData.TreesConfig.margin = "140";
configData.TreesConfig.marginType = "1";
configData.TreesConfig.edgeOffset = "0";

configData.Trees3Data = [
]
configData.Trees3Config = {};
configData.Trees3Config.number = "0";
configData.Trees3Config.min = "0";
configData.Trees3Config.max = "0";
configData.Trees3Config.maxTotal = "0";
configData.Trees3Config.margin = "0";
configData.Trees3Config.edgeOffset = "0";

configData.Trees2Data = [
]
configData.Trees2Config = {};
configData.Trees2Config.number = "0";
configData.Trees2Config.min = "0";
configData.Trees2Config.max = "0";
configData.Trees2Config.maxTotal = "0";
configData.Trees2Config.margin = "0";
configData.Trees2Config.edgeOffset = "0";

configData.Trees1Data = [
]
configData.Trees1Config = {};
configData.Trees1Config.number = "0";
configData.Trees1Config.min = "0";
configData.Trees1Config.max = "0";
configData.Trees1Config.maxTotal = "0";
configData.Trees1Config.margin = "0";
configData.Trees1Config.edgeOffset = "0";

configData.UniquesData = [
]
configData.UniquesConfig = {};
configData.UniquesConfig.number = "0";
configData.UniquesConfig.min = "0";
configData.UniquesConfig.max = "0";
configData.UniquesConfig.maxTotal = "0";
configData.UniquesConfig.margin = "0";
configData.UniquesConfig.edgeOffset = "0";

function parseAndFill(area1,area2,area3,area4) {
	var screenwidth = $(window).width();
	var sideBits = (screenwidth-700)/2;
	$('#leftSide').width(sideBits);
	$('#rightSide').width(sideBits);

	for (var data in configData.objects) {
		var marginLocations = {};
		var set = configData.objects[data]
		var classNames = '';
		//var configName = variable + "Config";
		var maxTotal = configData[set + "Config"].maxTotal;
		var loopers;
		if (configData[set + "Config"].max == 1 && configData[set + "Config"].maxTotal == 1) {
			loopers = 1;
		} else {
			if (configData[set + "Config"].area == 1) {
				loopers = Math.floor(Math.random() * (Math.floor((screenwidth/800) * configData[set + "Config"].max)) + configData[set + "Config"].min);
				while (loopers < (Math.floor((screenwidth/800) * configData[set + "Config"].min))) {
					loopers = Math.floor(Math.random() * (Math.floor((screenwidth/800) * configData[set + "Config"].max)) + configData[set + "Config"].min);
				}	
				console.log(loopers);	
			} else if (configData[set + "Config"].area == 2) {
				loopers = Math.floor(Math.random() * (Math.floor((sideBits/800) * configData[set + "Config"].max)) + configData[set + "Config"].min);
				while (loopers < (Math.floor((sideBits/800) * configData[set + "Config"].min))) {
					loopers = Math.floor(Math.random() * (Math.floor((sideBits/800) * configData[set + "Config"].max)) + configData[set + "Config"].min);
				}	
				console.log(loopers);
			} else {
				loopers = Math.floor(Math.random() * (Math.floor(700 * configData[set + "Config"].max)) + configData[set + "Config"].min);
				while (loopers < (Math.floor(sideBits * configData[set + "Config"].min))) {
					loopers = Math.floor(Math.random() * (Math.floor(700 * configData[set + "Config"].max)) + configData[set + "Config"].min);
				}	
				console.log(loopers);
			}
		}
		console.log("This many "+set+" "+ loopers);
		for (var number in configData[set + "Data"]) {
			marginLocations[number] = [];
		}

		for (var i=0; i<loopers; i++) {
			if (Math.floor(Math.random() * (2)) == 0) {
				classNames = set + " reverser";
			} else {
				classNames = set + " nonReverser";
			}
			var objects = Math.floor(Math.random() * (configData[set + "Config"].number));
			var currentData = configData[set + "Data"][objects].split("|");
			if (configData[set + "Config"].area == 1) {
				var position = checkForMargins(configData[set + "Config"].margin,marginLocations[objects],set,screenwidth,objects,screenwidth,configData[set + "Config"].edgeOffset,'1');
				marginLocations[objects].push(position);
				$('#'+area1).append('<div style="width:'+currentData[1]+'px;height:'+currentData[2]+'px;left:'+position+'px;bottom:'+configData[set + "Config"].bottom+'px;position:absolute;background:url(/img/'+currentData[0]+');" class="'+classNames+'""> </div>');
			} else if (configData[set + "Config"].area == 2) {
				var position = checkForMargins(configData[set + "Config"].margin,marginLocations[objects],set,screenwidth,objects,sideBits,configData[set + "Config"].edgeOffset,'0');
				if (Math.floor(Math.random() * (2)) == 0) {
					$('#'+area2).append('<div style="width:'+currentData[1]+'px;height:'+currentData[2]+'px;left:'+position+'px;bottom:'+configData[set + "Config"].bottom+'px;position:absolute;background:url(/img/'+currentData[0]+');" class="'+classNames+'"> </div>');
					marginLocations[objects].push(position);
				} else {
					$('#'+area3).append('<div style="width:'+currentData[1]+'px;height:'+currentData[2]+'px;left:'+position+'px;bottom:'+configData[set + "Config"].bottom+'px;position:absolute;background:url(/img/'+currentData[0]+');" class="'+classNames+'"> </div>');
					marginLocations[objects].push(position);
				}
			} else if (configData[set + "Config"].area == 3) { 
				var position = checkForMargins(configData[set + "Config"].margin,marginLocations[objects],set,screenwidth,objects,'700','0','0');
				marginLocations[objects].push(position);
				$('#'+area4).append('<div style="width:'+currentData[1]+'px;height:'+currentData[2]+'px;left:'+position+'px;bottom:'+configData[set + "Config"].bottom+'px;position:absolute;background:url(/img/'+currentData[0]+');" class="'+classNames+'"> </div>');
				marginLocations[objects].push(position);
			}
			
		}
	}
}

function checkForMargins(margin,locationArray,set,screenwidth,objectNo,size,offset,overlap) {
	var isOk = 0;
	var newPosition;
	if (overlap == 0) {
		newPosition = (Math.floor(Math.random() * (size-offset-offset))-configData[set + "Config"].margin)-(configData[set + "Data"][objectNo].split("|")[1]/4);
	} else {
		newPosition = (Math.floor(Math.random() * (size-offset-offset))-configData[set + "Config"].margin);
	}
	var superLooper = 0;
	while (isOk == 0) {
		superLooper++;
		isOk = 1;
		for (var i = 0; i < locationArray.length; i++) {
		    if ((parseInt(newPosition) - parseInt(margin)) < locationArray[i] && (parseInt(newPosition) + parseInt(margin)) > locationArray[i]) {
				if (overlap == 0) {
					newPosition = (Math.floor(Math.random() * (size-offset-offset))-configData[set + "Config"].margin)-(configData[set + "Data"][objectNo].split("|")[1]/4);
				} else {
					newPosition = (Math.floor(Math.random() * (size-offset-offset))-configData[set + "Config"].margin);
				}
		    	isOk = 0;
		        i = locationArray.length;
		    }
		}
		if (superLooper == 40) {
			isOk = 1;
		}
	}
	return newPosition
}