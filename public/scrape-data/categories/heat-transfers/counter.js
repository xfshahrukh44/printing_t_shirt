import * as data from './step_2_products.json' assert { type: "json" };

(async () => {
    let product_count = 0;
    for (const child_sub_category of data.default.child_sub_categories) {
        product_count += child_sub_category["products"].length;
    }

    console.log(product_count);
})();
