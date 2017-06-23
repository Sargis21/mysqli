$(document).ready(function(){
	$('button[data-del]').click(function(){
		var id = $(this).data('del');
		var answer = confirm("vi distvitelno xatite udalit etot zapis "+id);
		if(answer){
			location.href= 'delete.php?del='+id;
		}
	});
});