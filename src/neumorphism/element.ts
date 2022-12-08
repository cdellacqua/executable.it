import Color from 'color';

export type NeumorphSizes = {
	horizontalOffset: number;
	verticalOffset: number;
	blurRadius: number;
	shadowSpacing: {
		horizontal: number;
		vertical: number;
	};
};

export function getNeumorphSizes(): NeumorphSizes {
	return {
		horizontalOffset: 16 * 0.8,
		verticalOffset: 16 * 0.5,
		blurRadius: 16 * 0.8,
		shadowSpacing: {
			horizontal: 16 * 0.8 * 2,
			vertical: 16 * 0.5 * 2,
		},
	};
}

export type NeumorphColors = {
	lighter: string;
	light: string;
	base: string;
	dark: string;
	darker: string;
	outline: string;
};

export function getNeumorphColors(baseColor: string): NeumorphColors {
	return {
		lighter: Color(baseColor).lighten(0.1).toString(),
		light: Color(baseColor).lighten(0.05).toString(),
		base: baseColor,
		dark: Color(baseColor).darken(0.05).toString(),
		darker: Color(baseColor).darken(0.1).toString(),
		outline: Color(baseColor).darken(0.3).toString(),
	};
}

export function getNeumorphShadows(
	colors: NeumorphColors,
	{horizontalOffset, verticalOffset, blurRadius}: NeumorphSizes,
) {
	const boxShadowOutTopLeft = `-${horizontalOffset}px -${verticalOffset}px ${blurRadius}px ${colors.lighter}`;
	const boxShadowOutBottomRight = `${horizontalOffset}px ${verticalOffset}px ${blurRadius}px ${colors.darker}`;
	const boxShadowInBottomRight = `-${horizontalOffset}px -${verticalOffset}px ${blurRadius}px ${colors.lighter} inset`;
	const boxShadowInTopLeft = `${horizontalOffset}px ${verticalOffset}px ${blurRadius}px ${colors.darker} inset`;

	return {
		boxShadowOutTopLeft,
		boxShadowOutBottomRight,
		boxShadowInTopLeft,
		boxShadowInBottomRight,
		boxShadowOut: `${boxShadowOutBottomRight},${boxShadowOutTopLeft}, 0rem 0rem 0rem ${colors.darker} inset,0rem 0rem 0rem ${colors.lighter} inset`,
		boxShadowIn: `0rem 0rem 0rem ${colors.darker},0rem 0rem 0rem ${colors.lighter}, ${boxShadowInBottomRight},${boxShadowInTopLeft}`,
	};
}
