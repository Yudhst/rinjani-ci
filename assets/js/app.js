var i = 0;
$(document).ready(function() {
	var menu = window.location.pathname;
	console.log(menu);

	if (
		menu == "/rinjani-ci/home/catalogue" ||
		menu == "/rinjani-ci/user/home/catalogue"
	) {
		$("#linkCat").addClass("active");
	} else if (menu == "/rinjani-ci/user/home/cart") {
		$("#linkCart").addClass("active");
	} else if (
		menu == "/rinjani-ci/" ||
		menu == "/rinjani-ci/home" ||
		menu == "/rinjani-ci/user/home/" ||
		menu == "/rinjani-ci/user/home"
	) {
		$("#linkHome").addClass("active");
		$("#linkCat").removeClass("active");
	} else if (
		menu == "/rinjani-ci/user/home/mytrans" ||
		menu == "?menu=checkout"
	) {
		$("#linkTrans").addClass("active");
	}

	/**
	 * Datatables Library
	 */

	/**
	 * Ul SIdebar Admin
	 */

	$("#menuTrans").click(function() {
		$("#sidebar_item_trans ul li").toggle(200);
	});

	$("#menuUsers").click(function() {
		$("#sidebar_item_user ul li").toggle(200);
	});

	$(".table").DataTable();
	$(".table-item").DataTable();
});

function showNextImg() {
	i++;
	$("#sliderImg" + i)
		.appendTo("#slider")
		.effect("slide");
	if (i == 6) {
		i = 0;
	}
}
