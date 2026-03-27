<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\CatalogProductGridMultipleSkuFilter\Ui\DataProvider\Product;

use Magento\Framework\Data\Collection;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\DataProvider\AddFilterToCollectionInterface;

class AddMultipleSkuFilterToCollection implements AddFilterToCollectionInterface
{
    public const string MULTIPLE_VALUE_SEPARATOR = ',';

    /**
     * @inheritDoc
     * @throws LocalizedException
     */
    public function addFilter(Collection $collection, $field, $condition = null): void
    {
        $conditionValue = $this->extractConditionValue($condition);
        $unwrappedValue = str_replace('%', '', $conditionValue);
        if (!str_contains($unwrappedValue, self::MULTIPLE_VALUE_SEPARATOR)) {
            $this->applyOriginalCondition($collection, $field, $condition);
            return;
        }
        $skus = $this->parseSkus($unwrappedValue);
        if (count($skus) < 2) {
            $this->applyOriginalCondition($collection, $field, $condition);
            return;
        }
        $collection->addFieldToFilter($field, ['in' => $skus]);
    }

    /**
     * Extracts the raw condition value (first element if array), normalized to string.
     *
     * @param mixed $condition
     * @return string
     */
    private function extractConditionValue(mixed $condition): string
    {
        if (is_array($condition)) {
            $first = reset($condition);
            return (string)$first;
        }
        return (string)$condition;
    }

    /**
     * Applies the original collection filter unchanged.
     *
     * @param Collection $collection
     * @param mixed $field
     * @param mixed $condition
     * @return void
     * @throws LocalizedException
     */
    private function applyOriginalCondition(Collection $collection, mixed $field, mixed $condition): void
    {
        $collection->addFieldToFilter($field, $condition);
    }

    /**
     * Splits a separator-delimited SKU string into unique, non-empty SKU tokens.
     *
     * @param string $input
     * @return array
     */
    private function parseSkus(string $input): array
    {
        $parts = array_map('trim', explode(self::MULTIPLE_VALUE_SEPARATOR, $input));
        $parts = array_filter($parts, static fn(string $value): bool => $value !== '');
        return array_values(array_unique($parts));
    }
}
