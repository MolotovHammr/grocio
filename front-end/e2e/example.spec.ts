import { test, expect } from '@playwright/test';

test('test registeration', async ({ page }) => {
  await page.goto('http://localhost:3000/');
  await page.getByRole('link', { name: 'Register' }).click();
  await page.getByText('Username (saved in database, keep ambiguous):').click();
  await page.getByText('Password (Not stored in database, so make sure to remember it):').click();
  await page.getByText('These values will be saved in an encrypted manner, even we will not be able to s').click();
  await page.getByText('name:').click();
  await page.getByText('Email:').click();
  await page.getByText('Phone:').click();
  await page.getByText('Age:').click();
  await page.locator('input[name="username"]').click();
  await page.locator('input[name="username"]').fill('username');
  await page.locator('input[name="username"]').press('Tab');
  await page.locator('input[name="password"]').fill('passwordd');
  await page.locator('input[name="password"]').press('Tab');
  await page.locator('input[name="name"]').fill('Nazar Bachynskyy');
  await page.locator('input[name="name"]').press('Tab');
  await page.locator('input[name="email"]').fill('nazarbach@gmail.com');
  await page.locator('input[name="email"]').press('Tab');
  await page.locator('input[name="phone"]').fill('0653608878');
  await page.locator('input[name="phone"]').press('Tab');
  await page.locator('input[name="age"]').fill('1999-06-30');
  await page.getByRole('button', { name: 'Register' }).click();
});

