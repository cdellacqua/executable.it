import {useReadonlyStore} from '@universal-stores/solid-adapter';
import {makeSpringStore} from '@universal-stores/spring';
import {createEffect, createSignal} from 'solid-js';
import type {JSX} from 'solid-js/jsx-runtime';
import {useTranslation} from '../../../lib/i18n';
import {ContactForm} from './ContactForm';
import {SectionCard} from './SectionCard';

export function ContactFormSection(props: {lang: 'it' | 'en'}): JSX.Element {
	const [success, setSuccess] = createSignal(false);
	const t = useTranslation(props.lang);
	const plane$ = makeSpringStore(
		{
			x: -1000,
			y: 500,
			scale: 10,
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
					x: -1000,
					y: 500,
					scale: 10,
				});
			}, 150);
		} else {
			setTimeout(() => {
				plane$.target$.set({
					x: 0,
					y: 0,
					scale: 1,
				});
			}, 150);
		}
	});
	return (
		<section class="w-full flex items-center my-24 relative">
			<div class="relative w-full" style="perspective: 150vw">
				<SectionCard
					class={`transition-transform duration-500 ${success() ? 'pointer-events-none' : 'pointer-events-auto'}`}
					style={`${success() ? 'transform: rotateY(180deg)' : 'transform: rotateY(0deg)'}`}
				>
					<i class="fa-solid fa-address-book text-gray-200 opacity-85 text-[400px] absolute top-1/2 right-0 z-0 translate-x-1/2 -translate-y-1/2"></i>
					<div class="relative z-10">
						<h2 class="text-3xl mb-10 font-title">{t('Collaboriamo!')}</h2>
						<ContactForm lang={props.lang} onSuccess={() => setTimeout(() => setSuccess(true), 150)} />
					</div>
				</SectionCard>
				<SectionCard
					class={`inset-x-0 top-1/2 bg-green-600 transition-transform duration-500 overflow-hidden ${
						!success() ? 'pointer-events-none' : 'pointer-events-auto'
					}`}
					style={`position:absolute; background-color: rgb(34 197 94); ${
						!success() ? 'transform: translateY(-50%) rotateY(-180deg)' : 'transform: translateY(-50%) rotateY(0deg)'
					}`}
				>
					<div class="w-full relative z-0">
						<i
							class="fa-solid fa-paper-plane text-white origin-top-right text-6xl absolute top-0 right-0 z-10"
							style={`transform: translate(${plane().x}px, ${plane().y}px) scale(${plane().scale})`}
						></i>
						<div class="relative z-0 text-white">
							<h2 class="text-3xl mb-10 font-title">{t('Grazie!')}</h2>
							<p class="text-xl">{t('Cercherò di rispondere quanto prima al tuo messaggio, a presto!')}</p>
						</div>
						<div class="text-center w-full pt-12 relative z-20">
							<button
								class="inline-block text-white"
								title="Contattami di nuovo"
								onClick={() => {
									setSuccess(false);
								}}
								type="button"
							>
								<i class="fa-solid fa-rotate-right text-6xl hover:rotate-12 duration-300 transition-transform will-change-transform"></i>
							</button>
						</div>
					</div>
				</SectionCard>
			</div>
		</section>
	);
}
