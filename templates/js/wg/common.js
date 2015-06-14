var common = {};
common ={
	expend_collap:function(){
		$( '.target' ).toggle('slow',function(){
			if($(this).is(':hidden')) {
				$( "#ex-coll" ).removeClass('glyphicon-minus');
				$( "#ex-coll" ).addClass('glyphicon-plus');
			}else {
				$( "#ex-coll" ).removeClass('glyphicon-plus');
				$( "#ex-coll" ).addClass('glyphicon-minus');
			}
		});
	}
}