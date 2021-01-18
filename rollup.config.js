import scss from 'rollup-plugin-scss';
import postcss from 'postcss';
import livereload from 'rollup-plugin-livereload';
import replace from '@rollup/plugin-replace';
import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import { terser } from 'rollup-plugin-terser';
import babel from '@rollup/plugin-babel';
import nodePolyfills from 'rollup-plugin-node-polyfills';
import { join, basename, resolve as pathResolve } from 'path';
import fs from 'fs';
import pug from 'pug';
import translations from './src/translations/index.mjs';
import seo from './src/seo/index.mjs';

const dotenv = require('dotenv').config().parsed;

const production = process.env.NODE_ENV !== 'development';

function serve() {
	let server;

	function toExit() {
		if (server) server.kill(0);
	}

	return {
		writeBundle() {
			if (server) return;
			server = require('child_process').spawn('npm', ['run', 'serve', '--', '--dev'], {
				stdio: ['ignore', 'inherit', 'inherit'],
				shell: true,
			});

			process.on('SIGTERM', toExit);
			process.on('exit', toExit);
		},
	};
}

function pugPlugin(dir, outDir) {
	function* walk(dir) {
		for (const path of fs.readdirSync(dir)) {
			if (fs.statSync(join(dir, path)).isFile()) {
				yield join(dir, path);
			} else {
				yield* walk(join(dir, path));
			}
		}
	}
	
	const allFiles = [...walk(dir)].filter((entry) => entry.endsWith('.pug'));
	const pug2HtmlFiles = allFiles.filter((entry) => !basename(entry).startsWith('_'));
	return {
		load() {
			allFiles.forEach((file) => this.addWatchFile(pathResolve(file)));
		},
		writeBundle() {
			function generatePug(src, dst, lang) {
				console.log(dotenv);
				fs.writeFileSync(dst, pug.compileFile(src, {
					pretty: true,
					basedir: dir,
					debug: false,
					cache: false,
					compileDebug: false,
				})({
					...dotenv,
					lang,
					seo,
					basename: basename(src),
					basenameNoExt: basename(src).split('.').slice(0, -1).join('.'),
					self: src,
					__: function __(text, replace = {}) {
						let result = (translations[lang]?.[text] ?? text);
						Object.keys(replace)
							.sort((k1, k2) => -(k1.length - k2.length))
							.forEach((key) => {
								result = result
									.replace(new RegExp(`([^\\\\]):${key}`, 'g'), `$1${replace[key]}`)
									.replace(new RegExp(`^:${key}`, 'g'), `${replace[key]}`);
							});
						result = result.replace(/\\:/g, ':');
					
						return result;
					},
				}));
			}
			for (const entry of pug2HtmlFiles) {
				if (entry.includes('it-en')) {
					generatePug(
						entry,
						entry.replace('it-en', 'it').replace(dir, outDir).split('.').slice(0, -1).join('.') + '.html',
						'it'
					);
					generatePug(
						entry,
						entry.replace('it-en', 'en').replace(dir, outDir).split('.').slice(0, -1).join('.') + '.html',
						'en'
					);
				} else {
					generatePug(
						entry,
						entry.replace(dir, outDir).split('.').slice(0, -1).join('.') + '.html',
						'it'
					);
				}
			}
		},
	};
}


export default [{
	input: 'src/js/app.js',
	output: {
		file: 'public/js/app.js',
		format: 'iife',
	},
	plugins: [
		pugPlugin(join('src', 'pug'), 'public'),

		replace({
			'process.env': JSON.stringify({
				BUILD_VERSION: new Date().toISOString(),
			}),
		}),

		scss({
			outFile: 'public/css/app.css',
			output: 'public/css/app.css',
			outputStyle: production ? 'compressed' : undefined,
			failOnError: true,
			sourceMap: !production ? true : undefined,
			sourceMapEmbed: !production ? true : undefined,
			sourceMapRoot: !production ? `file://${process.cwd()}/build` : undefined,
			sass: require('sass'),
			processor: (css) => postcss([require('autoprefixer')])
				.process(css, { from: undefined })
				.then((result) => result.css),
			watch: ['src/style'],
		}),

		resolve({
			browser: true,
			preferBuiltins: true,
		}),
		commonjs({
			include: 'node_modules/**',
		}),

		nodePolyfills(),
		babel({
			extensions: ['.js', '.mjs', '.html', '.svelte'],
			babelHelpers: 'runtime',
			exclude: ['node_modules/@babel/**'],
			presets: [
				['@babel/preset-env', {
					targets: '> 0.25%, not dead',
				}],
			],
			plugins: [
				'@babel/plugin-syntax-dynamic-import',
				['@babel/plugin-transform-runtime', {
					useESModules: true,
				}],
			],
		}),

		// In dev mode, call `npm run start` once
		// the bundle has been generated
		!production && serve(),	

		// Watch the `public` directory and refresh the
		// browser on changes when not in production
		!production && livereload('public'),

		production && terser(),
	],
}];
