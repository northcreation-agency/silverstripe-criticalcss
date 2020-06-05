<?php
namespace NorthCreationAgency\CriticalCSS;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Core\Config\Config;

class PageExtension extends DataExtension {
    private static $main_css_path;
    private static $criticalcss_path;

    public function CCSSCookie(){
        return isset($_COOKIE['ccsscookie'])?$_COOKIE['ccsscookie']:false;
    }
    public function CCSSCookieVersion(){
        return date("Ym");
    }

    public function ValidCCSSCookie(){
        if(defined("SS_STATICPUBLISHER_ENABLED") && SS_STATICPUBLISHER_ENABLED){
            return false; // we disable cookie checking if static publisher is enabled
        }
        if ($this->owner->CCSSCookie() && $this->owner->CCSSCookie() == $this->owner->CCSSCookieVersion()){
            return true;
        }
    }

    function CCSSAsRaw(){
        $path =BASE_PATH.$this->owner->CriticalCSSPath();
        if(file_exists($path)) {
            $css = file_get_contents($path);
            return $css;
        }
        return false;
    }
    public function MainCSSPath(){
        return "/_resources/themes/".Config::inst()->get('SSViewer', 'theme')."/".Config::inst()->get("NorthCreationAgency\CriticalCSS\PageExtension","main_css_path");
    }
    public function CriticalCSSPath(){
        return "/public/_resources/themes/".Config::inst()->get('SSViewer', 'theme')."/".Config::inst()->get("NorthCreationAgency\CriticalCSS\PageExtension","criticalcss_path")."critical-".$this->owner->CriticalCSSName().".css";
    }
    public function CriticalCSSName(){
        $className = explode('\\', $this->owner->ClassName);
        return array_pop($className);
    }
}