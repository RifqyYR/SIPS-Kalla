@vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- HighCharts --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
{{-- ReadmoreJS --}}
<script src="https://cdn.jsdelivr.net/npm/readmore-js@3.0.0-beta-1/dist/readmore.min.js"></script>
{{-- JQuery --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
{{-- Alpine JS --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
{{-- Sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js"></script>

<script src="{{ url('js/main.js') }}"></script>

@if (request()->routeIs('dashboard'))
    <script src="js/chart.js"></script>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var imgInput = document.getElementById('imgInput');
        if (imgInput) {
            imgInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imgPreview = document.getElementById('imgPreview');
                        imgPreview.src = e.target.result;
                        imgPreview.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>

{{-- Alert For Success or Error --}}
<script>
    @if (session()->has('success'))
        Swal.fire({
            position: "center",
            icon: "success",
            confirmButtonColor: '#01803D',
            title: '{{ session('success') }}',
        });
    @elseif (session()->has('error'))
        Swal.fire({
            position: "center",
            icon: "error",
            confirmButtonColor: '#01803D',
            title: '{{ session('error') }}',
        });
    @endif
</script>

{{-- Search Function --}}
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
            $("#search-results").html("");
            $.each(data.data.data, function(index, item) {
                $("#search-results").append(
                    '<tr class="bg-white border-b hover:bg-gray-50">' +
                    '<td class="w-4 p-4 text-center"><span>' + (index + 1) + "</span></td>" +
                    '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' +
                    item.name + "</td>" +
                    '<td class="px-6 py-4">' + item.phone_number + "</td>" +
                    '<td class="px-6 py-4">' + item.sector + "</td>" +
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
            updatePaginationLinks(data);
        }

        function updateSearchResultsSales(data) {
            $("#search-results").html("");
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
            updatePaginationLinks(data);
        }

        function updateSearchResultsCustomer(data) {
            $("#search-results").html("");
            $.each(data.data.data, function(index, item) {
                $("#search-results").append(
                    '<tr class="bg-white border-b hover:bg-gray-50">' +
                    '<td class="w-4 p-4 text-center"><span>' + (index + 1) + "</span></td>" +
                    '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' +
                    item.name + "</td>" +
                    '<td class="px-6 py-4">' + item.email + "</td>" +
                    '<td class="px-6 py-4">' + item.phone_number + "</td>" +
                    '<td class="px-6 py-4">' + item.address + "</td>" +
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
            $.each(data.data.data, function(index, item) {
                $("#search-results").append(
                    '<tr class="bg-white border-b hover:bg-gray-50">' +
                    '<td class="w-4 p-4 text-center"><div class="flex justify-center"><span>' + (
                        index + 1) + "</span></div></td>" +
                    '<td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' +
                    item.client.name + "</td>" +
                    '<td class="px-6 py-4">' + (item.type === 'BOOK' ? 'Servis Reservasi' :
                        'Servis Kunjungan') + "</td>" +
                    '<td class="px-6 py-4">' + item.date + "</td>" +
                    '<td class="px-6 py-4">' + item.time + "</td>" +
                    '<td class="px-6 py-4"><span class="' + serviceStatus(item.status)[1] + '">' +
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

{{-- Customer Cars in create-customer page --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carCountInput = document.getElementById('car_count');
        const carFieldsContainer = document.getElementById('car_fields_container');

        if (carCountInput) {
            carCountInput.addEventListener('change', function() {
                const carCount = parseInt(this.value);
                generateCarFields(carCount);
            });
        }

        function generateCarFields(carCount) {
            carFieldsContainer.innerHTML = ''; // Clear any existing fields

            for (let i = 0; i < carCount; i++) {
                const carFieldset = document.createElement('div');
                carFieldset.classList.add('mt-4');
                carFieldset.innerHTML = `
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mt-6">Mobil ${i + 1}</h3>

                    <div class="mt-4">
                        <x-input-label :value="'Tipe Mobil ${i + 1}'" />
                        <x-text-input id="car_type_${i}" class="block mt-1 w-full" type="text" name="car_type[]" :value="old('car_type.${i}')"
                            required autofocus autocomplete="car_type_${i}" />
                        <x-input-error :messages="$errors->get('car_type.${i}')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label :value="'Plat Kendaraan ${i + 1}'" />
                        <x-text-input id="plate_number_${i}" class="block mt-1 w-full" type="text" name="plate_number[]" :value="old('plate_number.${i}')"
                            required autofocus autocomplete="plate_number_${i}" />
                        <x-input-error :messages="$errors->get('plate_number.${i}')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label :value="'Jarak Tempuh (Km) ${i + 1}'" />
                        <x-text-input id="last_service_km_${i}" class="block mt-1 w-full" type="number" name="last_service_km[]" :value="old('last_service_km.${i}')"
                            required autofocus autocomplete="last_service_km_${i}" min="0" />
                        <x-input-error :messages="$errors->get('last_service_km.${i}')" class="mt-2" />
                    </div>
                `;
                carFieldsContainer.appendChild(carFieldset);
            }
        }
    });
</script>

{{-- Customer Cars in create-car page --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carCountInput = document.getElementById('car_count_create');
        const carFieldsContainer = document.getElementById('car_fields_container');

        if (carCountInput) {
            carCountInput.addEventListener('change', function() {
                const carCount = parseInt(this.value);
                generateCarFields(carCount);
            });
        }

        function generateCarFields(carCount) {
            carFieldsContainer.innerHTML = ''; // Clear any existing fields

            for (let i = 0; i < carCount; i++) {
                const carFieldset = document.createElement('div');
                carFieldset.classList.add('mt-4');
                const currentDate = new Date().toISOString().split('T')[0];
                carFieldset.innerHTML = `
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mt-6">Mobil ${i + 1}</h3>

                    <div class="mt-4">
                        <x-input-label :value="'Tipe Mobil ${i + 1}'" />
                        <x-text-input id="car_type_${i}" class="block mt-1 w-full" type="text" name="car_type[]" :value="old('car_type.${i}')"
                            required autofocus autocomplete="car_type_${i}" />
                        <x-input-error :messages="$errors->get('car_type.${i}')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label :value="'Plat Kendaraan ${i + 1}'" />
                        <x-text-input id="plate_number_${i}" class="block mt-1 w-full" type="text" name="plate_number[]" :value="old('plate_number.${i}')"
                            required autofocus autocomplete="plate_number_${i}" />
                        <x-input-error :messages="$errors->get('plate_number.${i}')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label :value="'Jadwal Service Terakhir ${i + 1}'" />
                        <x-text-input id="last_service_date_${i}" class="block mt-1 w-fit" type="date" name="last_service_date[]" :value="old('last_service_date.${i}')"
                            required autofocus autocomplete="last_service_date_${i}" min='${currentDate}' />
                        <x-input-error :messages="$errors->get('last_service_date.${i}')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label :value="'Jarak Tempuh (Km) ${i + 1}'" />
                        <x-text-input id="last_service_km_${i}" class="block mt-1 w-full" type="number" name="last_service_km[]" :value="old('last_service_km.${i}')"
                            required autofocus autocomplete="last_service_km_${i}" min="0" />
                        <x-input-error :messages="$errors->get('last_service_km.${i}')" class="mt-2" />
                    </div>
                `;
                carFieldsContainer.appendChild(carFieldset);
            }
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modalToggleElement = document.querySelector('[data-modal-toggle="update-modal"]');
        if (modalToggleElement) {
            modalToggleElement.addEventListener('click', function() {
                window.dispatchEvent(new CustomEvent('open-modal', {
                    detail: 'update-modal'
                }));
            });
        }
    });
</script>
