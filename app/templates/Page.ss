<!DOCTYPE html>

<html lang="$ContentLocale">
<head>
	<% base_tag %>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <script src="https://cdn.tailwindcss.com"></script>

	$MetaTags

	<meta property="og:site_name" content="$SiteConfig.Title"/>
	<meta property="og:url" content="$AbsoluteLink"/>
	<meta property="og:title" content="$OGTitle"/>
	<meta property="og:type" content="$OGType"/>
	<meta property="og:locale" content="en_NZ">
	<% if $FacebookPageImage %>
		<meta property="og:image" content="$FacebookPageImage.getAbsoluteURL"/>
	<% end_if %>
	<% if FacebookPageSumary %>
		<meta property="og:description" content="$FacebookPageSumary">
	<% end_if %>
	<% if SiteConfig.FacebookAppID %>
		<meta property="fb:app_id" content="$SiteConfig.FacebookAppID">
	<% end_if %>


	<% if isLive %>
		$GoogleAnalyticsTrackingCode.RAW
	<% end_if %>

	<link rel="shortcut icon" href="$ResourceFolder/images/favicon.ico" />

	$SiteConfig.HeadCode.RAW

	<script>
		globals = {
			'user': $GetUserJSON.RAW,
			'page': $GetPageJSON.RAW,
			'page_link': '$PageLink',
			'pagedata': $PageDataJSON.RAW,
			'consts': [],
			'isDevServer': $isDevJSON.RAW
		}
    </script>
</head>

<body class="$ClassName">
	$SiteConfig.BodyOpenCode.RAW

	<div id="app" class="wrapper">
        <div class="container-fluid bg-gray-800 min-h-screen relative">
            <% include Header %>

            <div class="bg-gray-800">
                <div id="layout" class="layout mx-auto text-center bg-white">$Layout</div>
                <% include Footer %>
            </div>
        </div>
	</div>

	$SiteConfig.BodyCloseCode.RAW
</body>
</html>
