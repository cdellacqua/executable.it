import en from './en';

const translations: Record<'it' | 'en', Partial<Record<string, string>>> = {
	it: {},
	en,
};

const defaultLang = 'it';

export function useTranslation(lang: 'it' | 'en') {
	return function (text: string, replace: Record<string, string | number> = {}): string {
		const candidate = translations[lang]?.[text];
		if (candidate === undefined && lang !== defaultLang) {
			console.warn(`missing translation for string "${text}"`);
		}
		let result = candidate ?? text;
		Object.keys(replace)
			.sort((k1, k2) => -(k1.length - k2.length))
			.forEach((key) => {
				result = result
					.replace(new RegExp(`([^\\\\]):${key}`, 'g'), `$1${replace[key]}`)
					.replace(new RegExp(`^:${key}`, 'g'), `${replace[key]}`);
			});
		result = result.replace(/\\:/g, ':');

		return result;
	};
}

export const getTranslationStaticPaths = () => Promise.resolve([{params: {lang: 'it'}}, {params: {lang: 'en'}}]);
