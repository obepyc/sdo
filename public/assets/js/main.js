$(document).ready(function(){

	// Menu

	console.log($("#main_menu a").attr("href"));
	$("#main_menu a[href='"+window.location.href+"']").addClass('active'); 
	console.log(window.location.href);

	
	// alerts

	$(".alerts .alert .close").on('click', function(){
		$(this).parent().parent().remove();
	});

	// Tabs

	var tabs = $('#tabs');
	$('.tabs-content > div', tabs).each(function(i){
		if ( i != 0 ) $(this).hide(0);
	});
	tabs.on('click', '.tabs a', function(e){
		/* Предотвращаем стандартную обработку клика по ссылке */
		e.preventDefault();

		/* Узнаем значения ID блока, который нужно отобразить */
		var tabId = $(this).attr('href');

		/* Удаляем все классы у якорей и ставим active текущей вкладке */
		$('.tabs a',tabs).removeClass();
		$(this).addClass('active');

		/* Прячем содержимое всех вкладок и отображаем содержимое нажатой */
		$('.tabs-content > div', tabs).hide(0);
		$(tabId).show(200);
		
	});
});