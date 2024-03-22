import puppeteer from 'puppeteer';
import * as data from './step_2_product_links.json' assert { type: "json" };
import fs from 'fs';


(async () => {
    // Launch the browser and open a new blank page
    const browser = await puppeteer.launch({headless: false});
    const page = await browser.newPage();

    // Set screen size
    await page.setViewport({width: 900, height: 1080});

    let scraped_data = {
        "child_sub_categories": []
    };

    let category_count = 0;
    let total_categories = data.default.child_sub_categories.length;
    let product_count = 0;
    let fetched_products_count = 0;
    for (const child_sub_category of data.default.child_sub_categories) {
        let total_products = child_sub_category["products"].length;
        category_count += 1;
        product_count = 0;

        let products = [];
        for (const product_link of child_sub_category["products"]) {
            product_count += 1;
            fetched_products_count += 1;

            console.log('category '+category_count+'/'+total_categories+' | product '+product_count+'/'+total_products+' | products fetched: ' + (fetched_products_count - 1));

            await page.goto(product_link, {'timeout': 99999999, waitUntil: 'domcontentloaded'});
            await page.waitForSelector('.page-title').then(() => {  }).catch(e => {  });
            let product_images_present;
            await page.waitForSelector('.fotorama__img').then(() => {
                product_images_present = true;
            }).catch(e => {
                product_images_present = false;
            });

            let data = await page.evaluate(() => {
                let product_title = jQuery('.page-title').find('span:first').text().trim();
                let description = jQuery('.product-description').find('div').html();
                let additional_information = jQuery('#description').html();
                let feature_image = jQuery('.fotorama__img').attr('src');
                let product_images = [];
                let thumb_count = jQuery('.fotorama__nav__shaft').find('.fotorama__nav__frame--thumb').length;

                //pricing
                let price;
                if (jQuery('.prices-list').length == 1) {
                    price = [];
                    jQuery('.list-column').each((i, item) => {
                        let range = jQuery(item).find('div:first').find('span:first').text();
                        let min = parseInt(range.split("-")[0].replaceAll('+', ''));
                        let max = parseInt((range.split("-")[1]) ? range.split("-")[1].replaceAll('+', '') : 99999999999999);
                        let rate = parseFloat((jQuery(item).find('div:last').find('span:first').text().replaceAll('$', '')).replaceAll(/,/g, ''));

                        price.push({
                            min,
                            max,
                            rate
                        });
                    });
                } else if (jQuery("span.price-label:contains('Starting at')").length == 1) {
                    price = parseFloat((jQuery("span.price-label:contains('Starting at')").parent().find('span:last').text().trim().replaceAll('$', '')).replaceAll(/,/g, ''));
                } else if (jQuery("span.price-label:contains('Special Price')").length) {
                    price = parseFloat((jQuery("span.price-label:contains('Special Price')").parent().find('span:last').text().trim().replaceAll('$', '')).replaceAll(/,/g, ''));
                } else if (jQuery("span.price-label:contains('As low as')").length) {
                    price = parseFloat((jQuery("span.price-label:contains('As low as')").parent().find('span:last').text().trim().replaceAll('$', '')).replaceAll(/,/g, ''));
                } else if (jQuery('.price').length == 3) {
                    price = parseFloat((jQuery(jQuery('.price')[0]).text().trim().replaceAll('$', '')).replaceAll(/,/g, ''));
                } else {
                    price = parseFloat((jQuery(jQuery('.price')[0]).text().trim().replaceAll('$', '')).replaceAll(/,/g, ''));
                }

                return {
                    product_title,
                    description,
                    additional_information,
                    feature_image,
                    price,
                    product_images,
                    thumb_count,
                };
            });

            //product_images
            if (product_images_present === true) {
                for (let i = 0; i < data["thumb_count"] - 1; i++) {
                    await page.locator('.fotorama__arr--next').click();
                    await delay(1000);
                    data["product_images"].push(await page.evaluate(() => {
                        return jQuery('.fotorama__img').attr('src');
                    }));
                }
            }
            data["product_images"].shift();

            data["product_link"] = product_link;

            console.log(data);
            products.push(data);
        }

        scraped_data["child_sub_categories"].push({
            "name": child_sub_category.name,
            "products": products
        });
    }

    await browser.close();

    fs.writeFile('step_3_products.json', JSON.stringify(scraped_data), 'utf8', (err) => {
        if (err) {
            return;
        }
    });
})();

function delay(time) {
    return new Promise(function(resolve) {
        setTimeout(resolve, time)
    });
}
