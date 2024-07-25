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
{{-- XZOOM --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.min.js" integrity="sha512-kKt0oznSOD4MQo2nWJDWggE968N4Bvwn1VRr0RfMx1ozdC2FLCVLJDuHoeMfbWZU/F50yANpekr6dNTVfaLKdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ url('js/main.js') }}"></script>

<x-tinymce />

<x-alert />

<x-search />

@if (request()->routeIs('dashboard'))
    <script src="js/chart.js"></script>
@endif

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