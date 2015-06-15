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
	},
	load_grid_user:function(flag_first){
		data_post = {};
		url = base_url+'load-grid-user.html'
		if(flag_first == true){
			var page_current = $('#page_current').val();
			data_post.page_current = page_current;
			data_post.flag_first = flag_first;
		}else{
			data_post.page_current = page_current;
			data_post.flag_first = flag_first;
		}
		$.ajax({
			url: url,
			type: 'POST',
			typeData:'json',
			data: data_post,
			success: function(data) {
				data=$.parseJSON(data);
				$.each(data.data_discuss, function(k3,v3){
					obj = cmt.build_data_message(v3);
					build_template_app('item_message','member-to-'+v.id_member_to,obj);
					data_online[v.id_member_to]['discuss'].push(obj);
					$.jStorage.set('data_online',data_online);
				});
			}
		});
	}
	
}