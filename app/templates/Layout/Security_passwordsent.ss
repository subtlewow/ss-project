<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-8 col-xxs-12 col-centered text-center">
            <div class="page-title">
                <h1><% if $LoginConfigVars.SecurityMainTitle %>$LoginConfigVars.SecurityMainTitle<% else %>$SiteConfig.Title<% end_if %></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 col-xxs-12 col-centered">
            <div class="card arranged-back"></div>
            <div class="card">
                <h1 class="card-title"><% if $LoginConfigVars.SecurityPasswordSentCardTitle %>$LoginConfigVars.SecurityPasswordSentCardTitle<% else %>Successful<% end_if %></h1>
                <div class="message">$Content</div>
                <div class="sticker hidden-xxs"><i class="fa fa-check"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="container top-spacer-30">
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-8 col-xxs-12 col-centered text-center">
            <div class="message">
                <a href="$BaseHref" class="btn btn-back">&ltrif; Back to Home page</a>
            </div>
        </div>
    </div>
</div>