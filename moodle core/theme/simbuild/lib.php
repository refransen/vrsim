<?php

// RF - July 2013
// Add functions to translate the custom menu items 
// into multiple languages
class theme_simbuild_transmuted_custom_menu_item extends custom_menu_item 
{
    public function __construct(custom_menu_item $menunode) 
    {
        parent::__construct($menunode->get_text(), $menunode->get_url(), $menunode->get_title(), 
           $menunode->get_sort_order(), $menunode->get_parent());
        $this->children = $menunode->get_children();
 
        $matches = array();
        if (preg_match('/^\[\[([a-zA-Z0-9\-\_\:]+)\]\]$/', $this->text, $matches)) {
            try {
                $this->text = get_string($matches[1], 'theme_simbuild');
            } catch (Exception $e) {
                $this->text = $matches[1];
            }
        }
 
        $matches = array();
        if (preg_match('/^\[\[([a-zA-Z0-9\-\_\:]+)\]\]$/', $this->title, $matches)) {
            try {
                $this->title = get_string($matches[1], 'theme_simbuild');
            } catch (Exception $e) {
                $this->title = $matches[1];
            }
        }
    }
}

function simbuild_set_linkcolor($css, $linkcolor) {
    $tag = '[[setting:linkcolor]]';
    $replacement = $linkcolor;
    if (is_null($replacement)) {
        $replacement = '#06365b';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function simbuild_set_linkhover($css, $linkhover) {
    $tag = '[[setting:linkhover]]';
    $replacement = $linkhover;
    if (is_null($replacement)) {
        $replacement = '#5487ad';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function simbuild_set_maincolor($css, $maincolor) {
    $tag = '[[setting:maincolor]]';
    $replacement = $maincolor;
    if (is_null($replacement)) {
        $replacement = '#8e2800';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function simbuild_set_maincolorlink($css, $maincolorlink) {
    $tag = '[[setting:maincolorlink]]';
    $replacement = $maincolorlink;
    if (is_null($replacement)) {
        $replacement = '#fff0a5';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function simbuild_set_headingcolor($css, $headingcolor) {
    $tag = '[[setting:headingcolor]]';
    $replacement = $headingcolor;
    if (is_null($replacement)) {
        $replacement = '#5c3500';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function simbuild_set_logo($css, $logo) {
 global $OUTPUT;
 $tag = '[[setting:logo]]';
 $replacement = $logo;
 if (is_null($replacement)) {
 $replacement = $OUTPUT->pix_url('logo', 'theme');
 }
 $css = str_replace($tag, $replacement, $css);
 return $css;
}

function simbuild_process_css($css, $theme) {
       
     if (!empty($theme->settings->linkcolor)) {
        $linkcolor = $theme->settings->linkcolor;
    } else {
        $linkcolor = null;
    }
    $css = simbuild_set_linkcolor($css, $linkcolor);

// Set the link hover color
    if (!empty($theme->settings->linkhover)) {
        $linkhover = $theme->settings->linkhover;
    } else {
        $linkhover = null;
    }
    $css = simbuild_set_linkhover($css, $linkhover);
    
    // Set the main color
    if (!empty($theme->settings->maincolor)) {
        $maincolor = $theme->settings->maincolor;
    } else {
        $maincolor = null;
    }
    $css = simbuild_set_maincolor($css, $maincolor);
    
      // Set the main accent color
    if (!empty($theme->settings->maincolorlink)) {
        $maincolorlink = $theme->settings->maincolorlink;
    } else {
        $maincolorlink = null;
    }
    $css = simbuild_set_maincolorlink($css, $maincolorlink);
   
   // Set the main headings color
    if (!empty($theme->settings->headingcolor)) {
        $headingcolor = $theme->settings->headingcolor;
    } else {
        $headingcolor = null;
    }
    $css = simbuild_set_headingcolor($css, $headingcolor);
    
     // Set the logo image
    if (!empty($theme->settings->logo)) {
        $logo = $theme->settings->logo;
    } else {
        $logo = null;
    }
    $css = simbuild_set_logo($css, $logo);
    
    
    
    return $css;
    
    
    
}