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
