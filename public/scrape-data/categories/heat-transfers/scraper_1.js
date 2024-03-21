import puppeteer from 'puppeteer';
import * as data from './step_1_child_sub_categories_and_links.json' assert { type: "json" };
import fs from 'fs';

(async () => {
    // Launch the browser and open a new blank page
    const browser = await puppeteer.launch({headless: false});
    const page = await browser.newPage();

    let scraped_data = {
        "child_sub_categories": []
    };

    for (const child_sub_category of data.default.child_sub_categories) {
        await page.goto("https://www.proworldinc.com/heat-transfers/" + child_sub_category.link + "?product_list_limit=all", {'timeout': 99999999, waitUntil: 'domcontentloaded'});
        // await page.goto("https://www.proworldinc.com/heat-transfers/" + child_sub_category.link, {'timeout': 99999999, waitUntil: 'domcontentloaded'});

        await page.waitForSelector('.data-is-heat-tail');

        let products = await page.evaluate(() => {
            let arr = [];
            for (const item of document.getElementsByClassName('data-is-heat-tail')) {
                let product = {
                    "title": jQuery(item).find('.product-item-link').text().trim(),
                    "feature_image": jQuery(item).find('.product-image-photo').attr('src'),
                    "sku": jQuery(item).find('.product-sku').text().trim().replaceAll('Item #: ', ''),
                    "size": jQuery(item).find('.size-info').text().trim().replaceAll('Size: ', ''),
                    "prices": []
                };

                jQuery(item).find('.price').each((index, price_item) => {
                    product["prices"].push(parseFloat(jQuery(price_item).text().replaceAll('$', '')) ?? 0.00);
                });

                arr.push(product);
            }

            return arr;
        });

        scraped_data["child_sub_categories"].push({
            "name": child_sub_category.name,
            "link": child_sub_category.link,
            "products": products
        });
    }

    await browser.close();

    fs.writeFile('step_2_products.json', JSON.stringify(scraped_data), 'utf8', (err) => {
        if (err) {
            console.error('Error writing to file:', err);
            return;
        }
        console.log('Data has been written to file successfully.');
    });
})();

const evaluateAndGetTextArray = async (page, class_name, replace = '') => {
    return await page.evaluate(() => {
        let arr = [];
        let elements = document.getElementsByClassName(class_name);

        for (const el of elements) {
            let string = el.textContent.trim();

            if (replace !== '') {
                string = string.replaceAll(replace, '');
            }

            arr.push(parseFloat(string));
        }

        return arr;
    });
};
