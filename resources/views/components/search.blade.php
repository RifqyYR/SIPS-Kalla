<script>
    $(document).ready(function() {
        function updateSearchResults(data) {
            $("#search-results").html("");
            if (data.data.data.length !== 0) {
                $.each(data.data.data, function(index, admin) {
                    $("#search-results").append(
                        '<tr class="bg-white border-b hover:bg-gray-50">' +
                        '<td class="w-4 p-4 text-center"><span>' + (index + 1) + "</span></td>" +
                        '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' +
                        admin.name + "</td>" +
                        '<td class="px-6 py-4">' + admin.email + "</td>" +
                        `<td class="px-6 py-4">
                            <a href="/admin-management/edit/${admin.uuid}">
                                <x-secondary-button class="mb-1 font-medium text-blue-600 sm:font-medium sm:text-blue-600 sm:mr-1">
                                    Edit
                                </x-secondary-button>
                            </a>
                            <x-danger-button onclick="confirmDelete('${admin.uuid}')">
                                <a href="#" class="font-medium text-white">Delete</a>
                            </x-danger-button></td>` +
                        "</tr>"
                    );
                });
            } else {
                $("#search-results").append(
                    '<tr class="bg-white border-b hover:bg-gray-50">' +
                    '<td colspan="4" class="px-6 py-4 font-medium text-gray-900 text-center">' +
                    'Data tidak ditemukan' + "</td>" +
                    "</tr>"
                );
            }
            updatePaginationLinks(data);
        }

        function updateSearchResultsPIC(data) {
            function convertSector(sector) {
                if (sector === 'BOOK_SERVICE') return 'Servis Reservasi';
                else if (sector === 'VISIT_SERVICE') return 'Servis Kunjungan';
                else if (sector === 'PICK_UP') return 'Antar Jemput';
                else if (sector === 'FREE_DRINK') return 'Minuman Gratis';
                else if (sector === 'FOOD_ORDER') return 'Pesan Makanan';
                else if (sector === 'ICE_CREAM') return 'Es Krim Gratis';
                else if (sector === 'USED_CAR') return 'Mobil Bekas';
                else if (sector === 'SPAREPART') return 'Sparepart';
                else return 'Tidak Terdaftar';
            }

            $("#search-results").html("");
            if (data.data.data.length !== 0) {
                $.each(data.data.data, function(index, item) {
                    $("#search-results").append(
                        '<tr class="bg-white border-b hover:bg-gray-50">' +
                        '<td class="w-4 p-4 text-center"><span>' + (index + 1) + "</span></td>" +
                        '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' +
                        item.name + "</td>" +
                        '<td class="px-6 py-4">' + item.phone_number + "</td>" +
                        '<td class="px-6 py-4">' + convertSector(item.sector) + "</td>" +
                        `<td class="px-6 py-4">
                        <a href="/pic/edit/${item.uuid}">
                            <x-secondary-button class="mb-1 font-medium text-blue-600 sm:font-medium sm:text-blue-600 sm:mr-1">
                                Edit
                            </x-secondary-button>
                        </a>
                        <x-danger-button onclick="confirmDelete('${item.uuid}')">
                            <a href="#" class="font-medium text-white">Delete</a>
                        </x-danger-button></td>` +
                        "</tr>"
                    );
                });
            } else {
                $("#search-results").append(
                    '<tr class="bg-white border-b hover:bg-gray-50">' +
                    '<td colspan="5" class="px-6 py-4 font-medium text-gray-900 text-center">' +
                    'Data tidak ditemukan' + "</td>" +
                    "</tr>"
                );
            }
            updatePaginationLinks(data);
        }

        function updateSearchResultsSales(data) {
            $("#search-results").html("");
            if (data.data.data.length !== 0) {
                $.each(data.data.data, function(index, item) {
                    $("#search-results").append(
                        '<tr class="bg-white border-b hover:bg-gray-50">' +
                        '<td class="w-4 p-4 text-center"><span>' + (index + 1) + "</span></td>" +
                        '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' +
                        `<a class="hover:text-blue-600" href="/sales/edit/${item.uuid}">` +
                        item.name + "</a>" + "</td>" +
                        '<td class="px-6 py-4">' + item.phone_number + "</td>" +
                        '<td class="px-6 py-4">' + item.leads + "</td>" +
                        `<td class="px-6 py-4">
                            <a href="/sales/edit/${item.uuid}">
                                <x-secondary-button class="mb-1 font-medium text-blue-600 sm:font-medium sm:text-blue-600 sm:mr-1">
                                    Edit
                                </x-secondary-button>
                            </a>
                            <x-danger-button onclick="confirmDelete('${item.uuid}')">
                                <a href="#" class="font-medium text-white">Delete</a>
                            </x-danger-button></td>` +
                        "</tr>"
                    );
                });
            } else {
                $("#search-results").append(
                    '<tr class="bg-white border-b hover:bg-gray-50">' +
                    '<td colspan="5" class="px-6 py-4 font-medium text-gray-900 text-center">' +
                    'Data tidak ditemukan' + "</td>" +
                    "</tr>"
                );
            }
            updatePaginationLinks(data);
        }

        function updateSearchResultsCustomer(data) {
            $("#search-results").html("");
            if (data.data.data.length !== 0) {
                $.each(data.data.data, function(index, item) {
                    $("#search-results").append(
                        '<tr class="bg-white border-b hover:bg-gray-50">' +
                        '<td class="w-4 p-4 text-center"><span>' + (index + 1) + "</span></td>" +
                        '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' +
                        `<a class="hover:text-blue-600" href="/customer/edit/${item.uuid}">` +
                        item.name + "</a>" + "</td>" +
                        '<td class="px-6 py-4">' + item.email + "</td>" +
                        '<td class="px-6 py-4">' + item.phone_number + "</td>" +
                        '<td class="px-6 py-4">' + item.address + "</td>" +
                        `<td class="px-6 py-4">
                        <a href="/customer/edit/${item.uuid}">
                            <x-secondary-button class="mb-1 font-medium text-blue-600 sm:font-medium sm:text-blue-600 sm:mr-1">
                                Edit
                            </x-secondary-button>
                        </a>
                        <x-danger-button onclick="confirmDelete('${item.uuid}')">
                            <a href="#" class="font-medium text-white">Delete</a>
                        </x-danger-button></td>` +
                        "</tr>"
                    );
                });
            } else {
                $("#search-results").append(
                    '<tr class="bg-white border-b hover:bg-gray-50">' +
                    '<td colspan="6" class="px-6 py-4 font-medium text-gray-900 text-center">' +
                    'Data tidak ditemukan' + "</td>" +
                    "</tr>"
                );
            }
            updatePaginationLinks(data);
        }

        function updateSearchResultsService(data) {
            function serviceStatus(serviceStatus) {
                if (serviceStatus === 'WAITING') {
                    status = 'Menunggu';
                    classStatus = 'bg-yellow-500 p-2 rounded-lg text-white';
                    return [status, classStatus];
                } else if (serviceStatus === 'CONFIRMED') {
                    status = 'Dikonfirmasi';
                    classStatus = 'bg-green-500 p-2 rounded-lg text-white';
                    return [status, classStatus];
                } else if (serviceStatus === 'CANCELLED') {
                    status = 'Ditolak';
                    classStatus = 'bg-red-500 p-2 rounded-lg text-white';
                    return [status, classStatus];
                } else {
                    status = 'Selesai';
                    classStatus = 'bg-blue-500 p-2 rounded-lg text-white';
                    return [status, classStatus];
                }
            }
            $("#search-results").html("");
            if (data.data.data.length !== 0) {
                $.each(data.data.data, function(index, item) {
                    $("#search-results").append(
                        '<tr class="bg-white border-b hover:bg-gray-50">' +
                        '<td class="w-4 p-4 text-center"><div class="flex justify-center"><span>' +
                        (
                            index + 1) + "</span></div></td>" +
                        '<td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' +
                        (item.client === null ? 'Tidak ada data' : item.client.name) + "</td>" +
                        '<td class="px-6 py-4">' + (item.type === 'BOOK' ? 'Servis Reservasi' :
                            'Servis Kunjungan') + "</td>" +
                        '<td class="px-6 py-4">' + item.date + "</td>" +
                        '<td class="px-6 py-4">' + item.time + "</td>" +
                        '<td class="px-6 py-4"><span class="' + serviceStatus(item.status)[1] +
                        '">' +
                        serviceStatus(item.status)[0] +
                        "</span></td>" +
                        `<td class="px-6 py-4 text-nowrap">
                        <a href="/service/edit/${item.uuid}">
                            <x-secondary-button class="font-medium text-blue-600">
                                Edit
                            </x-secondary-button>
                        </a>
                        <x-danger-button onclick="confirmDelete('${item.uuid}')">
                            <a href="#" class="font-medium text-white">Hapus</a>
                        </x-danger-button></td>` +
                        "</tr>"
                    );
                });
            } else {
                $("#search-results").append(
                    '<tr class="bg-white border-b hover:bg-gray-50">' +
                    '<td colspan="7" class="px-6 py-4 font-medium text-gray-900 text-center">' +
                    'Data tidak ditemukan' + "</td>" +
                    "</tr>"
                );
            }
            updatePaginationLinks(data);
        }

        function updateSearchResultsCatalog(data) {
            function convertStatus(type) {
                if (type == 'NEW') {
                    status = 'Baru';
                    class_status = 'bg-blue-500 rounded-xl px-3 py-1 text-white border border-blue-500';
                    return [status, class_status];
                } else {
                    status = 'Bekas';
                    class_status = 'bg-gray-500 rounded-xl px-3 py-1 text-white border border-gray-500';
                    return [status, class_status];
                }
            }

            $("#search-results").html("");
            if (data.data.data.length !== 0) {
                $('#search-results').addClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mb-6 gap-6 xl:gap-12');
                $.each(data.data.data, function(index, item) {
                    stats = convertStatus(item.type);
                    $("#search-results").append(
                        `<x-card-catalog>
                            <x-slot name="type">
                                <span class="`+ stats[1] + `">
                                    ` + stats[0] + `
                                </span>
                            </x-slot>
                            <x-slot name="icon">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button class="focus:outline-none transition ease-in-out duration-150">
                                            <svg class="w-4 h-4" id="fi_2311524" enable-background="new 0 0 32 32"
                                                height="512" viewBox="0 0 32 32" width="512"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_294_"
                                                    d="m13 16c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z"></path>
                                                <path id="XMLID_295_"
                                                    d="m13 26c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z"></path>
                                                <path id="XMLID_297_"
                                                    d="m13 6c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z"></path>
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name='content'>
                                        <x-dropdown-link href="/car-catalog/edit/${item.uuid}">
                                            Edit
                                        </x-dropdown-link>
                                        <x-dropdown-link onclick="confirmDelete('${item.uuid }')">
                                            Hapus
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
                            </x-slot>
                            <x-slot name="img">
                                <img class="w-fit xl:w-60 rounded-sm"
                                    src="{{ asset('/storage/catalog_cars/${item.images[0].img_url}') }}"
                                    alt=" ` + item.name + `">
                            </x-slot>
                            <x-slot name="name">`+ item.name +`</x-slot>
                            <x-slot name="detail">
                                <a href="/car-catalog/detail/${item.uuid}">
                                    <div class="px-2 bg-[#01803D] text-center rounded-lg mb-4">
                                        <span class="font-semibold xl:text-lg text-white">Detail</span>
                                    </div>
                                </a>
                            </x-slot>
                        </x-card-catalog>`
                    );
                });
            } else {
                $('#search-results').removeClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mb-6 gap-6 xl:gap-12');
                $("#search-results").append(
                    '<div class="mb-6 text-center text-gray-500">' + 
                        '<span>' + 'Belum ada data' + '</span>' +
                    '</div>'
                );
            }
            updatePaginationLinksImg(data);
        }

        function updateSearchResultsSparepart(data) {
            $("#search-results").html("");
            if (data.data.data.length !== 0) {
                $('#search-results').addClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mb-6 gap-6 xl:gap-12');
                $.each(data.data.data, function(index, item) {
                    $("#search-results").append(
                        `<x-card-sparepart>
                            <x-slot name="image">
                                <a href="/sparepart/detail/${item.uuid}">
                                    <img src="{{ asset('/storage/sparepart/${item.img_url}') }}"
                                        alt="`+item.name+`"
                                        class="rounded-md max-w-full h-60">
                                </a>
                            </x-slot>
                            <x-slot name="title">
                                <a href="/sparepart/detail'${item.uuid}">
                                    `+item.name+`
                                </a>
                            </x-slot>
                            <x-slot name="price">`+Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.price).replace(",00","")+`</x-slot>
                            <x-slot name="icon">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button class="focus:outline-none transition ease-in-out duration-150">
                                            <svg class="w-4 h-4" id="fi_2311524" enable-background="new 0 0 32 32"
                                                height="512" viewBox="0 0 32 32" width="512"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_294_"
                                                    d="m13 16c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z">
                                                </path>
                                                <path id="XMLID_295_"
                                                    d="m13 26c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z">
                                                </path>
                                                <path id="XMLID_297_"
                                                    d="m13 6c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z">
                                                </path>
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name='content'>
                                        <x-dropdown-link href="/sparepart/edit/${item.uuid}">
                                            Edit
                                        </x-dropdown-link>
                                        <x-dropdown-link onclick="confirmDelete('${item.uuid})">
                                            Hapus
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
                            </x-slot>
                        </x-card-sparepart>`
                    );
                });
            } else {
                $('#search-results').removeClass('grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mb-6 gap-6 xl:gap-12');
                $("#search-results").append(
                    '<div class="mb-6 text-center text-gray-500">' + 
                        '<span>' + 'Belum ada data' + '</span>' +
                    '</div>'
                );
            }
            updatePaginationLinksImg(data);
        }

        function updatePaginationLinks(data) {
            $("#pagination-links").html(
                `<span class="text-sm font-normal text-gray-500 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                Showing <span class="font-semibold text-gray-900">${data.firstItem}-${data.lastItem}</span> of
                <span class="font-semibold text-gray-900">${data.total}</span>
                </span>`
            );

            $("#pagination-links").append(data.links);
        }

        function updatePaginationLinksImg(data) {
            $("#pagination-links-img").append(data.data.links);
        }

        function fetchSearchResults(query) {
            if (window.location.pathname == '/admin-management') {
                $.ajax({
                    url: "/admin-management/search",
                    type: "GET",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        updateSearchResults(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", status, error);
                    }
                });
            } else if (window.location.pathname == '/pic') {
                $.ajax({
                    url: "/pic/search",
                    type: "GET",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        updateSearchResultsPIC(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", status, error);
                    }
                });
            } else if (window.location.pathname == '/sales') {
                $.ajax({
                    url: "/sales/search",
                    type: "GET",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        updateSearchResultsSales(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", status, error);
                    }
                });
            } else if (window.location.pathname == '/customer') {
                $.ajax({
                    url: "/customer/search",
                    type: "GET",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        updateSearchResultsCustomer(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", status, error);
                    }
                });
            } else if (window.location.pathname == '/service') {
                $.ajax({
                    url: "/service/search",
                    type: "GET",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        updateSearchResultsService(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", status, error);
                    }
                });
            } else if (window.location.pathname == '/car-catalog') {
                $.ajax({
                    url: "/car-catalog/search",
                    type: "GET",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        updateSearchResultsCatalog(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", status, error);
                    }
                });
            } else if (window.location.pathname == '/sparepart') {
                $.ajax({
                    url: "/sparepart/search",
                    type: "GET",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        updateSearchResultsSparepart(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", status, error);
                    }
                });
            }
        }

        $("#table-search").on("keyup", function() {
            var query = $(this).val();
            fetchSearchResults(query);
        });
    });
</script>
