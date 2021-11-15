<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <?php $users = [
                        [
                            'avatar' => 'img/demo/authors/sunny.png',
                            'alt' => 'Sunny A.',
                            'name' => ' Sunny',
                            'surname' => 'A',
                            'skill' => '(UI/UX Expert)',
                            'position' => 'Lead Author',
                            'link_twittwer' => 'https://twitter.com/@myplaneticket',
                            'twitter' => '@myplaneticket',
                            'link_email' => 'https://wrapbootstrap.com/user/myorange',
                            'email' => '<i class="fal fa-envelope"></i>',
                            'banned' => 'off'

                        ],
                        [
                            'avatar' => 'img/demo/authors/josh.png',
                            'alt' => 'Jos K.',
                            'name' => 'Jos',
                            'surname' => 'K',
                            'skill' => '(ASP.NET Developer)',
                            'position' => 'Partner &amp; Contributor',
                            'link_twittwer' => 'https://twitter.com/@atlantez',
                            'twitter' => '@atlantez',
                            'link_email' => 'https://wrapbootstrap.com/user/Walapa',
                            'email' => '<i class="fal fa-envelope"></i>',
                            'banned' => 'off'

                        ],
                        [
                            'avatar' => 'img/demo/authors/jovanni.png',
                            'alt' => 'Jovanni Lo',
                            'name' => 'Jovanni',
                            'surname' => 'L',
                            'skill' => '(PHP Developer)',
                            'position' => 'Partner &amp; Contributor',
                            'link_twittwer' => 'https://twitter.com/@lodev09',
                            'twitter' => '@lodev09',
                            'link_email' => 'https://wrapbootstrap.com/user/lodev09',
                            'email' => '<i class="fal fa-envelope"></i>',
                            'banned' => 'on'

                        ],
                        [
                            'avatar' => 'img/demo/authors/roberto.png',
                            'alt' => 'Jovanni Lo',
                            'name' => 'Roberto',
                            'surname' => 'R',
                            'skill' => '(Rails Developer)',
                            'position' => 'Partner &amp; Contributor',
                            'link_twittwer' => 'https://twitter.com/@sildur',
                            'twitter' => '@sildur',
                            'link_email' => 'https://wrapbootstrap.com/user/sildur',
                            'email' => '<i class="fal fa-envelope"></i>',
                            'banned' => 'on'

                        ]
                    ];?>
                    <div class="panel-container show">
                        <div class="panel-content">
                           <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">

                               <?php foreach($users as $user): ?>
                                <div class="rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">
                                    <img src="<?php echo $user['avatar']; ?>" alt="<?php echo $user['alt']; ?>" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">
                                    <div class="ml-2 mr-3">
                                        <h5 class="m-0">
                                        <?php echo $user['name']." ".$user['surname']; ?>. <?php echo $user['skill']; ?>
                                            <small class="m-0 fw-300">
                                                <?php echo $user['position']; ?>
                                            </small>
                                        </h5>
                                        <a href="<?php echo $user['link_twittwer']; ?>" class="text-info fs-sm" target="_blank"><?php echo $user['twitter']; ?></a> -
                                        <a href="<?php echo $user['link_email']; ?>" class="text-info fs-sm" target="_blank" title="Contact Sunny"><?php echo $user['email']; ?></a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
