import { test, expect, devices, type Page, type Locator } from '@playwright/test';

const ASCII_LINKS = [
	{ href: 'https://www.executable.it/', text: 'https://www.executable.it/' },
	{ href: 'mailto:carlo.dellacqua@executable.it', text: 'carlo.dellacqua@executable.it' },
	{ href: 'https://github.com/cdellacqua', text: 'https://github.com/cdellacqua' },
	{ href: 'https://linkedin.com/in/carlo-dell-acqua', text: 'linkedin.com/in/carlo-dell-acqua' },
] as const;

const resolutions = [
	// Playwright's iPhone 13 descriptor is 390×664 (Safari chrome). 390×844 is the full logical screen.
	{ name: 'iPhone 13', viewport: { width: 390, height: 844 } },
	{ name: 'iPhone 13 landscape', viewport: { width: 844, height: 390 } },
	{ name: 'Pixel 5', viewport: devices['Pixel 5'].viewport },
	{ name: 'Pixel 5 landscape', viewport: devices['Pixel 5 landscape'].viewport },
	{ name: 'iPad Mini', viewport: devices['iPad Mini'].viewport },
	{ name: 'iPad Mini landscape', viewport: devices['iPad Mini landscape'].viewport },
	{ name: 'Desktop Chrome', viewport: devices['Desktop Chrome'].viewport },
] as const;

async function openAsciiCard(page: Page) {
	await page.emulateMedia({ reducedMotion: 'reduce' });
	await page.goto('/it');
	await page.locator('[data-card-flip]').first().click();
	const rotator = page.locator('[data-card-rotator]');
	await expect(rotator).toHaveClass(/is-open/);
	await rotator.evaluate((el) =>
		Promise.all(el.getAnimations({ subtree: true }).map((animation) => animation.finished.catch(() => {}))),
	);
	return rotator;
}

async function hrefAtCenter(page: Page, link: Locator) {
	const box = await link.boundingBox();
	expect(box, 'link should occupy space on screen').toBeTruthy();
	expect(box!.width).toBeGreaterThan(20);
	expect(box!.height).toBeGreaterThan(4);
	return page.evaluate(
		({ x, y }) => {
			const el = document.elementFromPoint(x, y);
			return el?.closest('a.ascii-link')?.getAttribute('href') ?? el?.nodeName ?? null;
		},
		{ x: box!.x + box!.width / 2, y: box!.y + box!.height / 2 },
	);
}

test('viewport meta lets the layout fill the screen', async ({ page }) => {
	await page.goto('/it');
	await expect(page.locator('meta[name="viewport"]')).toHaveAttribute(
		'content',
		/width=device-width.*viewport-fit=cover/,
	);
});

test('magstripe stays above the iPhone unsafe bottom inset', async ({ page }) => {
	const insets = { top: 47, left: 0, bottom: 34, right: 0 };
	await page.setViewportSize({ width: 390, height: 844 });
	const session = await page.context().newCDPSession(page);
	await session.send('Emulation.setSafeAreaInsetsOverride', { insets });
	await page.goto('/it');

	await expect(page.locator('body')).toHaveCSS('padding-top', `${insets.top}px`);
	await expect(page.locator('body')).toHaveCSS('padding-bottom', `${insets.bottom}px`);

	const magstripe = page.locator('[data-magstripe]');
	const box = await magstripe.boundingBox();
	expect(box).toBeTruthy();
	expect(box!.y).toBeGreaterThanOrEqual(insets.top);
	expect(box!.y + box!.height).toBeLessThanOrEqual(844 - insets.bottom);
});

for (const resolution of resolutions) {
	test.describe(resolution.name, () => {
		test.use({ viewport: resolution.viewport });

		test('profile photo stays fully on screen', async ({ page }) => {
			await page.goto('/it');
			const photo = page.locator('.card-photo');
			await expect(photo).toBeVisible();

			const box = await photo.boundingBox();
			expect(box, 'profile photo should occupy space on screen').toBeTruthy();

			const viewport = page.viewportSize()!;
			expect(box!.x).toBeGreaterThanOrEqual(-1);
			expect(box!.y).toBeGreaterThanOrEqual(-1);
			expect(box!.x + box!.width).toBeLessThanOrEqual(viewport.width + 1);
			expect(box!.y + box!.height).toBeLessThanOrEqual(viewport.height + 1);
		});

		test('flipped ascii links stay on screen and receive clicks', async ({ page }) => {
			const rotator = await openAsciiCard(page);
			const links = page.locator('.ascii-link');
			await expect(links).toHaveCount(ASCII_LINKS.length);

			const cardBack = page.locator('.card-back');
			const cardBox = await cardBack.boundingBox();
			expect(cardBox).toBeTruthy();

			for (const { href, text } of ASCII_LINKS) {
				const link = page.locator('.ascii-link', { hasText: text });
				await expect(link).toBeVisible();
				await expect(link).toHaveAttribute('href', href);

				const box = await link.boundingBox();
				expect(box).toBeTruthy();
				expect(box!.x).toBeGreaterThanOrEqual(cardBox!.x - 1);
				expect(box!.y).toBeGreaterThanOrEqual(cardBox!.y - 1);
				expect(box!.x + box!.width).toBeLessThanOrEqual(cardBox!.x + cardBox!.width + 1);
				expect(box!.y + box!.height).toBeLessThanOrEqual(cardBox!.y + cardBox!.height + 1);

				expect(await hrefAtCenter(page, link)).toBe(href);
			}

			await links.nth(0).evaluate((el) => {
				el.addEventListener('click', (event) => event.preventDefault(), { once: true });
			});
			await links.nth(0).click();
			await expect(rotator).toHaveClass(/is-open/);
		});

		test('http ascii links open in a new tab and leave the card open', async ({ page }) => {
			const rotator = await openAsciiCard(page);
			const github = page.locator('.ascii-link', { hasText: 'https://github.com/cdellacqua' });

			const popupPromise = page.waitForEvent('popup');
			await github.click();
			const popup = await popupPromise;
			await expect(popup).toHaveURL(/https:\/\/github\.com\/cdellacqua/);
			await expect(rotator).toHaveClass(/is-open/);
			await popup.close();
		});

		test('clicking the flipped card away from links still closes it', async ({ page }) => {
			const rotator = await openAsciiCard(page);
			await page.locator('.card-back [data-card-flip]').click({ position: { x: 12, y: 12 } });
			await expect(rotator).toHaveClass(/is-closed/);
		});
	});
}
