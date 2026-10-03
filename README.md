[![Deploy to GitHub Pages](https://github.com/cdellacqua/executable.it/actions/workflows/pages.yml/badge.svg)](https://github.com/cdellacqua/executable.it/actions/workflows/pages.yml)

# executable.it

Source of [www.executable.it](https://www.executable.it), the personal website of Carlo Dell'Acqua, Software Engineer.

It's a single business-card page in Italian and English, with a flippable ASCII card (also available in the terminal via `curl -sL executable.it/card`), a light/dark theme following the system preference, and a privacy page.

## Tech stack

- [Astro](https://astro.build) static site generator, with no client framework
- Plain CSS, processed with PostCSS (autoprefixer, cssnano) on top of modern-normalize
- [Playwright](https://playwright.dev) tests covering layout, theming, WCAG A/AA accessibility (axe-core) and HTML validity (html-validate)
- GitHub Actions builds every push to `main` and deploys it to GitHub Pages

## Commands

| Command           | Action                                        |
| :---------------- | :-------------------------------------------- |
| `npm ci`          | Install dependencies                          |
| `npm run dev`     | Start the dev server at `localhost:3000`      |
| `npm run build`   | Build the static site into `./dist/`          |
| `npm run preview` | Preview the production build locally          |
| `npm test`        | Run the Playwright test suite                 |
