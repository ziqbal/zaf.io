

(function _jqw_(){(window.$)?_boot():setTimeout(_jqw_,1);})();


var _onload=(function(){

	var funs=[];

	function my(){}

	my.runFuns=function(){
		for (var i=0;i<funs.length;i++) funs[i]();
	};

	my.addFun=function(func){
		funs.push(func);
	}

	my();
	window.onload=my.runFuns;
	return(my);
})();



function _boot(){
}

$(function(){

	collapse();
});

function collapse(){
    $('._collapse').each(function(){
        if($(this).text().trim().length==0) $(this).remove();
    });
}