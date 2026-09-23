import { test, expect } from '@playwright/test';

const LIGHT_BG = 'rgb(250, 250, 250)';
const DARK_BG = 'rgb(15, 23, 42)';

test('system light theme paints the page light without a stored preference', async ({ page }) => {
	await page.emulateMedia({ colorScheme: 'light' });
	await page.goto('/it');
	await expect(page.locator('html')).not.toHaveAttribute('data-theme');
	await expect(page.locator('html')).toHaveCSS('background-color', LIGHT_BG);
	await expect(page.locator('.theme-icon--moon')).toBeVisible();
	await expect(page.locator('.theme-icon--sun')).toBeHidden();
});

test('system dark theme paints the page dark without javascript', async ({ browser }) => {
	const context = await browser.newContext({
		colorScheme: 'dark',
		javaScriptEnabled: false,
	});
	const page = await context.newPage();
	await page.goto('/it');
	await expect(page.locator('html')).toHaveCSS('background-color', DARK_BG);
	await expect(page.locator('.card-body')).toHaveCSS('background-color', 'rgb(30, 41, 59)');
	await expect(page.locator('.theme-icon--sun')).toBeVisible();
	await expect(page.locator('.theme-icon--moon')).toBeHidden();
	await context.close();
});

test('theme toggle sits to the right of the privacy link and switches themes', async ({ page }) => {
	await page.emulateMedia({ colorScheme: 'light' });
	await page.goto('/it');

	const privacy = page.locator('.card-legal a');
	const toggle = page.locator('[data-theme-toggle]');
	await expect(toggle).toBeVisible();
	await expect(toggle).toHaveAttribute('aria-label', 'Cambia tema');

	const privacyBox = await privacy.boundingBox();
	const toggleBox = await toggle.boundingBox();
	expect(privacyBox).toBeTruthy();
	expect(toggleBox).toBeTruthy();
	expect(toggleBox!.x).toBeGreaterThan(privacyBox!.x + privacyBox!.width);
	expect(Math.abs(toggleBox!.y + toggleBox!.height / 2 - (privacyBox!.y + privacyBox!.height / 2))).toBeLessThan(8);

	await toggle.click();
	await expect(page.locator('html')).toHaveAttribute('data-theme', 'dark');
	await expect(page.locator('html')).toHaveCSS('background-color', DARK_BG);
	await expect(page.locator('.theme-icon--sun')).toBeVisible();
	await expect(page.locator('.theme-icon--moon')).toBeHidden();
	expect(await page.evaluate(() => localStorage.getItem('theme'))).toBe('dark');

	await toggle.click();
	await expect(page.locator('html')).toHaveAttribute('data-theme', 'light');
	await expect(page.locator('html')).toHaveCSS('background-color', LIGHT_BG);
	expect(await page.evaluate(() => localStorage.getItem('theme'))).toBe('light');
});

test('stored theme overrides the system preference on load', async ({ page }) => {
	await page.addInitScript(() => localStorage.setItem('theme', 'dark'));
	await page.emulateMedia({ colorScheme: 'light' });
	await page.goto('/it');
	await expect(page.locator('html')).toHaveAttribute('data-theme', 'dark');
	await expect(page.locator('html')).toHaveCSS('background-color', DARK_BG);
});

test('privacy and 404 follow the system dark theme', async ({ page }) => {
	await page.emulateMedia({ colorScheme: 'dark' });
	await page.goto('/it/privacy');
	await expect(page.locator('html')).toHaveCSS('background-color', DARK_BG);

	await page.goto('/it/missing-page');
	await expect(page.locator('html')).toHaveCSS('background-color', DARK_BG);
	await expect(page.locator('.section-card')).toHaveCSS('background-color', 'rgb(51, 65, 85)');
});
