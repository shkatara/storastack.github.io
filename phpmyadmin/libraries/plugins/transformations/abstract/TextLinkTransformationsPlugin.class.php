<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Abstract class for the link transformations plugins
 *
 * @package    PhpMyAdmin-Transformations
 * @subpackage Link
 */
if (! defined('PHPMYADMIN')) {
    exit;
}

/* Get the transformations interface */
require_once 'libraries/plugins/TransformationsPlugin.class.php';

/**
 * Provides common methods for all of the link transformations plugins.
 *
 * @package PhpMyAdmin
 */
abstract class TextLinkTransformationsPlugin extends TransformationsPlugin
{
    /**
     * Gets the transformation description of the specific plugin
     *
     * @return string
     */
    public static function getInfo()
    {
        return __(
            'Displays a link; the column contains the filename. The first option'
            . ' is a URL prefix like "http://www.example.com/". The second option'
            . ' is a title for the link.'
        );
    }

    /**
     * Does the actual work of each specific transformations plugin.
     *
     * @param string $buffer  text to be transformed
     * @param array  $options transformation options
     * @param string $meta    meta information
     *
     * @return string
     */
    public function applyTransformation($buffer, $options = array(), $meta = '')
    {
        $url = (isset($options[0]) ? $options[0] : '') . ((isset($options[2]) && $options[2]) ? '' : $buffer);
        $parsed = parse_url($url);
        /* Do not allow javascript links */
        if (isset($parsed['scheme']) && $parsed['scheme'] == 'javascript') {
            return htmlspecialchars($url);
        }
        return '<a href="'
            . htmlspecialchars($url)
            . '" title="'
            . htmlspecialchars(isset($options[1]) ? $options[1] : '')
            . '" target="_new">'
            . htmlspecialchars(isset($options[1]) ? $options[1] : $buffer)
            . '</a>';
    }


    /* ~~~~~~~~~~~~~~~~~~~~ Getters and Setters ~~~~~~~~~~~~~~~~~~~~ */


    /**
     * Gets the transformation name of the specific plugin
     *
     * @return string
     */
    public static function getName()
    {
        return "TextLink";
    }
}
?>
