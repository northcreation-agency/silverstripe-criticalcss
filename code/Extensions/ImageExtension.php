<?php
namespace NorthCreationAgency\CriticalCSS;

use SilverStripe\ORM\DataExtension;
/**
 * Created by PhpStorm.
 * User: herbertcuba
 * Date: 2019-02-18
 * Time: 12:15
 */
class ImageExtension extends DataExtension{
    function DataURI($imagePath) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($imagePath);
        return 'data:'.$type.';base64,'.base64_encode(file_get_contents($imagePath));
    }
    public function ImageAsData($width=100){
        if($this->owner->exists()){
            return $this->owner->DataURI(realpath($_SERVER["DOCUMENT_ROOT"]).$this->owner->ScaleWidth($width)->getURL());
        }


    }
}
