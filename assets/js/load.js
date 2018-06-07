$(document).ready(function(){
	
$('#submit').click(function(){


	var first_name = $('#first_name').val(); 

	 

	var last_name = $('#last_name').val();
	 

	var level = $('#level').val();

	

	var faculty = $('#faculty').val();



	var department = $('#department').val();



	var reg_num = $('#reg_num').val();


	$.ajax({

       url : base_url + "Ajax/add",

       type : 'POST',

       data : { 

                 first_name: first_name,
                 last_name: last_name,
                 level: level,
                 reg_num: reg_num,
                 department: department,
                 faculty: faculty,

              },

       dataType : 'JSON',

       success : function(resp){
             
             $('#feedback').html(resp.thank_you);

       },

   

	});


})
	

})

/*{ string : string, name: name }*/