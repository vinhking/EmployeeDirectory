<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <style>
            .pagination ul > li.myclass {
                float: left;
                padding: 4px 12px;
                line-height: 20px;
                text-decoration: none;
                background-color: #ffffff;
                border: 1px solid #dddddd;
                border-left-width: 0;
                color: #999999;
                cursor: default;
                background-color: transparent;
            }
            .pagination ul > li.myclass:first-child {
                border-left-width: 1px;
                -webkit-border-bottom-left-radius: 4px;
                border-bottom-left-radius: 4px;
                -webkit-border-top-left-radius: 4px;
                border-top-left-radius: 4px;
                -moz-border-radius-bottomleft: 4px;
                -moz-border-radius-topleft: 4px;
            }
            .pagination ul > li.myclass:last-child {
                -webkit-border-top-right-radius: 4px;
                border-top-right-radius: 4px;
                -webkit-border-bottom-right-radius: 4px;
                border-bottom-right-radius: 4px;
                -moz-border-radius-topright: 4px;
                -moz-border-radius-bottomright: 4px;
            }
        </style>-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?= $this->element('top_menu'); ?>

        <div class="container">
            <?php echo $this->fetch('content'); ?>
        </div>

    </body>
</html>
