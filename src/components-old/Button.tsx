import type {JSX} from 'solid-js/jsx-runtime';
import {NeumorphWrap} from './NeumorphWrap';

export function Button(props: {
	children: JSX.Element;
	round?: boolean;
	onClick?: JSX.IntrinsicElements['button']['onClick'];
}): JSX.Element {
	return (
		<NeumorphWrap active={'auto'} round={props.round} component="button">
			{props.children}
		</NeumorphWrap>
	);
}

/*const [size, setSize] = createSignal<null | Rectangle>(null);

	const resizeObs = new ResizeObserver((entries) => {
		const entry = entries[0];
		if (!entry) {
			return;
		}
		setSize({width: entry.contentRect.width, height: entry.contentRect.height});
	});

	const wrapperClass = createMemo(() => {
		const currentSize = size();
		if (!currentSize) {
			return css({});
		}
		const elementStyles = generateElementStyles(currentSize, props.surroundingColor);
		return css({
			'&': {
				padding: `${elementStyles.boxShadowAddedSize.height / 2}px ${
					elementStyles.boxShadowAddedSize.width / 2
				}px`,
				background: props.surroundingColor,
			},
			'&>button': {
				padding: `${elementStyles.boxShadowAddedSize.height / 2}px ${
					elementStyles.boxShadowAddedSize.width / 2
				}px`,
			},
			'& > button:not(:active), & > button:not(.active)': elementStyles.released,
			'& > button:not(:active) > span, & > button:not(.active) > span': {
				transform: 'translate(0px,0px)',
			},
			'& > button:active, & > button.active': elementStyles.pressed,
			'& > button:active > span, & > button.active > span': {
				transform: 'translate(1px,1px)',
			},
		});
	});

	return (
		<div class={wrapperClass()}>
			<button
				onClick={props.onClick}
				ref={(ref) => {
					resizeObs.disconnect();
					resizeObs.observe(ref);
				}}
				type="button"
				class="transition-[box-shadow,opacity] whitespace-nowrap duration-100 overflow-hidden"
				classList={{
					'rounded-full': props.round ?? false,
					'rounded-md': !props.round,
					'opacity-0': size() === null,
					'opacity-100': size() !== null,
					active: props.active,
				}}
				style={{
					color: 'white',
				}}
			>
				<span class="block transition-transform duration-100">{props.children}</span>
			</button>
		</div>
	);*/
