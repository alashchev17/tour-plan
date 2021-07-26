$(document).ready(() => {
	const hotelSwiper = new Swiper(".hotel-slider", {
		// Optional parameters
		loop: true,

		// Navigation arrows
		navigation: {
			nextEl: ".hotel-slider__button--next",
			prevEl: ".hotel-slider__button--prev",
		},
		grabCursor: true,
		keyboard: {
			enabled: true,
		},
	});
	const reviewsSwiper = new Swiper(".reviews-slider", {
		// Optional parameters
		loop: true,

		// Navigation arrows
		navigation: {
			nextEl: ".reviews-slider__button--next",
			prevEl: ".reviews-slider__button--prev",
		},
		grabCursor: true,
		keyboard: {
			enabled: true,
		},
	});

	let menuButton = document.querySelector(".menu-button");
	menuButton.addEventListener("click", () => {
		document.querySelector(".navbar-bottom").classList.toggle("navbar-bottom--visible");
	});

	let modalButton = $("[data-toggle=modal]");
	let closeModalButton = $(".modal__close");
	modalButton.on("click", openModal);
	closeModalButton.on("click", closeModal);
	function openModal() {
		const modalOverlay = $(".modal__overlay");
		const modalDialog = $(".modal__dialog");
		modalOverlay.addClass("modal__overlay--visible");
		modalDialog.addClass("modal__dialog--visible");
	}

	function closeModal(event) {
		event.preventDefault();
		const modalOverlay = $(".modal__overlay");
		const modalDialog = $(".modal__dialog");
		modalOverlay.removeClass("modal__overlay--visible");
		modalDialog.removeClass("modal__dialog--visible");
	}

	$(document).keyup(function (event) {
		if (event.key === "Escape" || event.keyCode === 27) {
			event.preventDefault();
			const modalOverlay = $(".modal__overlay");
			const modalDialog = $(".modal__dialog");
			modalOverlay.removeClass("modal__overlay--visible");
			modalDialog.removeClass("modal__dialog--visible");
		}
	});

	// Обработка форм

	$(".form").each(function () {
		$(this).validate({
			errorClass: "invalid",
			messages: {
				name: {
					required: "Let us know your name",
				},
				email: {
					required: "We need your email address to contact you",
					email: "Your email address must be in the format name@domain.com",
				},
				phone: {
					required: "Please, fill the number field",
					minlength: jQuery.validator.format("Please, fill full phone number"),
				},
			},
		});
	});

	$(".phone").mask("+7 (000) 000-00-00");
});
