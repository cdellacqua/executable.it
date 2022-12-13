import {sleep} from '@cdellacqua/sleep';
import {useReadonlyStore} from '@universal-stores/solid-adapter';
import {makeSpringStore} from '@universal-stores/spring';
import {createEffect, createMemo, createSignal} from 'solid-js';
import type {JSX} from 'solid-js/jsx-runtime';
import {useTranslation} from '../../../lib/i18n';

type AnimatedSpanReveal = 'bottom' | 'left' | 'right';

class ValidationError extends Error {
	constructor(msg?: string) {
		super(msg);
	}
}

function AnimatedSpan(
	props: {
		show: boolean;
		children: JSX.Element;
		class?: string;
	} & (
		| {
				reveal: AnimatedSpanReveal;
				transform?: undefined;
		  }
		| {
				reveal?: undefined;
				transform: (show: boolean) => string;
		  }
	),
) {
	const translateFns: Record<AnimatedSpanReveal, string> = {
		left: 'translateX',
		right: 'translateX',
		bottom: 'translateY',
	};
	const translateOffsets: Record<AnimatedSpanReveal, {hide: string; show: string}> = {
		left: {
			show: '0%',
			hide: '20%',
		},
		right: {
			show: '0%',
			hide: '-20%',
		},
		bottom: {
			show: '100%',
			hide: '80%',
		},
	};

	const transform = createMemo(() =>
		props.transform
			? props.transform(props.show)
			: `${translateFns[props.reveal]}(${translateOffsets[props.reveal][props.show ? 'show' : 'hide']})`,
	);

	return (
		<span
			class={`absolute inline-block will-change-transform transition-[transform,opacity] ${props.class ?? ''}`}
			style={`transform: ${transform()}; opacity: ${props.show ? 1 : 0}`}
		>
			{props.children}
		</span>
	);
}

function LabelWithError<TErrors extends Partial<Record<string, string | undefined>>>(props: {
	fieldName: keyof TErrors;
	content: string | JSX.Element;
	validationErrors: TErrors;
	reveal?: 'left' | 'bottom';
}) {
	const [cachedError, setCachedError] = createSignal<string | undefined>(undefined);
	createEffect(() => {
		if (props.validationErrors[props.fieldName]) {
			setCachedError(() => props.validationErrors[props.fieldName]);
		}
	});
	return (
		<label for={props.fieldName as string} class="inline-block relative">
			<span class="relative z-10">{props.content}</span>
			<AnimatedSpan
				class={`z-0 ${(props.reveal ?? 'left') === 'left' ? 'right-1' : 'left-0'}`}
				show={Boolean(props.validationErrors[props.fieldName])}
				reveal={props.reveal ?? 'left'}
			>
				<span class="text-red-400">{cachedError()}</span>
			</AnimatedSpan>
		</label>
	);
}

