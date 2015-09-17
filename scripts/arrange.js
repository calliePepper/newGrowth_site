var configData = {};

var animTimer;

//triggerAnimation();

configData.objects = [
	//"Sun",
	//"Clouds",
	"Mountains",
	"TreesPine",
	"TreesOther",
	"Wolf",
	"RedBird",
	"BlueBird"
	//"Trees"
	//"Trees3",
	//"Trees2",
	//"Trees1",
	//"Uniques"
]

configData.SunData = [
	"New-Growth_sun.gif|144|158"
	//file name, width, height
]
configData.SunConfig = {};
//Generates the array
configData.SunConfig.number = "1";
//
configData.SunConfig.bottom = "225";
//pixel distance from bttom
configData.SunConfig.area = "3";
//Area (1 is total length, 2 is either side, 3 is center)
configData.SunConfig.min = "1";
//Min number of objects
configData.SunConfig.max = "1";
//Max number of objects per 900px
configData.SunConfig.maxTotal = "1";
//Max number of objects total
configData.SunConfig.margin = "0";
//How close another object can be
configData.SunConfig.marginType = "1";
//Margin type
configData.SunConfig.edgeOffset = "160";
//Stops it from spawning off screen.
configData.SunConfig.anim = "0";

configData.MoonData = [
	"New-Growth_moon.png|144|158"
]
configData.MoonData = {};
configData.MoonData.number = "1";
configData.MoonData.bottom = "225";
configData.MoonData.area = "3";
configData.MoonData.min = "1";
configData.MoonData.max = "1";
configData.MoonData.maxTotal = "1";
configData.MoonData.margin = "0";
configData.MoonData.marginType = "1";
configData.MoonData.edgeOffset = "160";
configData.MoonData.anim = "0";

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
configData.CloudsConfig.anim = "0";

