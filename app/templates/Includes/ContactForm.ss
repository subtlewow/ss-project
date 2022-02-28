<% if $IncludeFormTag %>
    <form $AttributesHTML>
<% end_if %>
    <% loop Fields %>
        $Field
    <% end_loop %>

    <% if Actions %>
        <% loop Actions %>
            $Field
        <% end_loop %>
    <% end_if %>
<% if $IncludeFormTag %>
</form>
<% end_if %>
