<?php

namespace App\Helpers;

use App\Models\MetaTag;
use App\Models\PageBanner;
use Illuminate\Support\Facades\Storage;

class FrontendHelper
{

    /**
     * Retrieve meta tags (title, description, and keywords) for a given page.
     *
     * @param string $page The page identifier.
     * @return array An associative array containing meta title, description, and keywords.
     * @author Sooryajith
     */
    public static function getMetaTags($page)
    {
        $metaTitle = FrontendHelper::getMetaTitle($page);
        $metaDescription = FrontendHelper::getMetaDescription($page);
        $metaKeywords = FrontendHelper::getMetaKeywords($page);

        return compact('metaTitle', 'metaDescription', 'metaKeywords');
    }

    /**
     * get meta title
     * 
     * @author Sooryajith
     */
    public static function getMetaTitle($page)
    {
        return MetaTag::where('page', $page)->value('meta_title') ?? 'B3 Macbis';
    }

    /**
     * get meta description
     * 
     * @author Sooryajith
     */
    public static function getMetaDescription($page)
    {
        return MetaTag::where('page', $page)->value('meta_description') ?? 'B3 Macbis';
    }

    /**
     * get meta keywords
     * 
     * @author Sooryajith
     */
    public static function getMetaKeywords($page)
    {
        return MetaTag::where('page', $page)->value('meta_keywords') ?? 'B3 Macbis';
    }

    /**
     * Get page banner details for the given page.
     * 
     * @param string $page The page identifier.
     * @return array An array containing the subtitle, title, image, and alt text.
     * @author Sooryajith
     */
    public static function getPageBanner($page)
    {
        $subtitle = FrontendHelper::getPageBannerSubtitle($page);
        $title = FrontendHelper::getPageBannerTitle($page);
        $image = FrontendHelper::getPageBannerImage($page);
        $imageAltText = FrontendHelper::getPageBannerImageAltText($page);

        return compact('subtitle', 'title', 'image', 'imageAltText');
    }

    /**
     * Get the subtitle for the page banner of the given page.
     *
     * @param string $page The page identifier.
     * @return string The subtitle for the page banner.
     * @author Sooryajith
     */
    public static function getPageBannerSubtitle($page)
    {
        return PageBanner::where('page', $page)->value('subtitle') ?? 'B3 Macbis';
    }

    /**
     * Get the title for the page banner of the given page.
     * 
     * @param string $page The page identifier.
     * @return string The title for the page banner.
     * @author Sooryajith
     */
    public static function getPageBannerTitle($page)
    {
        return PageBanner::where('page', $page)->value('title') ?? 'B3 Macbis';
    }

    /**
     * Get the image URL for the page banner of the given page.
     *
     * @param string $page The page identifier.
     * @return string|null The image URL for the page banner, or null if not found.
     * @author Sooryajith
     */
    public static function getPageBannerImage($page)
    {
        $image = PageBanner::where('page', $page)->value('image');

        if ($image && Storage::disk('public')->exists($image))
            return Storage::url($image);
        else if ($image && file_exists($image))
            return asset($image);
        else
            return asset(AdminHelper::getValueByKey('default_image'));
    }

    /**
     * Get the image alt text for the page banner of the given page.
     * 
     * @param string $page The page identifier.
     * @return string The image alt text for the page banner.
     * @author Sooryajith
     */
    public static function getPageBannerImageAltText($page)
    {
        return PageBanner::where('page', $page)->value('image_alt_text') ?? 'B3 Macbis';
    }
}
