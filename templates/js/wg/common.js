var common = {};
var page_next = 1;
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
		$('.user-grid').html('');
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
				$.each(data.list, function(k,v){
					common.build_template_app_full('#user-grid','.user-grid',v);
				});
				$('#paging-form').html('');
				if(data.total_page >1){
					$('#paging-form').html('<div id="page-selection-'+page_next+'" class="pull-right"></div>');
					$('#page-selection-'+page_next).bootpag({
						total: data.total_page,
						maxVisible: 5,
						page :1
					}).on("page", function(event, /* page number here */ num){
						 common.load_grid_user_paging(num);
					});
					page_next++;
				}
			}
		});
	},
	load_user_detail:function(id_user){
		common.reset_form_user();
		data_post = {};
		url = base_url+'user-'+id_user+'.html';
		$.ajax({
			url: url,
			type: 'POST',
			typeData:'json',
			data: data_post,
			success: function(data) {
				data=$.parseJSON(data);
				if(data.flag ==true){
					$('#lb_password').val('');
					$('#id_user').val(data.detail.id_user);
					$('#lb_fullname').val(data.detail.lb_fullname);
					$('#lb_username').val(data.detail.lb_username);
					$('#lb_address').val(data.detail.lb_address);
					$('#lb_phone').val(data.detail.lb_phone);
					$('#lb_email').val(data.detail.lb_email);
					if(data.detail.bl_active==1){
						$("#bl_active").prop('checked', true);
					}
					
				}
			}
		});
		
	},
	load_grid_user_paging:function(page_number){
		$('.user-grid').html('');
		data_post = {};
		url = base_url+'load-grid-user-paging.html'
		var page_current = page_number;
		data_post.page_current = page_current;
		$.ajax({
			url: url,
			type: 'POST',
			typeData:'json',
			data: data_post,
			success: function(data) {
				data=$.parseJSON(data);
				$.each(data.list, function(k,v){
					common.build_template_app_full('#user-grid','.user-grid',v);
				});
				$('#paging-form').html('');				
				if(data.total_page >1){
					$('#paging-form').html('<div id="page-selection-'+page_next+'" class="pull-right"></div>');
					$('#page-selection-'+page_next).bootpag({
						total: data.total_page,
						maxVisible: 5,
						page :page_number
					}).on("page", function(event, /* page number here */ num){
						 common.load_grid_user_paging(num);
					});
					page_next++;
				}
			}
		});
	},
	save_user:function(){
		data_post =this.check_input_user();
		if(data_post!=false){
			data_post = data_post;
			url = base_url+'user-save.html';
			$.ajax({
				url: url,
				type: 'POST',
				typeData:'json',
				data: data_post,
				success: function(data) {
					data=$.parseJSON(data);
					if(data.flag == true){
						alert(data.message);
						common.reset_form_user();
						common.load_grid_user(true);
					}else{
						error ="";
						$.each(data.error, function(k,v){
							error +=v+'\n' ;
						});
						alert(error);
					}
				}
			});
		}
	},
	check_input_user:function(){
		flag = false;
		errors = "";
		id_user = $('#id_user').val();
		lb_fullname = $('#lb_fullname').val();
		lb_username = $('#lb_username').val();
		lb_password = $('#lb_password').val();
		lb_address = $('#lb_address').val();
		lb_phone = $('#lb_phone').val();
		lb_email = $('#lb_email').val();
		bl_active = $('#bl_active').val();
		if($.trim(lb_fullname)==""){
			errors +="Yêu cầu nhập họ tên\n";
		}
		if($.trim(lb_username)==""){
			errors +="Yêu cầu nhập username\n";
		}
		if($.trim(lb_password)==""){
			if(id_user >0){
			}else{	
				errors +="Yêu cầu nhập password\n";
			}
		}
		if($.trim(lb_address)==""){
			errors +="Yêu cầu nhập địa chỉ\n";
		}
		if($.trim(lb_phone)==""){
			errors +="Yêu cầu nhập điện thoại\n";
		}
		if($.trim(lb_email)==""){
			errors +="Yêu cầu nhập email\n";
		}
		if(errors !=""){
			alert(errors)
			return  false;
		}
		obj = {};
		obj.id_user = id_user;
		obj.lb_fullname = lb_fullname;
		obj.lb_username = lb_username;
		obj.lb_password = lb_password;
		obj.lb_address = lb_address;
		obj.lb_phone = lb_phone;
		obj.lb_email = lb_email;
		if($('#bl_active').is(":checked")){
			obj.bl_active = bl_active;
		}else{
			obj.bl_active = 0;
		}
		return obj;
	},
	delete_user:function(id_user){
		if(confirm("Bạn có chắc muốn xóa?")){
			 $('#id_user').val(id_user);
			common.action_delete_user();
		}
	},
	delete_user_edit:function(){
		id_user = $('#id_user').val();
		if(id_user > 0){
			if(confirm("Bạn có chắc muốn xóa?")){
				
				common.action_delete_user();
			}
		}
	},
	action_delete_user :function(){
		id_user = $('#id_user').val();
		if(id_user > 0){
			data_post = {};
			data_post.id_user = id_user;
			url = base_url+'user-delete.html';
			$.ajax({
				url: url,
				type: 'POST',
				typeData:'json',
				data: data_post,
				success: function(data) {
					data=$.parseJSON(data);
					if(data.flag ==true){
						common.load_grid_user(true);
						
					}
				}
			});	
		}
	},
	reset_form_user :function(){
		$('#lb_password').val('');
		$('#id_user').val(0);
		$('#lb_fullname').val('');
		$('#lb_username').val('');
		$('#lb_address').val('');
		$('#lb_phone').val('');
		$('#lb_email').val('');
		$('#bl_active').attr('checked',false) ;
		$('#lb_fullname').focus();
	},
	build_template_app_full:function(id_template,class_name,data_obj){
		$(id_template).tmpl(data_obj).appendTo(class_name);
	},
	load_grid_member:function(flag_first){
		$('.member-grid').html('');
		data_post = {};
		url = base_url+'load-grid-member.html'
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
				$.each(data.list, function(k,v){
					common.build_template_app_full('#member-grid','.member-grid',v);
				});
				$('#paging-form').html('');
				if(data.total_page >1){
					$('#paging-form').html('<div id="page-selection-'+page_next+'" class="pull-right"></div>');
					$('#page-selection-'+page_next).bootpag({
						total: data.total_page,
						maxVisible: 5,
						page :1
					}).on("page", function(event, /* page number here */ num){
						 common.load_grid_member_paging(num);
					});
					page_next++;
				}
			}
		});
	},
	load_grid_member_paging:function(page_number){
		$('.member-grid').html('');
		data_post = {};
		url = base_url+'load-grid-member-paging.html'
		var page_current = page_number;
		data_post.page_current = page_current;
		$.ajax({
			url: url,
			type: 'POST',
			typeData:'json',
			data: data_post,
			success: function(data) {
				data=$.parseJSON(data);
				$.each(data.list, function(k,v){
					common.build_template_app_full('#member-grid','.member-grid',v);
				});
				$('#paging-form').html('');				
				if(data.total_page >1){
					$('#paging-form').html('<div id="page-selection-'+page_next+'" class="pull-right"></div>');
					$('#page-selection-'+page_next).bootpag({
						total: data.total_page,
						maxVisible: 5,
						page :page_number
					}).on("page", function(event, /* page number here */ num){
						 common.load_grid_member_paging(num);
					});
					page_next++;
				}
			}
		});
	},
	load_member_detail:function(id_member){
		common.reset_form_member();
		data_post = {};
		url = base_url+'member-'+id_member+'.html';
		$.ajax({
			url: url,
			type: 'POST',
			typeData:'json',
			data: data_post,
			success: function(data) {
				data=$.parseJSON(data);
				if(data.flag ==true){
					if(data.detail.bl_active==1){
						$("#bl_active").prop('checked', true);
					}
					$('#id_member').val(data.detail.id_member);
					$('#cd_member').val(data.detail.cd_member);
					$('#lb_fullname').val(data.detail.lb_fullname);
					$('#lb_birthday').val(data.detail.lb_birthday);
					$('#lb_address_resident').val(data.detail.lb_address_resident);
					$('#lb_address_staying').val(data.detail.lb_address_staying);
					$('#lb_phone').val(data.detail.lb_phone);
					$('#lb_email').val(data.detail.lb_email);
					$('#lb_id_card').val(data.detail.lb_id_card);
					$('#dt_range').val(data.detail.dt_range);
					$('#lb_place_of_issue').val(data.detail.lb_place_of_issue);
					$('#id_person_introduce').val(data.detail.id_person_introduce);
					$('#lb_person_introduce').val(data.detail.lb_person_introduce);
					$('#lb_person_assign').val(data.detail.lb_person_assign);
					$("#lb_person_assign").attr("disabled", "disabled");
					$('#id_person_assign').val(data.detail.id_person_assign);
					$('#nb_payment').val(data.detail.nb_payment);
					$('#lb_name_account_1').val(data.detail.lb_name_account_1);
					$('#lb_number_account_1').val(data.detail.lb_number_account_1);
					$('#lb_name_bank_1').val(data.detail.lb_name_bank_1);
					$('#lb_bank_branch_1').val(data.detail.lb_bank_branch_1);
					$('#lb_name_account_2').val(data.detail.lb_name_account_2);
					$('#lb_number_account_2').val(data.detail.lb_number_account_2);
					$('#lb_name_bank_2').val(data.detail.lb_name_bank_2);
					$('#lb_bank_branch_2').val(data.detail.lb_bank_branch_2);
					
				}
			}
		});
		
	},
	set_default_label:function(id_member){
		bl_default_label = $('#bl_default_label-'+id_member).val();
		data_post = {};
		data_post.bl_default_label = parseInt(bl_default_label);
		data_post.id_member = id_member;
		url = base_url+'default-label-member-'+id_member+'.html';
		$.ajax({
			url: url,
			type: 'POST',
			typeData:'json',
			data: data_post,
			success: function(data) {
				data=$.parseJSON(data);
				if(data.flag ==true){
					if(parseInt(bl_default_label) ==1){
						$('#default_label-'+id_member).removeClass('fa-fire');
						$('#default_label-'+id_member).addClass('fa-leaf ');
						$('#bl_default_label-'+id_member).val(0);
					}else{
						$('#default_label-'+id_member).addClass('fa-fire');
						$('#default_label-'+id_member).removeClass('fa-leaf');
						$('#bl_default_label-'+id_member).val(1);
					}
				}
			}
		});
		
	},
	delete_member:function(id_member){
		if(confirm("Bạn có chắc muốn xóa?")){
			 $('#id_member').val(id_member);
			common.action_delete_member();
		}
	},
	delete_member_edit:function(){
		id_member = $('#id_member').val();
		if(id_member > 0){
			if(confirm("Bạn có chắc muốn xóa?")){
				common.action_delete_member();
			}
		}
	},
	action_delete_member :function(){
		id_member = $('#id_member').val();
		if(id_member > 0){
			data_post = {};
			data_post.id_member = id_member;
			url = base_url+'member-delete.html';
			$.ajax({
				url: url,
				type: 'POST',
				typeData:'json',
				data: data_post,
				success: function(data) {
					data=$.parseJSON(data);
					if(data.flag ==true){
						common.load_grid_member(true);
					}
				}
			});	
			common.reset_form_member();
		}
	},
	reset_form_member:function(){
		$('#id_member').val(0);
		$('#cd_member').val('');
		$('#lb_fullname').val('');
		$('#lb_birthday').val('');
		$('#lb_address_resident').val('');
		$('#lb_address_staying').val('');
		$('#lb_phone').val('');
		$('#lb_email').val('');
		$('#lb_id_card').val('');
		$('#dt_range').val('');
		$('#lb_place_of_issue').val('');
		$('#id_person_introduce').val('');
		$('#lb_person_introduce').val('');
		$('#id_person_assign').val('');
		$("#lb_person_assign").removeAttr("disabled");
		$('#lb_person_assign').val('');
		$('#nb_payment').val('');
		$('#lb_name_account_1').val('');
		$('#lb_number_account_1').val('');
		$('#lb_name_bank_1').val('');
		$('#lb_bank_branch_1').val('');
		$('#lb_name_account_2').val('');
		$('#lb_number_account_2').val('');
		$('#lb_name_bank_2').val('');
		$('#lb_bank_branch_2').val('');
		$('#bl_active').attr('checked',false) ;
		$('#lb_fullname').focus();
	},
	save_member:function(){
		data_post =this.check_input_member();
		if(data_post!=false){
			data_post = data_post;
			url = base_url+'member-save.html';
			$.ajax({
				url: url,
				type: 'POST',
				typeData:'json',
				data: data_post,
				success: function(data) {
					data=$.parseJSON(data);
					if(data.flag == true){
						alert(data.message);
						common.reset_form_member();
						common.load_grid_member(true);
					}else{
						error ="";
						$.each(data.error, function(k,v){
							error +=v+'\n' ;
						});
						alert(error);
					}
				}
			});
		}
	},
	check_input_member:function(){
		flag = false;
		errors = "";
		id_member = $('#id_member').val();
		cd_member = $('#cd_member').val();
		lb_fullname = $('#lb_fullname').val();
		lb_birthday = $('#lb_birthday').val();
		lb_address_resident = $('#lb_address_resident').val();
		lb_address_staying = $('#lb_address_staying').val();
		lb_phone = $('#lb_phone').val();
		lb_email = $('#lb_email').val();
		lb_id_card = $('#lb_id_card').val();
		dt_range  = $('#dt_range').val();
		lb_place_of_issue = $('#lb_place_of_issue').val();
		id_person_introduce  = $('#id_person_introduce').val();
		id_person_assign  = $('#id_person_assign').val();
		nb_payment  = $('#nb_payment').val();
		lb_name_account_1 = $('#lb_name_account_1').val();
		lb_number_account_1 = $('#lb_number_account_1').val();
		lb_name_bank_1 = $('#lb_name_bank_1').val();
		lb_bank_branch_1 = $('#lb_bank_branch_1').val();
		lb_name_account_2 = $('#lb_name_account_2').val();
		lb_number_account_2 = $('#lb_number_account_2').val();
		lb_name_bank_2 = $('#lb_name_bank_2').val();
		lb_bank_branch_2 = $('#lb_bank_branch_2').val();
		bl_active = $('#bl_active').val();
		if($.trim(cd_member)==""){
			errors +="Yêu cầu nhập mã số\n";
		}
		if($.trim(lb_fullname)==""){
			errors +="Yêu cầu nhập họ tên\n";
		}
		if($.trim(lb_birthday)==""){
			//errors +="Yêu cầu nhập ngày sinh\n";
		}
		
		if($.trim(lb_address_staying)==""){
			//errors +="Yêu cầu nhập địa chỉ tạm trú\n";
		}
		if($.trim(lb_phone)==""){
			//errors +="Yêu cầu nhập điện thoại\n";
		}
		if($.trim(lb_email)==""){
			//errors +="Yêu cầu nhập email\n";
		}
		if($.trim(lb_id_card)==""){
			//errors +="Yêu cầu nhập CMND\n";
		}
		if($.trim(id_person_assign)==""||$.trim(id_person_assign)<1){
			errors +="Yêu cầu nhập người chỉ định\n";
		}
		if($.trim(lb_name_account_1)==""){
			//errors +="Yêu cầu nhập tên tài khoản 1\n";
		}
		if($.trim(lb_number_account_1)==""){
			//errors +="Yêu cầu nhập số tài khoản 1\n";
		}
		if($.trim(lb_name_bank_1)==""){
			//errors +="Yêu cầu nhập  tên ngân hàng 1\n";
		}
		if(errors !=""){
			alert(errors)
			return  false;
		}
		obj = {};
		obj.id_member = id_member;
		obj.cd_member = cd_member;
		obj.lb_fullname = lb_fullname;
		obj.lb_birthday = lb_birthday;
		obj.lb_address_resident = lb_address_resident;
		obj.lb_address_staying = lb_address_staying;
		obj.lb_phone = lb_phone;
		obj.lb_email = lb_email;
		obj.lb_id_card = lb_id_card;
		obj.dt_range = dt_range;
		obj.lb_place_of_issue = lb_place_of_issue;
		obj.id_person_introduce = id_person_introduce;
		obj.id_person_assign = id_person_assign;
		obj.nb_payment = nb_payment;
		obj.lb_name_account_1 = lb_name_account_1;
		obj.lb_number_account_1 = lb_number_account_1;
		obj.lb_name_bank_1 = lb_name_bank_1;
		obj.lb_bank_branch_1 = lb_bank_branch_1;
		obj.lb_name_account_2 = lb_name_account_2;
		obj.lb_number_account_2 = lb_number_account_2;
		obj.lb_name_bank_2 = lb_name_bank_2;
		obj.lb_bank_branch_2 = lb_bank_branch_2;
		if($('#bl_active').is(":checked")){
			obj.bl_active = bl_active;
		}else{
			obj.bl_active = 0;
		}
		return obj;
	},
	find_info_person_introduce:function(){
		var cache_friend = {};
		$("#lb_person_introduce").autocomplete({  
			source: function(req, add){  
					  var term = req.term;
						if ( term in cache_friend ) {
							add( cache_friend[ term ] );
							return;
						}
						term = req.term
						 $.getJSON(base_url+"find-person.html", {term:term,type:'introduce'}, function(data) {  
							 cache_friend[ term ] = data;
							 var suggestions = [];  
							 $.each(data, function(i, val){  
								 suggestions.push(val);  
							 });  
						 add(suggestions);  
					 });   
			},
			open: function(event, ui) { $(".ui-slider-handle").css("z-index", 10000); },
			focus: function( event, ui ) {
				
			 },
			 multiple: true,
			 select: function( event, ui ) {
				 $('#id_person_introduce').val(ui.item.id);
			 },close: function( event, ui ) {
				
			 },change:function( event, ui ){
				 
			 }
		});
		
	},
	find_info_person_assign:function(){
		var cache_friend = {};
		$("#lb_person_assign").autocomplete({  
			source: function(req, add){  
					  var term = req.term;
						if ( term in cache_friend ) {
							add( cache_friend[ term ] );
							return;
						}
						term = req.term
						 $.getJSON(base_url+"find-person.html", {term:term,type:'assign'}, function(data) {  
							 cache_friend[ term ] = data;
							 var suggestions = [];  
							 $.each(data, function(i, val){  
								 suggestions.push(val);  
							 });  
						add(suggestions);  
					 });   
			},
			open: function(event, ui) { $(".ui-slider-handle").css("z-index", 10000); },
			focus: function( event, ui ) {
				
			 },
			 multiple: true,
			 select: function( event, ui ) {
				 $('#id_person_assign').val(ui.item.id);
			 },close: function( event, ui ) {
				
			 },change:function( event, ui ){
				 
			 }
		});
	},
	load_grid_payment:function(flag_first){
		$('.payment-member-grid').html('');
		cd_member = $('#cd_member').val();
		lb_fullname = $('#lb_fullname').val();
		dt_from = $('#dt_from').val();
		dt_to = $('#dt_to').val();
	
		data_post = {};
		data_post.cd_member = cd_member;
		data_post.lb_fullname = lb_fullname;
		data_post.dt_from = dt_from;
		data_post.dt_to = dt_to;
		url = base_url+'load-grid-payment-member.html'
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
				$.each(data.list, function(k,v){
					common.build_template_app_full('#payment-member-grid','.payment-member-grid',v);
				});
				$('#paging-form').html('');
				if(data.total_page >1){
					$('#paging-form').html('<div id="page-selection-'+page_next+'" class="pull-right"></div>');
					$('#page-selection-'+page_next).bootpag({
						total: data.total_page,
						maxVisible: 5,
						page :1
					}).on("page", function(event, /* page number here */ num){
						 common.load_grid_payment_paging(num);
					});
					page_next++;
				}
			}
		});
	},
	load_grid_payment_paging:function(page_number){
		$('.payment-member-grid').html('');
		cd_member = $('#cd_member').val();
		lb_fullname = $('#lb_fullname').val();
		dt_from = $('#dt_from').val();
		dt_to = $('#dt_to').val();
	
		data_post = {};
		data_post.cd_member = cd_member;
		data_post.lb_fullname = lb_fullname;
		data_post.dt_from = dt_from;
		data_post.dt_to = dt_to;
		url = base_url+'load-grid-payment-member-paging.html'
		var page_current = page_number;
		data_post.page_current = page_current;
		$.ajax({
			url: url,
			type: 'POST',
			typeData:'json',
			data: data_post,
			success: function(data) {
				data=$.parseJSON(data);
				$.each(data.list, function(k,v){
					common.build_template_app_full('#payment-member-grid','.payment-member-grid',v);
				});
				$('#paging-form').html('');				
				if(data.total_page >1){
					$('#paging-form').html('<div id="page-selection-'+page_next+'" class="pull-right"></div>');
					$('#page-selection-'+page_next).bootpag({
						total: data.total_page,
						maxVisible: 5,
						page :page_number
					}).on("page", function(event, /* page number here */ num){
						 common.load_grid_payment_paging(num);
					});
					page_next++;
				}
			}
		});
	}
	
}