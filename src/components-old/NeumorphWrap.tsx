import {createMemo, useContext} from 'solid-js';
import {Dynamic} from 'solid-js/web';
import type {JSX} from 'solid-js/jsx-runtime';
import {css} from 'solid-styled-components';
import {getNeumorphColors, getNeumorphShadows, getNeumorphSizes} from '../neumorphism/element';

export function NeumorphWrap(props: {
	component: keyof JSX.IntrinsicElements;
	active?: boolean | 'auto';
	children: JSX.Element;
	round?: boolean;
}): JSX.Element {
	const surroundingColor = () => '#5c3d3d';

	const wrapperClass = createMemo(() => {
		const colors = getNeumorphColors(surroundingColor());
		const sizes = getNeumorphSizes();
		const {boxShadowIn, boxShadowOut} = getNeumorphShadows(colors, sizes);

		return css({
			'&': {
				padding: `${sizes.shadowSpacing.vertical}px ${sizes.shadowSpacing.horizontal}px`,
				background: surroundingColor(),
			},
			'& > *': {
				padding: `${sizes.shadowSpacing.vertical}px ${sizes.shadowSpacing.horizontal}px`,
				background: surroundingColor(),
				outline: 'none',
			},
			'& > *:focus-visible': {
				outline: `2px solid ${colors.outline}`,
			},
			'& > *:not(:active)':
				props.active === 'auto'
					? {
							boxShadow: boxShadowOut,
					  }
					: {},
			'& > *:not(.active)': {
				boxShadow: boxShadowOut,
			},
			'& > *:active':
				props.active === 'auto'
					? {
							boxShadow: boxShadowIn,
					  }
					: {},
			'& > *.active': {
				boxShadow: boxShadowIn,
			},
			'& > *:not(:active) > .children-container':
				props.active === 'auto'
					? {
							transform: 'translate(0px,0px)',
					  }
					: {},
			'& > *:not(.active) > .children-container': {
				transform: 'translate(0px,0px)',
			},
			'& > *:active > .children-container':
				props.active === 'auto'
					? {
							transform: 'translate(2px,2px)',
					  }
					: {},
			'& > *.active > .children-container': {
				transform: 'translate(2px,2px)',
			},
		});
	});

	return (
		<div class={`${wrapperClass()} ${props.round ?? false ? 'rounded-full' : 'rounded-md'}`}>
			<Dynamic
				component={props.component}
				class="relative transition-[box-shadow,opacity] duration-100 overflow-hidden block"
				classList={{
					'rounded-full': props.round ?? false,
					'rounded-md': !props.round,
					active: props.active === true,
				}}
				style={{
					color: 'white',
				}}
			>
				<div class="children-container relative z-0 block transition-transform duration-100">{props.children}</div>
			</Dynamic>
		</div>
	);
}
