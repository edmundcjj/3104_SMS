
$( function(){
 	var date = new Date();
	//var currentMonth = date.getMonth(); // current month
    //var currentDate = date.getDate(); // current date
    var currentYear = date.getFullYear(); // get current year
  	
  	// JQuery Datepicker Function
    $(".datepicker").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: (currentYear - 50) +":" + (currentYear),
      maxDate: 0,
      dateFormat: 'dd M yy'
    });

  });

$("#eye").mousedown(function(){
                $("#student_Pass").attr('type','text');
            }).mouseup(function(){
              $("#student_Pass").attr('type','password');
            }).mouseout(function(){
              $("#student_Pass").attr('type','password');
            });
            
$("#leye").mousedown(function(){
                $("#lecturer_Password").attr('type','text');
            }).mouseup(function(){
              $("#lecturer_Password").attr('type','password');
            }).mouseout(function(){
              $("#lecturer_Password").attr('type','password');
            });

$("#seelectpass").mousedown(function(){
                $("#lect_Pass").attr('type','text');
            }).mouseup(function(){
              $("#lect_Pass").attr('type','password');
            }).mouseout(function(){
              $("#lect_Pass").attr('type','password');
            });

$("#seepass").mousedown(function(){
                $("#stud_Pass").attr('type','text');
            }).mouseup(function(){
              $("#stud_Pass").attr('type','password');
            }).mouseout(function(){
              $("#stud_Pass").attr('type','password');
            });

$('#lecturer_chkBox').change(function(e){
  
  e.preventDefault(); 
  console.log('lecturer Hi');
  //$(this).closest('input.form-control').find('#lecturer_Pass').attr('disabled', !this.checked);
  document.getElementById('lecturer_Pass').disabled = !this.checked;
  
});

$('#student_chkBox').change(function(e){
  
  e.preventDefault(); 
  console.log('Student Hi');
    document.getElementById('stud_Pass').disabled = !this.checked;
  
}); 

