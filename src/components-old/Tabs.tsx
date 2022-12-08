import {createMemo, createSignal, For, JSX, onCleanup, useContext} from 'solid-js';
import {css} from 'solid-styled-components';
import {getNeumorphColors, getNeumorphSizes, getNeumorphShadows} from '../neumorphism/element';
import {SizeObserver} from './SizeObserver';

export function TabSelector(props: {titles: JSX.Element[]; index: number; onChange(index: number): void}): JSX.Element {
	const [titleLocations, setTitleLocations] = createSignal<
		Record<
			number,
			{
				left: number;
				top: number;
				width: number;
				height: number;
			}
		>
	>([]);

	const resizeObs = new ResizeObserver((e) => {
		setTitleLocations((prev) => {
			const next = {...prev};
			e.forEach((entry) => {
				next[Number(entry.target.getAttribute('data-index'))] = {
					top: (entry.target as HTMLElement).offsetTop,
					left: (entry.target as HTMLElement).offsetLeft,
					width: (entry.target as HTMLElement).offsetWidth,
					height: (entry.target as HTMLElement).offsetHeight,
				};
			});
			return next;
		});
	});
	onCleanup(() => {
		resizeObs?.disconnect();
	});

	const surroundingColor = () => '#5c3d3d';

	const tabSelectorClass = createMemo(() => {
		const colors = getNeumorphColors(surroundingColor());
		const sizes = getNeumorphSizes();
		const {boxShadowIn, boxShadowOut} = getNeumorphShadows(colors, sizes);

		return css({
			'&': {
				background: surroundingColor(),
				boxShadow: boxShadowOut,
			},
		});
	});
	const colors = getNeumorphColors(surroundingColor());
	const sizes = getNeumorphSizes();
	const {boxShadowIn, boxShadowOut} = getNeumorphShadows(colors, sizes);
	const tabButtonClass = createMemo(() => {
		const colors = getNeumorphColors(surroundingColor());
		const sizes = getNeumorphSizes();
		const {boxShadowIn, boxShadowOut} = getNeumorphShadows(colors, sizes);

		return css({
			'&': {
				//background: surroundingColor(),
				padding: `${sizes.shadowSpacing.vertical}px ${sizes.shadowSpacing.horizontal}px`,
				outline: 'none',
			},
			'&:focus-visible': {
				//outline: `2px solid ${colors.outline}`,
				boxShadow: `0px -1px 0px 1px ${colors.outline}`,
			},
		});
	});
	return (
		<div class={`relative flex flex-row`}>
			<div
				class={`transition-[left,width] z-10 inset-0 absolute rounded-t-xl overflow-hidden ${tabSelectorClass()}`}
				style={{
					height: `${titleLocations()[props.index]?.height ?? 0}px`,
					width: `${titleLocations()[props.index]?.width ?? 0}px`,
					left: `${titleLocations()[props.index]?.left ?? 0}px`,
					top: `${titleLocations()[props.index]?.top ?? 0}px`,
				}}
			></div>
			<div class="flex flex-row content-between relative">
				<div
					class={`absolute inset-0 rounded-t-lg ${css({
						boxShadow: boxShadowIn,
					})}`}
				></div>
				<div class={`relative flex flex-row z-20`}>
					<For each={props.titles}>
						{(item, i) => (
							<button
								data-index={i()}
								ref={(ref) => {
									resizeObs.observe(ref);
								}}
								onClick={() => {
									props.onChange(i());
								}}
								class={`rounded-t-xl overflow-hidden ${tabButtonClass()}`}
							>
								{item}
							</button>
						)}
					</For>
				</div>
			</div>
		</div>
	);
}

export function Tabs(props: {
	tabs: Array<{
		title: JSX.Element;
		content: JSX.Element;
	}>;
	round?: boolean;
}): JSX.Element {
	const surroundingColor = () => '#5c3d3d';
	const neumorphSizes = getNeumorphSizes();
	const wrapperClass = createMemo(() => {
		const colors = getNeumorphColors(surroundingColor());
		const sizes = getNeumorphSizes();
		const {boxShadowIn, boxShadowOut} = getNeumorphShadows(colors, sizes);

		return css({
			'&': {
				padding: '2rem',
				//background: surroundingColor(),
			},
			'& > *': {
				padding: '2rem',
				//background: surroundingColor(),
				outline: 'none',
				//boxShadow: boxShadowIn,
			},
			'& > *:focus-visible': {
				outline: `2px solid ${colors.outline}`,
			},
		});
	});

	const tabClass = createMemo(() => {
		const colors = getNeumorphColors(surroundingColor());
		const sizes = getNeumorphSizes();
		const {boxShadowIn, boxShadowOut} = getNeumorphShadows(colors, sizes);

		return css({
			'&': {
				//padding: `${Math.max(sizes.horizontalOffset, sizes.verticalOffset)}px`,
				//background: surroundingColor(),
			},
			'& > *': {
				paddingTop: `${sizes.shadowSpacing.vertical}px`,
				paddingBottom: `${sizes.shadowSpacing.vertical}px`,
				//background: surroundingColor(),
				outline: 'none',
				boxShadow: boxShadowOut,
			},
			'& > *:focus-visible': {
				outline: `2px solid ${colors.outline}`,
			},
		});
	});

	const [selectedIndex, setSelectedIndex] = createSignal(0);
	const [heights, setHeights] = createSignal<Record<number, number>>({});

	return (
		<div class={`${wrapperClass()} ${props.round ?? false ? 'rounded-full' : 'rounded-md'}`}>
			<div
				class="relative z-0 transition-[box-shadow,opacity] duration-100 overflow-hidden block"
				classList={{
					'rounded-full': props.round ?? false,
					'rounded-md': !props.round,
					active: true,
				}}
				style={{
					color: 'white',
				}}
			>
				<TabSelector
					titles={props.tabs.map((x) => x.title)}
					index={selectedIndex()}
					onChange={(i) => setSelectedIndex(i)}
				/>
				<div class="relative">
					<div
						class="left-0 z-20 right-0 top-0 absolute overflow-hidden transition-[border-radius]"
						classList={{
							'rounded-tl-lg': selectedIndex() > 0,
							'rounded-tr-lg': selectedIndex() < props.tabs.length - 1,
						}}
						style={{
							background: surroundingColor(),
							height: `${neumorphSizes.shadowSpacing.vertical}px`,
						}}
					></div>
					<div class={`${tabClass()} relative z-0`}>
						<div class="rounded-lg overflow-hidden">
							<div
								class="relative w-full overflow-hidden"
								style={{
									height: `${Object.values(heights()).reduce((max, cur) => (max > cur ? max : cur), 0)}px`,
								}}
							>
								<For each={props.tabs}>
									{(item, i) => (
										<SizeObserver
											onChange={({height}) =>
												setHeights((prev) => {
													const next = {...prev};
													next[i()] = height;
													return next;
												})
											}
										>
											{(tabProps) => (
												<div
													ref={tabProps.ref}
													class="absolute w-full top-0 transition-opacity px-4"
													style={{
														opacity: `${i() === selectedIndex() ? 1 : 0}`,
														//transform: `scale()`,
													}}
												>
													{item.content}
												</div>
											)}
										</SizeObserver>
									)}
								</For>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	);
}
