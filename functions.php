<?php

@include('version.php');

function tarski_site_version_shortcode($attrs) {
    if (is_array($attrs)) extract($attrs);
    
    if (defined('TARSKI_RELEASE_VERSION') && empty($number))
        $number = TARSKI_RELEASE_VERSION;
    
    if (defined('TARSKI_RELEASE_LINK') && empty($link))
        $link = TARSKI_RELEASE_LINK;
    
    return <<<VERSION
        <p><small>
            The latest Tarski release is <a href="$link">$number</a>
            (<a href="http://tarskitheme.com/about/changelog/#v$number">?</a>).
        </small></p>
        
        <p><a class="download"
              href="http://tarskitheme.com/downloads/tarski_$number.zip">
            Download Tarski $number
        </a></p>
        
        <p><small>
            A <a href="http://github.com/beastaugh/tarski">Git repository</a>
            is also available.
        </small></p>
VERSION;
}

function tarski_site_plugin_shortcode($attrs, $content) {
    extract($attrs);
    
    $name      = trim($name);
    $content   = wpautop($content);
    $nameLower = preg_replace('/[^a-z\d]/', '-', strtolower($name));
    
    return <<<PLUGIN
        <div class="plugin section" id="plugin-$nameLower">
            <h4><a href="$link">$name</a></h4>
            
            $content
        </div>
PLUGIN;
}

function tarski_site_comment_guidelines() {
    print <<<GUIDELINES
        <div class="content">
            <h3>Commenting Guidelines and Tips</h3>
            <p>
                HTML enclosed in <code>&lt;code&gt;</code> tags will be automatically
                escaped&mdash;don&#8217;t worry about replacing <code>&lt;</code> with
                <code>&amp;lt;</code>, for example.</p>
        </div>
GUIDELINES;
}

add_shortcode('version', 'tarski_site_version_shortcode');
add_shortcode('plugin', 'tarski_site_plugin_shortcode');

add_action('comment_form', 'tarski_site_comment_guidelines');

/**
 * A hack to make text widgets parse shortcodes.
 *
 * See WP bug ticket #10457
 * http://core.trac.wordpress.org/ticket/10457
 */
add_filter('widget_text', 'do_shortcode', 11);
