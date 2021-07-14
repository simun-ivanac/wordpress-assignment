import Swiper, { Navigation, Pagination } from 'swiper';
import globalSettings from './../../../manifest.json';

export class CarouselSlider {
	constructor(options) {
		this.element = options.element;
		this.blockClass = options.blockClass;
		this.nextElement = options.nextElement;
		this.prevElement = options.prevElement;
		this.paginationElement = options.paginationElement;
		this.eventName = options.eventName;
	}

	init() {
		const item = this.element;

		const showItems = item.getAttribute('data-show-items');
		const { breakpoints } = globalSettings.globalVariables;

		Swiper.use([Navigation, Pagination]);

		new Swiper(item, {
			loop: item.getAttribute('data-swiper-loop'),
			slideClass: `${this.blockClass}__item`,
			slideNextClass: `${this.blockClass}__item-next`,
			slidePrevClass: `${this.blockClass}__item-prev`,
			slidesPerView: 'auto',
			loopedSlides: 1,
			spaceBetween: 20,
			centeredSlides: true,
			keyboard: {
				enabled: true,
			},
			grabCursor: true,
			breakpointsInverse: true,
			threshold: 20,
			navigation: {
				nextEl: this.nextElement,
				prevEl: this.prevElement,
			},
			pagination: {
				el: this.paginationElement,
				type: 'fraction',
				clickable: true,
			},
			breakpoints: {
				[breakpoints.tablet]: {
				},
			},
			on: {
				init: () => {
					window.dispatchEvent(this.eventName);
				},
			},
		});
	}
}
