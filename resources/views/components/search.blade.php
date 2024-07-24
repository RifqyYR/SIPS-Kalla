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
                else if (sector === 'FREE_FOOD') return 'Pesan Makanan';
                else if (sector === 'ICE_CREAM') return 'Es Krim Gratis';
                else if (sector === 'USED_CAR') return 'Mobil Bekas';
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

        function updatePaginationLinks(data) {
            $("#pagination-links").html(
                `<span class="text-sm font-normal text-gray-500 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                Showing <span class="font-semibold text-gray-900">${data.firstItem}-${data.lastItem}</span> of
                <span class="font-semibold text-gray-900">${data.total}</span>
                </span>`
            );

            $("#pagination-links").append(data.links);
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
            }
        }

        $("#table-search").on("keyup", function() {
            var query = $(this).val();
            fetchSearchResults(query);
        });
    });
</script>
