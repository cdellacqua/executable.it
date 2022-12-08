import {JSX, onCleanup, Ref} from 'solid-js';
import type {Rectangle} from '../neumorphism/geometry';

export function SizeObserver(props: {
	onChange(size: Rectangle): void;
	children: (props: {ref: Ref<any>}) => JSX.Element;
}): JSX.Element {
	let resizeObs: ResizeObserver | undefined;

	onCleanup(() => {
		resizeObs?.disconnect();
		resizeObs = undefined;
	});

	return props.children({
		ref(val: HTMLElement) {
			resizeObs =
				resizeObs ??
				new ResizeObserver((e) => {
					const entry = e[0];
					if (entry) {
						props.onChange(entry.contentRect);
					}
				});
			resizeObs?.disconnect();
			resizeObs?.observe(val);
		},
	});
}
