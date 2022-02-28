<div id="$HolderID" class="input-container <% if extraClass %> $extraClass<% end_if %>">
    <label class="control control-checkbox" for="$ID">$Title
        $Field
        <div class="control-indicator"><i class="fa fa-check"></i></div>
    </label>

    <% if $Message %><span class="message $MessageType">$Message</span><% end_if %>
    <% if $Description %><span class="description">$Description</span><% end_if %>
</div>
