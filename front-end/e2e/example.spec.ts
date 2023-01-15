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

test('test', async ({ page }) => {
  await page.goto('http://localhost:3000/');
  await page.getByRole('link', { name: 'Catalogue' }).click();
  await page.getByRole('link', { name: 'Create' }).click();
  await page.locator('input[name="name"]').click();
  await page.locator('input[name="name"]').fill('Cheese 5');
  await page.locator('input[name="name"]').press('Tab');
  await page.locator('input[name="quantity"]').fill('5');
  await page.locator('input[name="quantity"]').press('Tab');
  await page.getByRole('combobox').press('Tab');
  await page.locator('input[name="energy"]').fill('5');
  await page.locator('input[name="energy"]').press('Tab');
  await page.locator('input[name="total_fat"]').fill('5');
  await page.locator('input[name="total_fat"]').press('Tab');
  await page.locator('input[name="saturated_fat"]').fill('5');
  await page.locator('input[name="saturated_fat"]').press('Tab');
  await page.locator('input[name="total_carbohydrates"]').fill('5');
  await page.locator('input[name="total_carbohydrates"]').press('Tab');
  await page.locator('input[name="sugars"]').fill('5');
  await page.locator('input[name="sugars"]').press('Tab');
  await page.locator('input[name="protein"]').fill('5');
  await page.locator('input[name="protein"]').press('Tab');
  await page.locator('input[name="salt"]').fill('5');
  await page.locator('input[name="salt"]').press('Tab');
  await page.locator('input[name="price"]').fill('5');
  await page.locator('input[name="price"]').press('Tab');
  await page.getByRole('button', { name: 'Create' }).click();
  await page.getByRole('link', { name: 'Back' }).click();
  await page.getByRole('link', { name: 'Back' }).click();
  await page.getByRole('link', { name: 'Shopping List' }).click();
  await page.locator('#items-input').fill('539');
  await page.getByRole('button', { name: 'Add' }).click();
  await page.getByRole('link', { name: 'Cheese 5' }).click();
  await page.getByRole('heading', { name: 'Cheese 5' }).click();
  await page.locator('#items-input').click();
});
  
