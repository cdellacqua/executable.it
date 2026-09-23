import AxeBuilder from '@axe-core/playwright';
import { test, expect } from '@playwright/test';
import { HtmlValidate } from 'html-validate';

const routes = ['/it', '/en', '/it/privacy', '/en/privacy', '/it/missing-page', '/en/missing-page'] as const;

const htmlvalidate = new HtmlValidate({
	root: true,
	extends: ['html-validate:standard', 'html-validate:a11y'],
	rules: {
		'heading-level': 'error',
	},
});

function htmlFailures(report: { results: { filePath: string; messages: { line: number; column: number; ruleId: string; message: string }[] }[] }) {
	return report.results.flatMap((result) =>
		result.messages.map((message) => `${result.filePath}:${message.line}:${message.column} ${message.ruleId}: ${message.message}`),
	);
}

for (const path of routes) {
	test(`${path} matches the HTML content model`, async ({ request }) => {
		const response = await request.get(path);
		const html = await response.text();
		const report = await htmlvalidate.validateString(html, path);
		expect(htmlFailures(report), htmlFailures(report).join('\n')).toEqual([]);
	});

	test(`${path} has no WCAG A/AA axe violations`, async ({ page }) => {
		await page.goto(path);
		const results = await new AxeBuilder({ page })
			.withTags(['wcag2a', 'wcag2aa', 'wcag21aa', 'wcag22aa'])
			.analyze();
		const details = results.violations
			.map((violation) => `${violation.id}: ${violation.help}\n${violation.nodes.map((node) => `  ${node.target.join(' ')}`).join('\n')}`)
			.join('\n');
		expect(results.violations, details).toEqual([]);
	});
}
