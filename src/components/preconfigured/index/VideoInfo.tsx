import type {JSX} from 'solid-js/jsx-runtime';
import {useTranslation} from '../../../lib/i18n';
import {Tippy} from '../../Tippy';

export function VideoInfo(props: {lang: 'it' | 'en'}): JSX.Element {
	const t = useTranslation(props.lang);
	return (
		<Tippy
			placement="top"
			trigger="click"
			tooltip={
				<div class="bg-white px-3 py-2 whitespace-nowrap">
					{t('Video di sfondo di')} <br />
					<a
						class="underline"
						rel="noreferrer noopener"
						href="https://pixabay.com/users/christianbodhi-9869182/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=video&amp;utm_content=69826"
					>
						Christian Bodhi
					</a>{' '}
					{t('da')}{' '}
					<a
						class="underline"
						rel="noreferrer noopener"
						href="https://pixabay.com//?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=video&amp;utm_content=69826"
					>
						Pixabay
					</a>
				</div>
			}
		>
			<button type="button">
				<i class="fa-solid fa-circle-info text-white hover:text-gray-200 transition-colors text-lg"></i>
			</button>
		</Tippy>
	);
}
