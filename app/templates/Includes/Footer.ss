<div class="mt-auto bg-gray-800">
    <footer class="">
        <div class="flex flex-col p-4 py-8 text-right lg:max-w-5xl mx-auto">
          <nav class="px-3" aria-label="Footer">
            <% with SiteConfig %>
                <div class="ml-5 absolute mt-2">
                    <a href="/">$PageLogo.ScaleWidth(100)</a>
                </div>
            <% end_with %>

            <% loop Menu(1) %>
                <div class="px-5 py-2">
                    <a href="$Link" class="text-base font-bold text-white hover:text-gray-900"> $MenuTitle </a>
                </div>
            <% end_loop %>
          </nav>
        </div>
    </footer>
</div>