configData.MountainsData = [
	"New-Growth_mountain1.png|446|214|1|1",
	"New-Growth_mountain2.png|354|144|1|1",
	"New-Growth_mountain3.png|352|172|1|1"
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
configData.MountainsConfig.behind = "1";
configData.MountainsConfig.anim = "0";

configData.TreesData = [
	"New-Growth_tree1_leaves.png|290|158|87|162",
	"New-Growth_tree1_naked.png|290|158|87|162",
	"New-Growth_tree2_leaves.png|340|246|16|133",
	"New-Growth_tree2_naked.png|340|246|166|133",
	"New-Growth_tree3.png|98|306|32|36",
	"New-Growth_tree4.png|154|166|56|50"
]
configData.TreesConfig = {};
configData.TreesConfig.number = "6";
configData.TreesConfig.bottom = "30";
configData.TreesConfig.area = "2";
configData.TreesConfig.min = "18";
configData.TreesConfig.max = "25";
configData.TreesConfig.maxTotal = "50";
configData.TreesConfig.margin = "60";
configData.TreesConfig.marginType = "1";
configData.TreesConfig.edgeOffset = "0";
configData.TreesConfig.anim = "0";

configData.TreesPineData = [
	"New-Growth_tree3.png|98|306|32|36",
	"New-Growth_tree4.png|154|166|56|50"
]
configData.TreesPineConfig = {};
configData.TreesPineConfig.number = "2";
configData.TreesPineConfig.bottom = "30";
configData.TreesPineConfig.area = "2";
configData.TreesPineConfig.min = "18";
configData.TreesPineConfig.max = "25";
configData.TreesPineConfig.maxTotal = "50";
configData.TreesPineConfig.margin = "60";
configData.TreesPineConfig.marginType = "1";
configData.TreesPineConfig.edgeOffset = "0";
configData.TreesPineConfig.anim = "0";

configData.TreesOtherData = [
	"New-Growth_tree1_leaves.png|290|158|87|162",
	//"New-Growth_tree1_naked.png|290|158|87|162",
	"New-Growth_tree2_leaves.png|340|246|16|133"
	//"New-Growth_tree2_naked.png|340|246|166|133",
]
configData.TreesOtherConfig = {};
configData.TreesOtherConfig.number = "2";
configData.TreesOtherConfig.bottom = "30";
configData.TreesOtherConfig.area = "2";
configData.TreesOtherConfig.min = "18";
configData.TreesOtherConfig.max = "25";
configData.TreesOtherConfig.maxTotal = "50";
configData.TreesOtherConfig.margin = "60";
configData.TreesOtherConfig.marginType = "1";
configData.TreesOtherConfig.edgeOffset = "0";
configData.TreesOtherConfig.anim = "0";

configData.Trees3Data = [
]
configData.Trees3Config = {};
configData.Trees3Config.number = "0";
configData.Trees3Config.min = "0";
configData.Trees3Config.max = "0";
configData.Trees3Config.maxTotal = "0";
configData.Trees3Config.margin = "0";
configData.Trees3Config.edgeOffset = "0";
configData.Trees3Config.anim = "0";

configData.Trees2Data = [
]
configData.Trees2Config = {};
configData.Trees2Config.number = "0";
configData.Trees2Config.min = "0";
configData.Trees2Config.max = "0";
configData.Trees2Config.maxTotal = "0";
configData.Trees2Config.margin = "0";
configData.Trees2Config.edgeOffset = "0";
configData.Trees2Config.anim = "0";

configData.Trees1Data = [
]
configData.Trees1Config = {};
configData.Trees1Config.number = "0";
configData.Trees1Config.min = "0";
configData.Trees1Config.max = "0";
configData.Trees1Config.maxTotal = "0";
configData.Trees1Config.margin = "0";
configData.Trees1Config.edgeOffset = "0";
configData.Trees1Config.anim = "0";

configData.UniquesData = [
]
configData.UniquesConfig = {};
configData.UniquesConfig.number = "0";
configData.UniquesConfig.min = "0";
configData.UniquesConfig.max = "0";
configData.UniquesConfig.maxTotal = "0";
configData.UniquesConfig.margin = "0";
configData.UniquesConfig.edgeOffset = "0";
configData.UniquesConfig.anim = "0";

configData.WolfData = [
	"New-Growth_Wolf.gif|134|84"
]
configData.WolfConfig = {};
configData.WolfConfig.number = "1";
configData.WolfConfig.bottom = "34";
configData.WolfConfig.area = "2";
configData.WolfConfig.min = "-2";
configData.WolfConfig.max = "1";
configData.WolfConfig.maxTotal = "1";
configData.WolfConfig.margin = "0";
configData.WolfConfig.marginType = "1";
configData.WolfConfig.edgeOffset = "160";
configData.WolfConfig.behind = "0";
configData.WolfConfig.anim = "1";

configData.CampData = [
	"New-Growth_Campfire_anim.gif|90|96"
]
configData.CampConfig = {};
configData.CampConfig.number = "1";
configData.CampConfig.bottom = "-1";
configData.CampConfig.area = "3";
configData.CampConfig.min = "-1";
configData.CampConfig.max = "1";
configData.CampConfig.maxTotal = "1";
configData.CampConfig.margin = "0";
configData.CampConfig.marginType = "1";
configData.CampConfig.edgeOffset = "-50";
configData.CampConfig.behind = "0";
configData.CampConfig.anim = "0";

configData.RedBirdData = [
	"New-Growth_Bird_Pink.gif|38|24"
]
configData.RedBirdConfig = {};
configData.RedBirdConfig.number = "1";
configData.RedBirdConfig.bottom = "34";
configData.RedBirdConfig.area = "1";
configData.RedBirdConfig.min = "1";
configData.RedBirdConfig.max = "2";
configData.RedBirdConfig.maxTotal = "3";
configData.RedBirdConfig.margin = "0";
configData.RedBirdConfig.marginType = "1";
configData.RedBirdConfig.edgeOffset = "160";
configData.RedBirdConfig.behind = "0";
configData.RedBirdConfig.anim = "1";

configData.BlueBirdData = [
	"New-Growth_Bird_Blue.gif|40|26"
]
configData.BlueBirdConfig = {};
configData.BlueBirdConfig.number = "1";
configData.BlueBirdConfig.bottom = "34";
configData.BlueBirdConfig.area = "1";
configData.BlueBirdConfig.min = "1";
configData.BlueBirdConfig.max = "2";
configData.BlueBirdConfig.maxTotal = "3";
configData.BlueBirdConfig.margin = "0";
configData.BlueBirdConfig.marginType = "1";
configData.BlueBirdConfig.edgeOffset = "160";
configData.BlueBirdConfig.behind = "0";
configData.BlueBirdConfig.anim = "1";

function parseAndFill(area1,area2,area3,area4) {
	var screenwidth = $(window).width();
	var sideBits = (screenwidth-700)/2;
	$('#leftSide').width(sideBits);
	$('#rightSide').width(sideBits);
	var now = new Date();
	dealWithSky(now.getHours());
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
			} else if (configData[set + "Config"].area == 2) {
				loopers = Math.floor(Math.random() * (Math.floor((sideBits/800) * configData[set + "Config"].max)) + configData[set + "Config"].min);
				while (loopers < (Math.floor((sideBits/800) * configData[set + "Config"].min))) {
					loopers = Math.floor(Math.random() * (Math.floor((sideBits/800) * configData[set + "Config"].max)) + configData[set + "Config"].min);
				}	
			} else {
				loopers = Math.floor(Math.random() * (Math.floor(700 * configData[set + "Config"].max)) + configData[set + "Config"].min);
				while (loopers < (Math.floor(sideBits * configData[set + "Config"].min))) {
					loopers = Math.floor(Math.random() * (Math.floor(700 * configData[set + "Config"].max)) + configData[set + "Config"].min);
				}	
			}
		}
		for (var number in configData[set + "Data"]) {
			marginLocations[number] = [];
		}
		marginLocations['left'] = [];
		marginLocations['right'] = [];

		for (var i=0; i<loopers; i++) {
			var reversed;
			if (Math.floor(Math.random() * (2)) == 0) {
				classNames = set + " reverser";
				reversed = 1;
			} else {
				classNames = set + " nonReverser";
				reversed = 0;
			}
			var objects = Math.floor(Math.random() * (configData[set + "Config"].number));
			var marginObject = Math.floor(Math.random() * (configData[set + "Config"].number));
			var currentData = configData[set + "Data"][objects].split("|");
			if (configData[set + "Config"].anim == '1') {
				classNames = classNames + ' animObject';
			} 
			if (configData[set + "Config"].area == 1) {
				var position = checkForMargins(configData[set + "Config"].margin,marginLocations[objects],set,screenwidth,objects,screenwidth,configData[set + "Config"].edgeOffset,'1',reversed);
				var zindex = 'z-index:0;';
				if (configData[set + "Config"].behind == 0) {
					zindex = 'z-index:1;'
				}				
				var marginedPosition = position.split("|")[1];
				position = position.split("|")[0];
				marginLocations[objects].push(position);
				$('#'+area1).append('<img style="width:'+currentData[1]+'px;height:'+currentData[2]+'px;left:'+position+'px;bottom:'+configData[set + "Config"].bottom+'px;position:absolute;'+zindex+'" src="/img/'+currentData[0]+'" class="'+classNames+'""> </div>');
			} else if (configData[set + "Config"].area == 2) {
				if (Math.floor(Math.random() * (2)) == 0) {
					marginObject = 'left';
					var position = checkForMargins(configData[set + "Config"].margin,marginLocations[marginObject],set,screenwidth,objects,sideBits,configData[set + "Config"].edgeOffset,'0',reversed);					
					var marginedPosition = position.split("|")[1];
					position = position.split("|")[0];
					if (position != 'givenUp') {	
						$('#'+area2).append('<img style="width:'+currentData[1]+'px;height:'+currentData[2]+'px;left:'+position+'px;bottom:'+configData[set + "Config"].bottom+'px;position:absolute;" src="/img/'+currentData[0]+'" class="'+classNames+'"> </div>');
						marginLocations[marginObject].push(marginedPosition);
					}
				} else {
					marginObject = 'right';
					var position = checkForMargins(configData[set + "Config"].margin,marginLocations[marginObject],set,screenwidth,objects,sideBits,configData[set + "Config"].edgeOffset,'0',reversed);	
					var marginedPosition = position.split("|")[1];
					position = position.split("|")[0];
					if (position != 'givenUp') {				
						$('#'+area3).append('<img style="width:'+currentData[1]+'px;height:'+currentData[2]+'px;left:'+position+'px;bottom:'+configData[set + "Config"].bottom+'px;position:absolute;" src="/img/'+currentData[0]+'"" class="'+classNames+'"> </div>');
						marginLocations[marginObject].push(marginedPosition);
					}
				}
			} else if (configData[set + "Config"].area == 3) { 
				var position = checkForMargins(configData[set + "Config"].margin,marginLocations[objects],set,screenwidth,objects,'600','0','0',reversed);
				var zindex = 'z-index:0;';
				if (configData[set + "Config"].behind == 0) {
					zindex = 'z-index:1;'
				}
				var marginedPosition = position.split("|")[1];
				position = position.split("|")[0];				
				marginLocations[objects].push(position);
				$('#'+area4).append('<img style="width:'+currentData[1]+'px;height:'+currentData[2]+'px;left:'+position+'px;bottom:'+configData[set + "Config"].bottom+'px;position:absolute;'+zindex+'" src="/img/'+currentData[0]+'" class="'+classNames+'"> </div>');
				marginLocations[objects].push(position);
			}
			
		}
	}
	triggerAnimation();
}

