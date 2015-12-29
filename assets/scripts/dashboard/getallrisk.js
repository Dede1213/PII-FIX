$(document).ready(function(){

	$('#forexcel').hide();
	$('#forpdf').hide();
	$('#forword').hide();

	
	$('#typereport').change(function(){	
		var typereport = $('#typereport').val();
		if(typereport === 'excel'){
			$('#forexcel').show();
			$('#forpdf').hide();
			$('#forword').hide();
		}else if(typereport === 'pdf'){
			$('#forexcel').hide();
			$('#forpdf').show();
			$('#forword').hide();
		}else if(typereport === 'word'){
			$('#forexcel').hide();
			$('#forpdf').hide();
			$('#forword').show();
		}else{
			$('#forexcel').hide();
			$('#forpdf').hide();
			$('#forword').hide();			
		}				
	});
});