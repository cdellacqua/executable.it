import type {JSX} from 'solid-js/jsx-runtime';
import {Tippy} from '../../Tippy';

export function ProjectTooltip(props: {img: string}): JSX.Element {
	return (
		<Tippy
			tooltip={
				<div class="rounded-xl shadow-xl overflow-hidden">
					<img src={props.img} />
				</div>
			}
			trigger={'click'}
		>
			<button type="button">
				<i class="fa-solid fa-magnifying-glass text-2xl text-gray-400 hover:text-gray-500 transition-colors" />
			</button>
		</Tippy>
	);
}