export function ContactForm(props: {lang: 'it' | 'en'; onSuccess?(): void}): JSX.Element {
	const t = useTranslation(props.lang);

	const [messageLength, setMessageLength] = createSignal(0);
	const tremble$ = makeSpringStore(0, {
		stiffness: 2000,
		damping: 20,
	});
	const tremble = useReadonlyStore(tremble$);
	const [formState, setFormState] = createSignal<'initial' | 'submitting' | 'success' | 'error'>('initial');
	const [apiError, setApiError] = createSignal(false);
	const apiErrorText = t(
		"Al momento non è possibile raccogliere il contatto, ma puoi comunque contattarmi all'email sotto indicata!",
	);
	const messageConstraints = {
		maxLength: 50,
	};

	const validations = {
		firstName: (x: string) => (x.length > 0 ? undefined : t('Campo obbligatorio')),
		lastName: (x: string) => (x.length > 0 ? undefined : t('Campo obbligatorio')),
		email: (x: string) => (x.length > 0 ? undefined : t('Campo obbligatorio')),
		phone: () => undefined,
		message: (x: string) =>
			x.length <= messageConstraints.maxLength
				? undefined
				: t('Max :count caratteri', {count: messageConstraints.maxLength}),
		privacy: (x: string) => (x === 'true' ? undefined : t('Consenso necessario')),
	};

	let formRef: HTMLFormElement | undefined;

	const [validationErrors, setValidationErrors] = createSignal(
		{} as Partial<Record<keyof typeof validations, string | undefined>>,
	);

	const hasValidationErrors = (errors: ReturnType<typeof validationErrors>) =>
		Array.from(Object.values(errors)).some((err) => Boolean(err));

	let clearFormStateTimeout: ReturnType<typeof setTimeout> | undefined;
	async function handleSubmit(e: Event) {
		if (!formRef) {
			console.warn('missing form ref');
			return;
		}
		if (clearFormStateTimeout !== undefined) {
			clearTimeout(clearFormStateTimeout);
			clearFormStateTimeout = undefined;
		}
		if (formState() === 'submitting') {
			return;
		}
		try {
			e.preventDefault();
			setApiError(false);
			const newValidationErrors = {} as ReturnType<typeof validationErrors>;
			for (const key in validations) {
				const inputElement = formRef.querySelector(`[name="${key}"]`) as HTMLInputElement | HTMLTextAreaElement;
				newValidationErrors[key as keyof typeof validations] = validations[key as keyof typeof validations](
					inputElement.type !== 'checkbox' ? inputElement.value : String((inputElement as {checked: boolean}).checked),
				);
			}
			setValidationErrors(newValidationErrors);
			if (hasValidationErrors(newValidationErrors)) {
				(async () => {
					tremble$.target$.set(0);
					await tremble$.skip();
					await sleep(100);
					tremble$.target$.set(10);
					await tremble$.skip();
					tremble$.target$.set(0);
					await tremble$.idle();
				})().catch(console.warn);
				throw new ValidationError();
			}
			setFormState('submitting');
			// TODO: actually submit data.
			await sleep(1000).then(() => Promise.reject('ops'));
			setFormState('success');
			props.onSuccess?.();
			formRef.reset();
		} catch (err) {
			setFormState('error');
			if (!(err instanceof ValidationError)) {
				setApiError(true);
			}
		} finally {
			clearFormStateTimeout = setTimeout(() => {
				setFormState('initial');
				clearFormStateTimeout = undefined;
			}, 1000);
		}
	}

	const onFocusResetError = (e: Event) => {
		if (e.currentTarget && 'name' in e.currentTarget) {
			const fieldName = (e.currentTarget as {name: keyof ReturnType<typeof validationErrors>}).name;
			setValidationErrors((prev) => ({...prev, [fieldName]: undefined}));
		}
	};

	return (
		<form
			ref={formRef}
			noValidate
			class="block"
			onSubmit={(e) => {
				handleSubmit(e).catch(console.warn);
			}}
			action="/api/contact"
			method="post"
		>
			<noscript>{t('È necessario abilitare JavaScript per utilizzare questo form')}</noscript>

			<input type="hidden" name="lang" value={props.lang} />
			<div class="form-group">
				<LabelWithError fieldName="firstName" content={t('Nome')} validationErrors={validationErrors()} />
				<input onFocus={onFocusResetError} id="firstName" type="text" name="firstName" autocomplete="given-name" />
			</div>
			<div class="form-group">
				<LabelWithError fieldName="lastName" content={t('Cognome')} validationErrors={validationErrors()} />
				<input onFocus={onFocusResetError} id="lastName" type="text" name="lastName" autocomplete="family-name" />
			</div>
			<div class="form-group">
				<LabelWithError fieldName="email" content={t('Email')} validationErrors={validationErrors()} />
				<input onFocus={onFocusResetError} id="email" type="email" name="email" autocomplete="email" />
			</div>
			<div class="form-group">
				<LabelWithError fieldName="phone" content={t('Telefono')} validationErrors={validationErrors()} />
				<input onFocus={onFocusResetError} id="phone" type="tel" name="phone" autocomplete="tel" />
			</div>
			<div class="form-group">
				<LabelWithError fieldName="message" content={t('Messaggio')} validationErrors={validationErrors()} />
				<textarea
					onFocus={onFocusResetError}
					onInput={(e) => setMessageLength(e.currentTarget.value.length)}
					class="resize-y max-h-96"
					placeholder={t(
						"In quest'area puoi illustrarmi brevemente ciò di cui hai bisogno, sarà mia cura ricontattarti appena possibile per poter approfondire il progetto che vuoi realizzare",
					)}
					rows="8"
					name="message"
				/>
				<div
					class="transition-colors mt-1 relative z-0"
					classList={{
						'text-red-500': messageLength() > messageConstraints.maxLength,
					}}
				>
					<AnimatedSpan show={messageLength() > 0} reveal="left" class="z-10 right-0">
						<AnimatedSpan
							show={messageLength() > messageConstraints.maxLength}
							reveal="left"
							class="z-0 mr-1 right-full"
						>
							<i class="fa-solid fa-circle-exclamation"></i>
						</AnimatedSpan>
						<span>
							{messageLength()}/{messageConstraints.maxLength}
						</span>
					</AnimatedSpan>
				</div>
			</div>
			<div class="mt-5">
				<LabelWithError
					content={
						<>
							<input
								onChange={onFocusResetError}
								id="privacy"
								type="checkbox"
								name="privacy"
								value="true"
								class="mr-1 ml-1 scale-125"
							/>{' '}
							{t('Acconsento al trattamento dei dati personali per la')}{' '}
							<a class="underline text-sky-600" href={`/${props.lang}/privacy`} title="Privacy Policy" target="_blank">
								{t('finalità di contatto.')}
							</a>
						</>
					}
					fieldName="privacy"
					validationErrors={validationErrors()}
					reveal="bottom"
				/>
			</div>
			<div class="text-right mt-2 relative z-10">
				<button
					disabled={formState() === 'submitting'}
					type="submit"
					style={`transform: translateX(${tremble()}px); padding-left: ${
						formState() === 'submitting' || formState() === 'error' ? '32px' : '16px'
					}; background-color: ${
						formState() === 'error' ? 'rgb(239 68 68)' : formState() === 'success' ? 'rgb(34 197 94)' : ''
					}`}
					class="px-4 py-2 inline-block will-change-transform transition-[padding-left,background-color] hover:bg-sky-500 bg-sky-400 disabled:bg-sky-400 text-white rounded-xl overflow-hidden font-title uppercase relative"
				>
					<AnimatedSpan show={formState() === 'submitting'} reveal="left" class="left-3 z-0">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon spin" viewBox="0 0 512 512">
							{/* <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --> */}
							<path d="M222.7 32.1c5 16.9-4.6 34.8-21.5 39.8C121.8 95.6 64 169.1 64 256c0 106 86 192 192 192s192-86 192-192c0-86.9-57.8-160.4-137.1-184.1c-16.9-5-26.6-22.9-21.5-39.8s22.9-26.6 39.8-21.5C434.9 42.1 512 140 512 256c0 141.4-114.6 256-256 256S0 397.4 0 256C0 140 77.1 42.1 182.9 10.6c16.9-5 34.8 4.6 39.8 21.5z" />
						</svg>
					</AnimatedSpan>
					<AnimatedSpan
						show={formState() === 'error'}
						reveal={formState() === 'submitting' ? 'right' : 'left'}
						class="left-3 z-0"
					>
						<i class="fa-regular fa-circle-xmark"></i>
					</AnimatedSpan>
					<AnimatedSpan
						class="top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-0"
						show={formState() === 'success'}
						transform={(show) => `translate(-50%,-50%) scale(${show ? 1 : 0});`}
					>
						<i class="fa-solid fa-circle-check"></i>{' '}
					</AnimatedSpan>
					<span
						class="tracking-wider will-change-transform transition-[transform,opacity] inline-block relative z-10"
						style={`transform: translateX(${
							formState() === 'initial' || formState() === 'success' ? 0 : 4
						}px); opacity: ${formState() === 'success' ? 0 : 1}`}
					>
						{t('Invia')}
					</span>
				</button>
			</div>
			<div class="relative z-0 pointer-events-none" classList={{'max-h-0': !apiError()}}>
				<AnimatedSpan
					transform={(show) => (show ? 'translateY(0%)' : 'translateY(100%)')}
					class="bottom-0 text-red-500"
					show={apiError()}
				>
					{apiErrorText}
				</AnimatedSpan>
				<div class="invisible pt-2">{apiErrorText}</div>
			</div>
		</form>
	);
}
