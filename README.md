# AimaneCouissi_CatalogProductGridMultipleSkuFilter

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-catalog-product-grid-multiple-sku-filter/v)](https://packagist.org/packages/aimanecouissi/module-catalog-product-grid-multiple-sku-filter) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-catalog-product-grid-multiple-sku-filter/downloads)](https://packagist.org/packages/aimanecouissi/module-catalog-product-grid-multiple-sku-filter) [![Magento Version Require](https://img.shields.io/badge/magento-2.4.x-E68718)](https://packagist.org/packages/aimanecouissi/module-catalog-product-grid-multiple-sku-filter) [![License](http://poser.pugx.org/aimanecouissi/module-catalog-product-grid-multiple-sku-filter/license)](https://packagist.org/packages/aimanecouissi/module-catalog-product-grid-multiple-sku-filter/license) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-catalog-product-grid-multiple-sku-filter/require/php)](https://packagist.org/packages/aimanecouissi/module-catalog-product-grid-multiple-sku-filter/require/php)

Adds support for filtering the Admin product grid by multiple SKUs using a comma-separated list.

## Installation
```bash
composer require aimanecouissi/module-catalog-product-grid-multiple-sku-filter
bin/magento module:enable AimaneCouissi_CatalogProductGridMultipleSkuFilter
bin/magento setup:upgrade
bin/magento cache:flush
```

## Usage
Open **Admin → Catalog → Products** and use the **SKU** filter. Enter multiple SKUs separated by commas and the grid will return products matching any of the provided SKUs. Entering a single SKU keeps Magento's default filter behavior.

## Uninstall
```bash
bin/magento module:disable AimaneCouissi_CatalogProductGridMultipleSkuFilter
composer remove aimanecouissi/module-catalog-product-grid-multiple-sku-filter
bin/magento setup:upgrade
bin/magento cache:flush
```

## License
[MIT](LICENSE)
