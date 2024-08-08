import type {JSX} from 'solid-js/jsx-runtime';

export function SectionCard(props: {children?: JSX.Element; class?: string; style?: string}): JSX.Element {
	return (
		<div
			style={props.style}
			class={`w-11/12 md:w-10/12 max-w-3xl mx-auto py-6 px-6 md:py-10 md:px-10 bg-white border border-gray-300 rounded-xl relative overflow-hidden ${props.class}`}
		>
			{props.children}
		</div>
	);
}
