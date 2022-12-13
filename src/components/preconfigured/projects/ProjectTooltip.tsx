import type {JSX} from 'solid-js/jsx-runtime';
import {useTranslation} from '../../../lib/i18n';
import {Tippy} from '../../Tippy';

export function ProjectTooltip(props: {img: string; lang: 'it' | 'en'}): JSX.Element {
	const t = useTranslation(props.lang);
	return (
		<Tippy
			tooltip={
				<div class="rounded-xl shadow-xl overflow-hidden">
					<img src={props.img} />
				</div>
			}
			trigger={'click'}
		>
			<button type="button" title={t('Mostra anteprima')}>
				<i class="fa-solid fa-magnifying-glass text-2xl text-gray-400 hover:text-gray-500 transition-colors" />
			</button>
		</Tippy>
	);
}
