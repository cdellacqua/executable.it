import {useReadonlyStore} from '@universal-stores/solid-adapter';
import {makeSpringStore} from '@universal-stores/spring';
import {JSX, onMount} from 'solid-js';

export function Spaceship(): JSX.Element {
	let ref: HTMLDivElement | undefined;
	const spring$ = makeSpringStore(0, {
		stiffness: 20,
	});
	const spring = useReadonlyStore(spring$);
	onMount(() => {
		const currentRef = ref;
		if (!currentRef) {
			return;
		}
		(async () => {
			let canUseTilt = false;
			if (window.DeviceOrientationEvent && !window.matchMedia('(pointer: fine)').matches) {
				if (!('requestPermission' in window.DeviceOrientationEvent)) {
					canUseTilt = true;
				} else {
					await new Promise<void>((res) => {
						function handleTouch() {
							(async () => {
								canUseTilt = await (window.DeviceOrientationEvent as any).requestPermission().then(
									() => true,
									() => false,
								);
								res();
								window.removeEventListener('touchstart', handleTouch);
							})().catch(console.warn);
						}
						window.addEventListener('touchstart', handleTouch);
					});
				}
			}
			if (canUseTilt) {
				window.addEventListener('deviceorientation', (e) => {
					const gamma = e.gamma;
					if (!gamma) {
						return;
					}
					const phiDeg = gamma * 10;
					spring$.target$.update((currentDeg) => {
						const delta = (phiDeg - currentDeg) % 360;
						const deltaMin = Math.abs(delta) >= 180 ? -Math.sign(delta) * (360 - Math.abs(delta)) : delta;
						return currentDeg + deltaMin;
					});
				});
			} else {
				currentRef.addEventListener('mousemove', (e) => {
					const x = e.clientX - window.innerWidth / 2;
					const y = e.clientY - window.innerHeight / 2;

					const phiCur = Math.atan2(y, x) + Math.PI / 2;
					const phiDeg = (phiCur / Math.PI) * 180;
					spring$.target$.update((currentDeg) => {
						const delta = (phiDeg - currentDeg) % 360;
						const deltaMin = Math.abs(delta) >= 180 ? -Math.sign(delta) * (360 - Math.abs(delta)) : delta;
						return currentDeg + deltaMin;
					});
				});
			}
		})().catch(console.warn);
	});
	return (
		<div
			ref={ref}
			class="w-full h-full flex items-center justify-center"
			style={`animation: !shuttle 5s infinite alternate; animation-timing-function: ease-in-out; transform: rotate(${
				spring() / 10
			}deg)`}
		>
			{/* <img
				src="/assets/executable-transparent-black-alt.svg"
				class="min-w-full min-h-full max-w-full max-h-none -translate-x-1/2 -translate-y-1/2 absolute top-1/2 left-1/2 scale-75"
			/> */}
			<img
				alt="Executable Logo"
				src="/assets/executable-transparent-white-alt.svg"
				style="/* animation: fadein 5s; animation-delay: 0.5s; animation-fill-mode: both; animation-timing-function: cubic-bezier(0.13, 0.7, 0.15, 0.86); */"
				class="min-w-full min-h-full max-w-full max-h-none -translate-x-1/2 -translate-y-1/2 absolute top-1/2 left-1/2 scale-75"
			/>
		</div>
	);
}
