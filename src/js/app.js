import './../style/app.scss';

import './polyfill';

import './async-img';
import './wheel-slider';
import './expandable';
import './element-scrollY';
import './timeline';

import axios from 'axios';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Fly-in
document.addEventListener('DOMContentLoaded', () => {
	[...document.querySelectorAll('[data-reveal]')].forEach((element) => {
		element.style.transition = "none";
		element.setAttribute('data-transition', 'out');
	});
});
window.addEventListener('load', () => {
	function handler() {
		[...document.querySelectorAll('[data-reveal]')].forEach((element) => {
			element.style.transition = "";
			const yValueTop = elementScrollY(element);
			const yValueBottom = yValueTop + element.offsetHeight;
			if (
				yValueBottom < window.scrollY + .01 * window.innerHeight
				|| yValueTop > window.scrollY + (1 - 0.05) * window.innerHeight
			) {
				element.setAttribute('data-transition', 'out');
			} else {
				element.setAttribute('data-transition', 'in');
			}
		});
	}
	window.addEventListener('scroll', handler);
	setTimeout(handler, 1);
});

// Navigation menu highlighting
document.addEventListener('DOMContentLoaded', () => {
	[...document.querySelectorAll('.main-nav')].forEach((nav) => {
		/** @type HTMLAnchorElement[] */
		const anchors = [...nav.querySelectorAll('.tab-item:not(.language-switch-item) a')];
		const anchorIndex = anchors.findIndex((/** HTMLAnchorElement */a) => a.pathname === location.pathname);
		if (anchorIndex !== -1) {
			const a = anchors[anchorIndex];
			a.classList.add('active');
			a.parentElement.classList.add('active');
			a.classList.add('tooltip');
			a.setAttribute('data-tooltip', a.parentElement.parentElement.getAttribute('data-tooltip'));
		}
	});
});

// Navigation menu scroll behaviour
document.addEventListener('DOMContentLoaded', () => {
	const navTop = document.querySelector('.main-nav');
	const navBottom = document.querySelector('.main-nav.bottom');
	const bottomSpacer = document.querySelector('.mobile-bottom-menu-spacer');
	function setNavPosition() {
		const scroll = window.scrollY - navTop.offsetTop;
		navBottom.style.bottom = Math.min(-navTop.offsetHeight + scroll, 0) + 'px';
		bottomSpacer.style.height = navTop.offsetHeight + 'px';
	}

	setNavPosition();

	window.addEventListener('scroll', setNavPosition);
});

// form
document.addEventListener('DOMContentLoaded', () => {
	[...document.querySelectorAll('.form-contact')].forEach(form => {
		form.addEventListener('submit', async (e) => {
			e.preventDefault();
			form.querySelector('[type="submit"]').classList.add('disabled', 'loading');
			[...form.querySelectorAll('.toast-error')].forEach((node) => node.parentElement.removeChild(node));
			const inputs = [...form.querySelectorAll('input[name],textarea[name],select[name]')];
			const data = inputs.reduce((acc, cur) => {
				acc[cur.name] = String(cur.value || '').trim();
				return acc;
			}, {});
			console.log(inputs);
			console.log(data);
			try {
				await axios.post(form.action === "http://localhost:5000/api/contact" ? "http://localhost:3000/api/contact" : form.action, data);
				setTimeout(() => {
					window.location.href = `/${data.lang}/contacts-tp.html`;
				}, 1);
			} catch (err) {
				const toastDiv = document.createElement('div');
				toastDiv.classList.add('toast', 'toast-error');
				toastDiv.style.margin = '0 auto';
				toastDiv.style.textAlign = 'center';
				toastDiv.style.maxWidth = '600px';
				if (data.lang === 'en') {
					toastDiv.innerHTML = "There was an error during the request, please try again later";
				} else {
					toastDiv.innerHTML = 'Non è al momento possibile registrare il contatto, si prega di riprovare più tardi';
				}
				form.appendChild(toastDiv);
				console.error(err);
			}
			form.querySelector('[type="submit"]').classList.remove('disabled', 'loading');
		});
	});
});

// copyable content
document.addEventListener('DOMContentLoaded', () => {
	[...document.querySelectorAll('[data-copy]')].forEach(element => {
		element.setAttribute('data-tooltip', element.getAttribute('data-tooltip-hover'));
		element.addEventListener('click', function () {
			const content = element.getAttribute('data-copy');
			const input = document.createElement('input');
			input.value = content.split('').map(x => x.charCodeAt(0)).map(x => String.fromCharCode(x ^ 8)).join('');
			input.style.position = 'absolute';
			input.style.opacity = '0';
			document.body.appendChild(input);
			input.select();
			input.setSelectionRange(0, input.value.length);
			document.execCommand('copy');
			document.body.removeChild(input);
			element.setAttribute('data-tooltip', element.getAttribute('data-tooltip-copied'));
		});
		element.addEventListener('mouseout', () => setTimeout(() => element.setAttribute('data-tooltip', element.getAttribute('data-tooltip-hover')), 200));
	});
});

// Adjust first-scroll height
document.addEventListener('DOMContentLoaded', () => {
	const firstScroll = document.querySelector('.first-scroll-height');
	if (firstScroll) {
		function firstScrollHeight() {
			firstScroll.style.minHeight = window.innerHeight - document.querySelector('.mobile-menu-wrapper').offsetHeight + 'px';
		}

		firstScrollHeight();
		let oldWidth = window.innerWidth;
		window.addEventListener('resize', () => {
			if (oldWidth !== window.innerWidth) {
				firstScrollHeight();
				oldWidth = window.innerWidth;
			} // else -> fake resize in Safari/Chrome mobile
		});
	}
});


// Language switch
document.addEventListener('DOMContentLoaded', () => {
	[...document.querySelectorAll('.language-switch')].forEach(switchElement => {
		const enLink = switchElement.querySelector('[data-lang="en"]');
		const itLink = switchElement.querySelector('[data-lang="it"]');
		const checkbox = switchElement.querySelector('input');

		function changeLanguage(e) {
			e.preventDefault();
			checkbox.disabled = true;
			if (checkbox.checked) {
				setTimeout(() => {
					location.href = enLink.href;
					switchElement.classList.add('loading');
					switchElement.classList.add('left');
				}, 200);
			} else {
				setTimeout(() => {
					location.href = itLink.href;
					switchElement.classList.add('loading');
					switchElement.classList.add('right');
				}, 200);
			}
		}

		checkbox.addEventListener('change', changeLanguage);
		itLink.addEventListener('click', changeLanguage);
		enLink.addEventListener('click', changeLanguage);
	});
});
