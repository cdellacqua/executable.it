import {defineConfig} from 'astro/config';

import sitemap from '@astrojs/sitemap';

// https://astro.build/config
export default defineConfig({
	site: 'https://www.executable.it',
	integrations: [
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
	// Emit it.html instead of it/index.html so GitHub Pages serves /it without redirecting to /it/
	build: {
		format: 'file',
	},
});
