Module for customization of <a href="https://firebearstudio.com/the-improved-import.html" title="Magento 2 Import">Magento 2 - Improved Import / Export extension by FireBear Studio</a>

<a href="https://firebearstudio.com/blog/improved-import-magento-2-extension-manual.html">Extension manual</a>

You can create plugins for functions from module Import and Export.

At the moment you can create plugins from Import:

1. customChangeData($data): changing data whiling saving

2. customBunchesData($data): changing data whiling saving bunches

This module will be replenished new features.

Examples:
```php
public function aroundCustomChangeData(
        \Firebear\ImportExport\Model\Import\Product $model,
        \Closure $proceed,
        $data
    ) {
        $mediaAttributes = ['image', 'small_image', 'thumbnail'];
            foreach($mediaAttributes as $attribute) {
                if (isset($data[$attribute])) {
                    $data[$attribute . '_label'] = preg_replace('/\W+/','',$data[$attribute]);
                }

            }

       error_log(json_encode($model->getParameters()));

       return $proceed($data);
    }

    public function aroundCustomBunchesData(
        \Firebear\ImportExport\Model\Import\Product $model,
        \Closure $proceed,
        $data
    ) {
        error_log(json_encode($data));
        return $proceed($data);
    }
```
