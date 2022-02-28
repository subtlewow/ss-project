<div class="bg-gray-800">
    <span class='text-center text-white max-w-5xl inline-block m-14 lg:mb-0'>$Content</span>
</div>

<div class="bg-gray-800 text-white flex flex-col lg:flex-row flex-wrap justify-center">
    <% loop Children %>
        <% include BlogPostCard %>
    <% end_loop %>
</div>
