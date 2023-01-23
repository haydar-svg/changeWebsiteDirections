<?php
$CONTENT = '';
$CONTENT_AFTER_EFFECT = '';
include_once('./modules.php');

if (isset($_FILES['filename']))
    OpenFileAndChangeContent($_FILES['filename']['tmp_name']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change page direction</title>
    <link rel="stylesheet" href="./Dosis/font.css">
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <p class="scriptDescription">
        This page is for those who want to change the website orientation from left to right or vice versa
     </p>
    <form action="./" method="post" enctype="multipart/form-data">
        <label for="filename">
            <p>
                choose your css file
            </p>
        </label>
        <input type="file" name="filename" id="filename">
        <button type="submit">
            upload
        </button>
    </form>
    <div class="codeSpaceTitle">
        <p> older code:</p>
        <p> new code:</p>
    </div>
    <div class="codeSpace">
        <div class="olderCode">
            <?php
            $CONTENT = preg_replace('/(})/', '<br>}<br>', $CONTENT);
            $CONTENT = preg_replace('/({)/', '<br>{<br><span>....</span>', $CONTENT);
            $CONTENT = preg_replace('/(;)/', ';<br><span>....</span>', $CONTENT);
            echo $CONTENT;
            ?>
        </div>
        <div class="newCode">
            <?php
            $CONTENT_AFTER_EFFECT = preg_replace('/(})/', '<br>}<br>', $CONTENT_AFTER_EFFECT);
            $CONTENT_AFTER_EFFECT = preg_replace('/({)/', '<br>{<br><span>....</span>', $CONTENT_AFTER_EFFECT);
            $CONTENT_AFTER_EFFECT = preg_replace('/(;)/', ';<br><span>....</span>', $CONTENT_AFTER_EFFECT);
            echo $CONTENT_AFTER_EFFECT;
            ?>
        </div>
    </div>
    <?php
    if (isset($_FILES['filename'])) {
        echo <<<_RESULT
                <div class="download">
                    <a href="WriteResultHere.css"  download="result.css">
                       download
                    </a>
                </div>
        _RESULT;
    }
    ?>
    <div class="information">
        If you are trying to convert elements from right to left, add this directive at the beginning of the document
        <span>
            *{direction:rtl}
        </span>
    </div>
</body>

</html>