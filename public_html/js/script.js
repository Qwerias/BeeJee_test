'use strict';

function changeTasksHeight() {
	let header_height = $('.header').outerHeight();
	let nav_height = $('.nav').outerHeight();

	$('.tasks').css({
		'minHeight': 'calc(100vh - ' + (header_height + nav_height).toString() + 'px)'
	});
}

// обработка пагинации
(function () {
	changeTasksHeight();
	let tasks = $('.tasks__item');
	let current_page = 1;
	let buttons = $('.tasks__pager_button');

	let hideTasks = (current) => {
		tasks.addClass('disappear');
		tasks.slice().filter(index=> {
			return index + 1 > current * 3 - 3 && index + 1 <= current * 3;
		}).removeClass('disappear');
		buttons.removeClass('tasks__pager_button--active');
		buttons.filter((index, item) => +$(item).attr('data-page') === +current).addClass('tasks__pager_button--active');
	};

	hideTasks(current_page);

	buttons.each((index, item) => {
		item = $(item);
		item.on('click', function () {
			hideTasks(item.attr('data-page'));
			changeTasksHeight();
		});
	});
})();

// установка дефолтного значения выпадающего списка сортировки
(function () {
	let sort = $('.tasks__sort_select');
	sort.on('change', () => {
		location.href = '/?order=' + sort.val()
	});
})();

// обработка изменения статуса задачи
(function () {
	let checkbox = $('.tasks__item_edit_check');

	checkbox.each((index, box) => {
		box = $(box);
		box.on('change', () => {
			let item =  box.parents('.tasks__item');
			let data = JSON.stringify({
				task: item.attr('data-id'),
				status: box.prop('checked') ? 2 : 1
			});
			$.post('/edit/change_status', {
				taskStatus: data
			}).done(() => {
				item.find('.tasks__item_status > span').eq(1).text(box.prop('checked') ? 'Выполнено' : 'Невыполнено');
			});
		});
	});
})();