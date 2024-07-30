<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Sales') }}
        </h2>
    </x-slot>

    <a href="{{ route('sales.index') }}">
        <div class="mb-4 flex gap-1 hover:bg-white hover:text-gray-500 shadow w-fit p-1 rounded-full">
            <svg class="ml-1" width="24" height="24" version="1.1" id="fi_329350" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path style="fill:#E8E8E8;" d="M256,0C114.608,0,0,114.608,0,256c0,141.376,114.608,256,256,256s256-114.624,256-256
                    C512,114.608,397.392,0,256,0z"></path>
                <g style="opacity:0.2;">
                    <polygon points="313.344,432.064 149.984,272 313.344,111.936 362.144,161.904 249.792,272 362.144,382.096"></polygon>
                </g>
                <polygon style="fill:#FFFFFF;" points="297.344,416.064 133.984,256 297.344,95.936 346.144,145.904 233.792,256 346.144,366.096"></polygon>
            </svg>
            <span class="text-gray-400 mr-2">Kembali</span>
        </div>
    </a>

    <div class="container h-full bg-white p-6 rounded flex flex-col xl:flex-row">
        <div class="xl:basis-1/3 w-full xl:w-52 xl:h-80 grid justify-items-center xl:flex xl:justify-center mb-4 xl:mb-0">
            <img src="{{ asset('storage/sales/' . $sales->img_url) }}" class="h-48 xl:h-80 object-cover rounded-lg">
        </div>
        <div class="xl:basis-2/3 px-4 flex flex-col">
            <div class="flex flex-col xl:grid xl:content-center h-full">
                <div class="font-bold text-2xl">
                    {{ $sales->name }}
                </div>
                <div class="text-justify mt-1 mb-6">
                    {{ $sales->description }}
                </div>
                <div class="flex flex-col xl:flex-row gap-4">
                    <div class="rounded-full w-fit shadow p-2 border border-gray-200 flex">
                        <svg id="fi_10134048" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg"><g id="g3107" stroke-linecap="round" stroke-linejoin="round"><path id="path3093" d="m12.000293 3c-.295468 0-.547924.144247-.738305.3203583-.190382.1761114-.343146.3914518-.484391.6329031-.282491.4829027-.52208 1.0811934-.755884 1.6916483-.2338032.6104551-.4579287 1.2305158-.6718969 1.7248562-.2139683.4943404-.4613277.8587294-.5215014.9044262-.060173.0456972-.4684937.1803248-.9844071.2402688-.5159132.0599445-1.1516608.0890511-1.7793548.1328315-.6276938.0437807-1.244861.1008602-1.771542.2324552-.2633406.0657977-.5075137.1484086-.7265863.2832436-.2190724.1348352-.4282437.339182-.519548.6329031-.091305.2937207-.036955.5923797.064455.8360567.1014097.243679.2517022.458902.4277484.673925.3520921.430046.8195814.856464 1.3027768 1.277526.4831955.421062.981605.835882 1.3652787 1.201344.3836738.365463.6371935.723049.6601779.796989.022984.07394.018943.521497-.085939 1.052886-.1048832.531387-.2736157 1.171339-.4277483 1.808851-.1541328.637515-.2948853 1.268061-.3379017 1.832295-.021508.282116-.021784.549266.033204.808708.054988.259444.1789444.533418.4179824.714947.2390382.181531.5262657.218897.7793223.193387.2530566-.0255.4941171-.106312.7441648-.214874.5000952-.21712 1.032069-.554203 1.5645037-.904427.5324335-.350224 1.0626295-.714091 1.5137195-.982562.451093-.268472.857293-.410215.931672-.410215.07437 0 .480579.141743.931671.410215.451091.268471.981288.632338 1.513721.982562.532435.350224 1.064409.687307 1.564505.904427.250047.108559.491109.189365.744164.214874.253057.0255.540284-.01186.779323-.193387.239038-.181529.362994-.455503.417981-.714947.05499-.259442.05471-.526592.03321-.808708-.04303-.564234-.18377-1.19478-.337902-1.832295-.154132-.637512-.322863-1.277464-.427748-1.808851-.104879-.531389-.108929-.978947-.08594-1.052886.02298-.07394.276505-.431526.660179-.796989.383673-.365462.882083-.780282 1.365278-1.201344.483196-.421062.950685-.84748 1.302778-1.277526.176046-.215023.326336-.430246.427748-.673925.101412-.243677.155754-.542336.06445-.8360567-.091312-.2937211-.300477-.4980679-.519549-.6329031-.219073-.134835-.463247-.2174458-.726587-.2832436-.52668-.1315956-1.143848-.1886745-1.771542-.2324552-.627693-.0437807-1.263442-.0728874-1.779354-.1328315-.515913-.059944-.924233-.1945719-.984407-.2402688-.060174-.0456967-.307534-.4100858-.521502-.9044262-.213969-.4943404-.438094-1.1144011-.671896-1.7248562-.233806-.6104549-.473395-1.2087456-.755885-1.6916483-.141245-.2414513-.294008-.4567917-.484391-.6329031-.190381-.1761113-.442837-.3203584-.738305-.3203583z" fill="#ffca28"></path><path id="path3100" d="m12 3c-.186253 0-.352704.059998-.5.1464844.08637.050714.16791.1087319.238281.1738281.190383.1761112.34313.3913614.484375.6328125.28249.4829022.522054 1.080952.75586 1.6914062.233801.6104545.457906 1.2302695.671875 1.7246094.213967.4943399.46131.8586002.521484.9042969.06017.045697.468463.1802904.984375.2402344.515911.059944 1.151605.089032 1.779297.1328125.627693.043781 1.244805.1008264 1.771484.2324218.26334.065798.50749.1483683.726563.2832032.219072.134835.428219.3390917.519531.6328125.0913.2937201.03696.5942141-.06445.8378901-.101412.243679-.251689.458806-.427734.673829-.352093.430045-.819539.856282-1.302735 1.277343-.483194.421062-.981562.835711-1.365234 1.201172-.383674.365463-.637177.722935-.660157.796875-.02299.07394-.01894.521346.08594 1.052735.104885.531386.273603 1.171082.427734 1.808593.154132.637515.294861 1.267798.337891 1.832032.0215.282115.02179.549152-.0332.808593-.05499.259444-.178931.533315-.417969.714844-.05733.04354-.117949.07935-.179687.107422.132134.04128.26459.07225.40039.08594.253057.0255.540258-.01183.779297-.19336.239038-.181529.362982-.4554.417969-.714844.05499-.259441.0547-.526478.0332-.808593-.04303-.564234-.183759-1.194517-.337891-1.832032-.154131-.637511-.322849-1.277207-.427734-1.808593-.104879-.531389-.108926-.978796-.08594-1.052735.02298-.07394.276483-.431412.660157-.796875.383672-.365461.88204-.78011 1.365234-1.201172.483196-.421061.950642-.847298 1.302735-1.277343.176045-.215023.326322-.43015.427734-.673829.101412-.243676.155757-.54417.06445-.8378901-.091312-.2937228-.300459-.4979795-.519531-.6328145-.219073-.1348349-.463223-.2174054-.726563-.2832032-.526679-.1315954-1.143791-.1886412-1.771484-.2324218-.627692-.0437807-1.263386-.0728685-1.779297-.1328125-.515912-.059944-.924201-.1945375-.984375-.2402344-.060174-.0456967-.307517-.409957-.521484-.9042969-.213969-.4943399-.438074-1.1141549-.671875-1.7246094-.233806-.6104542-.47337-1.208504-.75586-1.6914062-.141245-.2414511-.293992-.4567013-.484375-.6328125-.190381-.1761111-.442813-.3203126-.738281-.3203125z" fill="#ffc107"></path></g></svg>
                        <div class="px-3">
                            Leads points: <span class="font-semibold">{{ $sales->leads }}</span>
                        </div>
                        
                    </div>
                    <div class="rounded-full w-fit shadow p-2 border border-gray-200 flex">
                        <div class="flex">
                            <svg id="fi_9946341" height="24" viewBox="0 0 512 512" width="24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><g fill-rule="evenodd"><path d="m256.082.083c141.384 0 256 114.587 256 256.035 0 141.377-114.616 255.964-256 255.964s-255.999-114.582-255.999-255.964c0-141.448 114.623-256.035 255.999-256.035z" fill="#4caf50"></path><path d="m278.669 172.38a61.111 61.111 0 0 1 61.116 61.12 7.813 7.813 0 0 0 15.625 0 76.767 76.767 0 0 0 -76.741-76.733 7.806 7.806 0 1 0 0 15.611zm-11.793 49.978a7.806 7.806 0 1 1 0-15.611 40.078 40.078 0 0 1 40.1 40.09 7.813 7.813 0 0 1 -15.625 0 24.47 24.47 0 0 0 -24.47-24.479zm50.824 193.142c-24.677-4.358-49.029-15.679-70.285-28.662-24.588-15.036-47.555-33.778-67.927-54.156s-39.122-43.33-54.158-67.941c-12.972-21.253-24.323-45.612-28.657-70.276a34.681 34.681 0 0 1 .915-16.575 35.048 35.048 0 0 1 8.726-14.057l32.548-32.539a8.137 8.137 0 0 1 11.469 0l58.469 58.457a8.159 8.159 0 0 1 0 11.477l-31.074 31.083a13.124 13.124 0 0 0 -1.415 16.964 372.693 372.693 0 0 0 39.978 46.614 370.12 370.12 0 0 0 46.611 39.972 13.09 13.09 0 0 0 16.952-1.407l31.1-31.08a8.02 8.02 0 0 1 5.72-2.364 8.139 8.139 0 0 1 5.749 2.364l58.462 58.46a8.156 8.156 0 0 1 0 11.474l-32.549 32.542a33.612 33.612 0 0 1 -30.634 9.65zm-39.031-303.809a7.8 7.8 0 1 1 0-15.607 137.408 137.408 0 0 1 137.415 137.416 7.813 7.813 0 0 1 -15.626 0 121.8 121.8 0 0 0 -121.789-121.809z" fill="#fff"></path></g></svg>
                            <div class="font-normal px-3">
                                {{ $sales->phone_number }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
