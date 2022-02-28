<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-8 col-xxs-12 col-centered text-center">
            <div class="page-title">
                <h1><% if $LoginConfigVars.SecurityMainTitle %>$LoginConfigVars.SecurityMainTitle<% else %>$SiteConfig.Title<% end_if %></h1>
            </div>
            <div class="message">Provided by DevartNZ</div>
            <% if $Content %>
                <div class="message">
                    $Content
                </div>
            <% end_if %>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 col-xxs-12 col-centered">
            <div class="card arranged-back"></div>
            <div class="card">
                <h1 class="card-title"><% if $LoginConfigVars.SecurityLoginCardTitle %>$LoginConfigVars.SecurityLoginCardTitle<% else %>Administrator Login<% end_if %></h1>

                <% with $Form %>
                    <form $AttributesHTML>
                        <% if $Message %>
                        <p id="{$FormName}_error" class="message $MessageType">$Message</p>
                        <% else %>
                        <p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
                        <% end_if %>

                        <% if $Actions.fieldByName("action_doLogin") %>
                            <fieldset>
                                <% with $Fields.fieldByName("Email") %>
                                    <% include DevartSecurity_FormField %>
                                <% end_with %>

                                <% with $Fields.fieldByName("Password") %>
                                    <% include DevartSecurity_FormField %>
                                <% end_with %>

                                <% with $Fields.fieldByName("Remember") %>
                                    <% include DevartSecurity_CheckboxField %>
                                <% end_with %>

                                $Fields.dataFieldByName(AuthenticationMethod)
                                $Fields.dataFieldByName(BackURL)
                                $Fields.dataFieldByName(SecurityID)

                                <div class="clear"><!-- --></div>
                            </fieldset>
                            <div class="Actions">
                                <% with $Actions.fieldByName("action_doLogin") %>
                                    <% include DevartSecurity_FormAction %>
                                <% end_with %>

                                $Actions.fieldByName("forgotPassword")
                            </div>
                        <% else %>
                            <fieldset>
                                $Fields.dataFieldByName(AuthenticationMethod)
                                $Fields.dataFieldByName(BackURL)
                                $Fields.dataFieldByName(SecurityID)
                            </fieldset>
                            <div class="Actions">
                                <% with $Actions.fieldByName("action_logout") %>
                                    <% include DevartSecurity_FormAction %>
                                <% end_with %>
                            </div>
                        <% end_if %>



                    </form>
                <% end_with %>

                <div class="sticker hidden-xxs"><i class="fa fa-unlock-alt"></i></div>
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