<div id="$HolderID" class="input-container<% if $extraClass %> $extraClass<% end_if %>">
    $Field
    <% if $Title %><label for="$ID">$Title</label><% end_if %>
    <% if $RightTitle %><label for="$ID">$RightTitle</label><% end_if %>
    <% if $Message %><span class="message $MessageType">$Message</span><% end_if %>
    <% if $Description %><span class="description">$Description</span><% end_if %>
    <div class="input-bottom-bar"></div>
</div>