function checkForMargins(margin,locationArray,set,screenwidth,objectNo,size,offset,overlap,reversed) {
	var isOk = 0;
	var newPosition;
	if (reversed == 1) {
		var originPosition = configData[set + "Data"][objectNo].split("|")[4];
	} else {
		var originPosition = configData[set + "Data"][objectNo].split("|")[3];
	}
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
		    if ((parseInt(newPosition) + parseInt(originPosition) - parseInt(margin)) < locationArray[i] && (parseInt(newPosition) + parseInt(originPosition) + parseInt(margin)) > locationArray[i]) {
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

			newPosition = 'givenUp';
		}
	}
	var marginedPosition = parseInt(newPosition) + parseInt(originPosition);
	return newPosition + '|' + marginedPosition;
}

function dealWithSky(now) {
	$('.Sun').remove();
    var division = 100/12;
    if (now > 6 && now < 18) {
    	var distance = now - 6;
    	$('#proceduralArea').append('<div style="width:144px;height:158px;margin-left:-72px;left:'+(distance*division)+'%;bottom:245px;position:absolute;background-image: url(/img/New-Growth_sun.gif);" class="Sun nonReverser"> </div>');
    	$('header').css('background-image','url(../img/New-Growth_skybox.png)')
    } else {
    	configData.objects = [
				//"Sun",
				//"Clouds",
				"Mountains",
				"TreesPine",
				"TreesOther",
				"Wolf",
				"Camp",
				"RedBird",
				"BlueBird"
				//"Trees"
				//"Trees3",
				//"Trees2",
				//"Trees1",
				//"Uniques"
			]
    	if (now < 5) {
    		var distance = now + 6 ;
    	} else {
    		var distance = now - 17;
    	}
    	$('#proceduralArea').append('<div style="width:118px;height:118px;margin-left:-72px;left:'+(distance*division)+'%;bottom:245px;position:absolute;background-image: url(/img/New-Growth_moon.png);background-color: #0a1623;" class="Sun nonReverser"> </div>');
    	$('header').css('background-image','url(../img/New-Growth_stars.gif)').css('background-color','#0a1623');
    }
    arrangeTheSides('clearMain','outterClear',800,1);
}

