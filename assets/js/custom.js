$(".page-scroll").on("click", function (e) {
	const tujuan = $(this).attr("href");
	const elementTujuan = $(tujuan);

	$("body,html,document").animate(
		{
			scrollTop: elementTujuan.offset().top - 100,
		},
		1000
	);

	e.preventDefault();
});
