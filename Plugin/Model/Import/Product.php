<?php
/**
 * @copyright: Copyright © 2018 Firebear Studio. All rights reserved.
 * @author   : Firebear Studio <fbeardev@gmail.com>
 */

namespace Firebear\CustomImportExport\Plugin\Model\Import;


class Product
{
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
            //get Parameters
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
}