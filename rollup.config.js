import scss from 'rollup-plugin-scss';
import postcss from 'postcss';
import livereload from 'rollup-plugin-livereload';
import replace from '@rollup/plugin-replace';
import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import { terser } from 'rollup-plugin-terser';
import babel from '@rollup/plugin-babel';
import nodePolyfills from 'rollup-plugin-node-polyfills';

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

export default [{
	input: 'src/js/app.js',
	output: {
		file: 'public/js/app.js',
		format: 'iife',
	},
	plugins: [
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
