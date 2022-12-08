import type {JSX} from 'solid-js/jsx-runtime';
import tippy, {Instance as TippyInstance, Props as TippyProps} from 'tippy.js';
import {render} from 'solid-js/web';
import {createEffect, onCleanup} from 'solid-js';
import 'tippy.js/animations/scale-subtle.css';

export function Tippy(props: {
	children: JSX.Element;
	tooltip: JSX.Element;
	placement?: 'top' | 'bottom';
	trigger?: 'click';
	onClick?: JSX.IntrinsicElements['button']['onClick'];
}): JSX.Element {
	let childrenRef: HTMLDivElement | undefined;
	let tippyInstance: TippyInstance<TippyProps> | undefined;
	createEffect(() => {
		const tooltipFragment = document.createDocumentFragment();
		render(() => props.tooltip, tooltipFragment);
		if (childrenRef) {
			if (tippyInstance) {
				tippyInstance.setContent(tooltipFragment);
			} else {
				tippyInstance = tippy(childrenRef, {
					content: tooltipFragment,
					animation: 'scale-subtle',
					placement: props.placement ?? 'top',
					trigger: props.trigger,
					interactive: true,
				});
			}
		}
	});
	onCleanup(() => {
		tippyInstance?.destroy();
	});
	return (
		<>
			<div ref={childrenRef}>{props.children}</div>
		</>
	);
}
