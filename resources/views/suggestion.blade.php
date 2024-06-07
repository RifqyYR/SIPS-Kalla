<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suggestion') }}
        </h2>
    </x-slot>
    
    <!-- Table --> 
    <div class="relative overflow-x-auto shadow sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-12 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Client
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Suggestion
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="w-4 px-12">
                        <div class="flex items-center">
                            <span>1</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        Dimas
                    </td>
                    <td class="px-6 py-4 text-justify">
                            <span id="article">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel incidunt qui sunt omnis dolore maxime adipisci sint dignissimos exercitationem molestias aliquam dolorem fuga dolorum hic doloremque, placeat sed velit autem?
                            Consequatur id numquam, aperiam iste totam aut! Voluptas ea fugiat atque reprehenderit? Explicabo dolor nostrum quod odit neque, dolorem repellendus sunt. Debitis laborum obcaecati tempore necessitatibus consequuntur hic laboriosam sint.
                            Veniam quidem ab ratione sapiente molestiae culpa consectetur ullam, voluptates rem ducimus dignissimos debitis officiis accusamus libero. Sequi, rem facilis, commodi voluptatem praesentium fugit, ad eaque beatae aspernatur tempora tenetur.
                            Eaque veniam, quia aspernatur magni rerum soluta debitis beatae illo architecto perspiciatis vitae illum aliquid eveniet error necessitatibus facilis fuga officia rem, quisquam explicabo exercitationem ratione! Voluptatibus laboriosam id consequuntur!
                            Temporibus fuga eaque quae ipsum doloribus aliquid tempora nesciunt qui necessitatibus, aperiam iure corporis distinctio reiciendis voluptatibus magnam velit debitis! Non enim, delectus veniam cumque molestias expedita hic explicabo consectetur?</span>
                    </td>
                </tr>
            </tbody>
        </table>        

        <!-- Pagination -->
        <nav class="p-2 pb-4 flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900">1-10</span> of <span class="font-semibold text-gray-900">1000</span></span>
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">3</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">4</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">5</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    
    <script>
        new Readmore('#article', {
            speed: 75,
            collapsedHeight: 60,
            lessLink: '<a href="#" style="color: rgb(156 163 175)";>Read less</a>',
            moreLink: '<a href="#" style="color: rgb(156 163 175)";>Read more</a>'
        });
    </script>
    
</x-app-layout>
