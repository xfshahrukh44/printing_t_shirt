import puppeteer from 'puppeteer';
import * as data from './step_1_category_links.json' assert { type: "json" };
import fs from 'fs';


(async () => {
    // Launch the browser and open a new blank page
    const browser = await puppeteer.launch({headless: false});
    const page = await browser.newPage();

    let scraped_data = {
        "child_sub_categories": []
    };

    let used_hrefs = [];
    for (const child_sub_category of data.default.child_sub_categories) {
        await page.goto("https://www.proworldinc.com" + child_sub_category.link + "?product_list_limit=all", {'timeout': 99999999, waitUntil: 'domcontentloaded'});

        await page.waitForSelector('.product-item-link');

        let products = await page.evaluate(() => {
            let links = [];

            jQuery('.product-item-link').each((i, item) => {
                let link = jQuery(item).attr('href');
                links.push(link);
            });

            return links;
        });

        scraped_data["child_sub_categories"].push({
            "name": child_sub_category.name,
            "link": child_sub_category.link,
            "products": products
        });

        let used_hrefs = [];
        for (var i = 0; i < scraped_data["child_sub_categories"].length; i++) {
            for (var j = 0; j < scraped_data["child_sub_categories"][i]["products"].length; j++) {
                let link = scraped_data["child_sub_categories"][i]["products"][j];
                let category_name = scraped_data["child_sub_categories"][i]["name"];
                if (string_is_in_array(link, used_hrefs)) {
                    delete scraped_data["child_sub_categories"][i]["products"][j];
                } else {
                    used_hrefs.push(scraped_data["child_sub_categories"][i]["products"][j]);
                }
            }
        }
    }

    await browser.close();

    fs.writeFile('step_2_product_links.json', JSON.stringify(scraped_data), 'utf8', (err) => {
        if (err) {
            console.error('Error writing to file:', err);
            return;
        }
        console.log('Data has been written to file successfully.');
    });
})();

const string_is_in_array = (str, array) => {
    for (var i = 0; i < array.length; i++) {
        if (array[i] === str) {
            return true;
        }
    }
    return false;
};