function makeFaint() {arrangeTheSides('clearMain','outterClear',400,1);}
function makeSolid() {arrangeTheSides('clearMain','outterClear',400,0);}

var howManyImages = 1;

function triggerAnimation() {
	var numItems = $('.animObject').length;
	var randomTimer;
	var randomObject = Math.floor(Math.random() * numItems);
	var oldSrc = $('.animObject:eq('+randomObject+')').attr('src');
	if (oldSrc.indexOf("_anim") == -1) {
		var newSrc = oldSrc.replace('.gif', '_anim.gif?v='+howManyImages);
		newSrc = newSrc.replace('_anim_anim.gif', '_anim.gif');
		$('.animObject:eq('+randomObject+')').one("load", function() {
	        setTimeout(function() {$('.animObject:eq('+randomObject+')').attr('src',oldSrc);}, 10000);
	    }).attr('src',newSrc);
		howManyImages++;
		randomTimer = Math.floor((Math.random() * 2000) + 6000);
	} else {
		randomTimer = Math.floor((Math.random() * 1000) + 1000);
	}	
	animTimer = setTimeout(function() {triggerAnimation()},randomTimer);
}

//Underground objects
underGroundData = {};

underGroundData.objects = [
	"moleMan",
	"fish",
	"dino",
	"worm"
]

