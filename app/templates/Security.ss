<!DOCTYPE html>

<!--[if !IE]><!-->
<html lang="{$ContentLocale}">
    <!--<![endif]-->
    <!--[if IE 6 ]><html lang="{$ContentLocale}" class="ie ie6"><![endif]-->
    <!--[if IE 7 ]><html lang="{$ContentLocale}" class="ie ie7"><![endif]-->
    <!--[if IE 8 ]><html lang="{$ContentLocale}" class="ie ie8"><![endif]-->
    <head>
        <% base_tag %>
        <title><% if $MetaTitle %> $MetaTitle <% else %> $Title <% end_if %> | {$SiteConfig.Title}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        {$MetaTags(false)}

        <!-- IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="{$ThemeDir}/images/favicon.png" />
    </head>

    <body class="{$ClassName}">
        <div class="page-wrap">
            <div class="body-content">
                {$Layout}
            </div>
        </div>

        <footer class="footer text-center">
            <img class="devartlogo" src="$ResourceFolder/images/devart_greyscale.png" alt="Developed by devart">
            <span>Copyright&copy; {$Now.Year} {$SiteConfig.Title}.</span>
            <span>All rights reserved.</span>
        </footer>

    </body>
</html>
