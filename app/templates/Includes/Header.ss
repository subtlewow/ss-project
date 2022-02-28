<%-- Header --%>
<div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
    <div class="text-center">
    <h2 class="text-base font-semibold text-indigo-600 tracking-wide uppercase">$SubText</h2>
    <p class="mt-1 text-4xl font-extrabold text-white sm:text-5xl sm:tracking-tight lg:text-6xl">$MainHeading</p>
    <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">$SubHeading</p>
    </div>
</div>


<%-- Menu --%>
<div class="relative bg-white bg-green-400">
    <div class="">
        <div class="flex justify-between items-center md:justify-start md:space-x-10 py-2 lg:max-w-5xl lg:mx-auto">
            <% with SiteConfig %>
                <div class="ml-12">
                    <a href="/">$PageLogo.ScaleWidth(100)</a>
                </div>
            <% end_with %>

            <% loop Menu(1) %>
                <a href="$Link" class='hover:text-gray-900 font-bold text-white' alt='$MenuTitle'>$MenuTitle</a>
            <% end_loop %>
        <div>
    </div>
</div>