underGroundData.moleMan = {};
underGroundData.moleMan.image = 'mole_black.png'
underGroundData.moleMan.width='376';
underGroundData.moleMan.height='244';
underGroundData.moleMan.animates='0';

underGroundData.fish = {};
underGroundData.fish.image = 'fish_black.png'
underGroundData.fish.width='274';
underGroundData.fish.height='260';
underGroundData.fish.animates='0';

underGroundData.dino = {};
underGroundData.dino.image = 'dinoBones_black.png'
underGroundData.dino.width='340';
underGroundData.dino.height='403';
underGroundData.dino.animates='0';

underGroundData.worm = {};
underGroundData.worm.image = 'New-Growth_Worm.gif'
underGroundData.worm.width='100';
underGroundData.worm.height='134';
underGroundData.worm.animates='1';


function arrangeTheSides(aim,outer,heightPerObject,faintMaker) {
	var heightToUse = $('#'+aim).height();
	var total = Math.floor(heightToUse / heightPerObject);
	heightPerObject = heightToUse / total;
	console.log(heightPerObject);
	var widthToUse = ($('#'+outer).width() - $('#'+aim).width()) / 2;
	var first = 1;
	var lastObject;
	var lastSide;
	var previousObject = 2;;
	var previousSide = 0;;
	var objectChosen;
	var revered;
	$( ".groundObject" ).remove();
	console.log(heightToUse + ' - ' + widthToUse + ' - ' + total);
	for (var i=0; i<total; i++) {
		if (first == 1) {
			var sideTime = Math.floor(Math.random() * (2));
		} else {
			if (sideTime == 1) {
				sideTime = 0;
			} else {
				sideTime = 1;
			}
			lastSide = previousSide;
			previousSide = reversed;
		}
		if (Math.floor(Math.random() * (2)) == 0) {
			classNames = "reverser groundObject";
			reversed = 1;
		} else {
			classNames = "nonReverser groundObject";
			reversed = 0;
		}
		var defaultDistance = heightPerObject*i;
		if (first == 1) {
			first = 0;
		} else {
			lastObject = previousObject;
			previousObject = objectChosen;
		}
		objectChosen = Math.ceil(Math.random() * underGroundData.objects.length) - 1;
		if (objectChosen == lastObject && objectChosen == previousObject) {
			objectChosen = Math.ceil(Math.random() * underGroundData.objects.length) - 1;
		}
		if (lastObject == objectChosen && lastSide == reversed) {
			if (reversed == 1) { reversed = 0;classNames = "nonReverser groundObject";} else {reversed = 1;classNames = "reverser groundObject";}
		}
		var objectTarget  = underGroundData.objects[objectChosen];
		var distanceFromTop = Math.floor((Math.random() * (heightPerObject - underGroundData[objectTarget].height)) + defaultDistance);
		distanceFromSide = 0;
		var distanceFromSide = Math.floor(Math.random() * (widthToUse - parseInt(underGroundData[objectTarget].width)));
		distanceFromSide =  parseInt(distanceFromSide) + parseInt(underGroundData[objectTarget].width);
		
		if (sideTime == 0) {
			var target = 'right:-'+distanceFromSide;
		} else {
			var target = 'left:-'+distanceFromSide;
		}
		if (underGroundData[objectTarget].animates == '1') {
			classNames = classNames + ' animObject';
		}
		if (faintMaker == 1) {
			var imageForGround = underGroundData[objectTarget].image.replace('.gif', '_faint.gif').replace('.png', '_faint.png');;
		} else {
			var imageForGround = underGroundData[objectTarget].image;
		}
		$('#'+aim).append('<img style="width:'+underGroundData[objectTarget].width+'px;height:'+underGroundData[objectTarget].height+'px;'+target+'px;top:'+distanceFromTop+'px;position:absolute;" src="/img/'+imageForGround+'"" class="'+classNames+'"> </div>');
	}
}