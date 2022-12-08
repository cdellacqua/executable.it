import {useReadonlyStore} from '@universal-stores/solid-adapter';
import {makeSpringStore} from '@universal-stores/spring';
import {createEffect, createSignal} from 'solid-js';
import type {JSX} from 'solid-js/jsx-runtime';
import {useTranslation} from '../../../lib/i18n';
import {ContactForm} from './ContactForm';
import {SectionCard} from './SectionCard';

export function ContactFormSection(props: {lang: 'it' | 'en'}): JSX.Element {
	const [success, setSuccess] = createSignal(true);
	const t = useTranslation(props.lang);
	const plane$ = makeSpringStore(
		{
			x: -100,
			y: 200,
		},
		{
			damping: 80,
			stiffness: 400,
		},
	);
	const plane = useReadonlyStore(plane$);

	createEffect(() => {
		if (!success()) {
			setTimeout(() => {
				plane$.target$.set({
					x: -100,
					y: 200,
				});
			}, 200);
		} else {
			setTimeout(() => {
				plane$.target$.set({
					x: -50,
					y: 0,
				});
			}, 200);
		}
	});
	return (
		<section class="min-h-screen w-full flex items-center py-12 relative">
			<div class="relative w-full" style="perspective: 150vw">
				<SectionCard
					class={`transition-transform duration-500 ${success() ? 'pointer-events-none' : 'pointer-events-auto'}`}
					style={`${success() ? 'transform: rotateY(180deg)' : 'transform: rotateY(0deg)'}`}
				>
					<i class="fa-solid fa-address-book text-gray-200 opacity-85 text-[400px] absolute top-1/2 right-0 z-0 translate-x-1/2 -translate-y-1/2"></i>
					<div class="relative z-10">
						<h2 class="text-3xl mb-10 font-title">{t('Collaboriamo!')}</h2>
						<ContactForm lang={props.lang} onSuccess={() => setSuccess(true)} />
					</div>
				</SectionCard>
				<SectionCard
					class={`inset-0 bg-green-600 transition-transform duration-500 overflow-hidden ${
						!success() ? 'pointer-events-none' : 'pointer-events-auto'
					}`}
					style={`position:absolute; background-color: rgb(34 197 94); ${
						!success() ? 'transform: rotateY(-180deg)' : 'transform: rotateY(0deg)'
					}`}
				>
					<i
						class="fa-solid fa-paper-plane text-gray-200 opacity-95 text-[400px] absolute bottom-20 left-1/2 z-0"
						style={`transform: translate(${plane().x}%, ${plane().y}%)`}
					></i>
					<div class="relative z-10 text-white">
						<h2 class="text-3xl mb-10 font-title">{t('Grazie!')}</h2>
						<p class="text-2xl">{t('Cercherò di rispondere quanto prima al tuo messaggio, a presto!')}</p>
					</div>
					<button
						class="inline-block right-9 bottom-10 absolute z-20 text-white"
						title="Contattami di nuovo"
						onClick={() => {
							setSuccess(false);
						}}
						type="button"
					>
						<i class="fa-solid fa-rotate-right text-6xl"></i>
					</button>
				</SectionCard>
			</div>
		</section>
	);
}
