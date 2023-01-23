<?php
function CssFile($filename)
{
    global $CONTENT, $CONTENT_AFTER_EFFECT;
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $CONTENT = $content;
        $content = preg_replace('/left/', 'l.eft', $content);
        $content = preg_replace('/right/', 'left', $content);
        $content = preg_replace('/l.eft/', 'right', $content);
        $content = preg_replace('/translateX\(50%\)/', 'translateX.(50%)', $content);
        $content = preg_replace('/translateX\(-50%\)/', 'translateX(50%)', $content);
        $content = preg_replace('/translateX.\(50%\)/', 'translateX(-50%)', $content);
        $content = preg_replace('/direction:\s{0,}ltr;/', 'direction:.ltr;', $content);
        $content = preg_replace('/direction:\s{0,}rtl;/', 'direction:ltr;', $content);
        $content = preg_replace('/direction:.ltr;/', 'direction:rtl;', $content);
        $NewContent = $content;
        $CONTENT_AFTER_EFFECT = $NewContent;
        return $NewContent;
    } else return false;
}
function OpenFileAndChangeContent($filename)
{
    $result = CssFile($filename);
    if ($result != false) {
        $fh = fopen("WriteResultHere.css", 'w') or die("Failed to create file");
        fwrite($fh, $result) or die("Could not write to file");
        fclose($fh);
    }
}
