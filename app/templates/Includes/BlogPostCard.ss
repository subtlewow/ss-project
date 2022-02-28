<div class="flex justify-center items-center py-20 lg:p-20">
    <div class="bg-indigo-400 h-full shadow rounded-md hover:scale-125 transition duration-300">
        <a href="$URLSegment">
            <% if Image %>
                <img src="$Image.ScaleHeight(300).URL" class='w-full object-cover'>
            <% end_if %>

            <h3 class="text-md py-3 font-bold">$Title</h3>
            <% if Date %>
                <span class="py-3 inline-block">
                    $Date.Nice
                </span>
            <% end_if %>
        </a>
    </div>
</div>
