import {defineConfig} from 'astro/config';
import tailwind from '@astrojs/tailwind';

import sitemap from '@astrojs/sitemap';

// https://astro.build/config
export default defineConfig({
	site: 'https://www.executable.it',
	integrations: [
		tailwind(),
		sitemap({
			serialize(item) {
				if (/about-me|privacy|projects|contacts/.test(item.url)) {
					return undefined;
				}
				return item;
			},
		}),
	],
	trailingSlash: 'never',
});
