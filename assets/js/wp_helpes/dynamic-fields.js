window.onload = function() {
    dynamic_fields(
		8,
		'input_tags_wrap',
		'add_tag',
		'remove_tag',
		'tr-tags',
		'tags',
		'text'
	);
}

function dynamic_fields(max_fields, wrapper_class, add_btn_class, rmv_btn_class, input_class, input_name, input_type) {
	jQuery(function ($) {
		var x = document.querySelectorAll(`.${input_class}`).length;
		
		$(`.${add_btn_class}`).click(function (e) {
            e.preventDefault();
			if (x < max_fields) {
				switch (input_type) {
					case 'text':
						$(`.${wrapper_class}`).append('<div><input type="text" name="' + input_name + '[]" class="' + input_class + '"/></div>');
						break;

					default:
						break;
				}
				x++;
			}
		});

		$(`.${rmv_btn_class}`).click(function (e) {
			e.preventDefault();
			if (x > 1) {
				$(`.${input_class}`).last().empty().remove();
				x--;
			}
		});
	});
}