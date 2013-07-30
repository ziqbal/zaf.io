<?php

$totalBlobs=100;
$blobW=20;
$blobH=20;

$blobBorder=1;

$blobFH=$blobH+($blobBorder*2);

?>

<div id='_demo'></div>

<style>

.blob{
	width:<?=$blobW?>px;
	height:<?=$blobH?>px;
	line-height:<?=$blobFH?>px;
	position: absolute;
	top:-1000px;
	left:-1000px;
	zopacity: 0.4;
	border: <?=$blobBorder?>px dotted #888;
	-moz-border-radius: 11px;
	border-radius: 11px;
	font-size: xx-small;
	text-align:center;

}

</style>

<?php

for($i=0;$i<$totalBlobs;$i++){

	$rndCol=imageColourArrayToHex(imageColourDatabaseRnd());
	$fontCol=imageColourArrayToHex(imageColourContrast(imageColourToArrayDec($rndCol)));

	print("<style>#blob$i{background-color:#$rndCol;color:#$fontCol;}</style>");
	print("<div id='blob$i' class='blob'>$i</div>");
}

?>



<script>
(function() {
var lastTime = 0;
var vendors = ['ms', 'moz', 'webkit', 'o'];
for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame']
			   || window[vendors[x]+'CancelRequestAnimationFrame'];
}

if (!window.requestAnimationFrame)
window.requestAnimationFrame = function(callback, element) {
    var currTime = new Date().getTime();
    var timeToCall = Math.max(0, 16 - (currTime - lastTime));
    var id = window.setTimeout(function() { callback(currTime + timeToCall); },
      timeToCall);
    lastTime = currTime + timeToCall;
    return id;
};

if (!window.cancelAnimationFrame)
window.cancelAnimationFrame = function(id) {
    clearTimeout(id);
};
}());

$(function(){
	var offset = $("#_demo").offset();

	var w1=$(window).width()-offset.left;
	var h1=$(window).height()-offset.top;

	var w2=w1/Math.sqrt(2);
	var h2=h1/Math.sqrt(2);
	var bw=<?=$blobW?>;
	var bh=<?=$blobH?>;

	var ox=(w1-w2-bw)/2;
	var oy=(h1-h2-bh)/2;
	ox=ox+offset.left;
	oy=oy+offset.top;


//	alert(w1+","+h1+" "+w2+","+h2);
	var cc=0;
	function draw(){
		setTimeout(function(){requestAnimationFrame(draw);},3000);
		$( ".blob" ).each(function( index ) {
			if(cc==0){
				var rx=Math.floor(Math.random() * (w2-bw));
				var ry=Math.floor(Math.random() * (h2-bh));
			}else{
				var rx=Math.floor(Math.sin(index*3.141/180) * (h2-bh));
				var ry=Math.floor(Math.cos(index*3.141/180) * (h2-bh));
				cc=0;
			}
			var x=ox+rx;
			var y=oy+ry;
			$(this).css("top", y).css("left",x);
		});
		//cc++;
	}
	draw();
});
</script>