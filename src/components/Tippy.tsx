import type {JSX} from 'solid-js/jsx-runtime';
import tippy, {Instance as TippyInstance, Props as TippyProps} from 'tippy.js';
import {createEffect, createSignal, onCleanup, onMount} from 'solid-js';
import 'tippy.js/animations/scale-subtle.css';
import type {MountableElement} from 'solid-js/web';

export function Tippy(props: {
	children: JSX.Element;
	tooltip: JSX.Element;
	placement?: 'top' | 'bottom';
	trigger?: 'click';
	onClick?: JSX.IntrinsicElements['button']['onClick'];
}): JSX.Element {
	let childrenRef: HTMLDivElement | undefined;
	let tippyInstance: TippyInstance<TippyProps> | undefined;
	const [renderWrapper, setRenderWrapper] = createSignal<null | {
		render: (code: () => JSX.Element, element: MountableElement) => void;
	}>(null);
	onMount(() => {
		import('solid-js/web').then(({render}) => setRenderWrapper({render})).catch(console.warn);
	});
	createEffect(() => {
		const render = renderWrapper()?.render;
		if (!render || !childrenRef) {
			return;
		}
		const tooltipFragment = document.createDocumentFragment();
		render(() => props.tooltip, tooltipFragment);
		if (tippyInstance) {
			tippyInstance.setContent(tooltipFragment);
		} else {
			tippyInstance = tippy(childrenRef, {
				content: tooltipFragment,
				animation: 'scale-subtle',
				placement: props.placement ?? 'top',
				trigger: props.trigger,
				interactive: true,
				appendTo: document.body,
			});
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
