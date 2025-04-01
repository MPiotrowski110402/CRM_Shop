<!-- resources/views/components/sidebar.blade.php -->
<div class="w-64 min-h-screen bg-gray-800 text-white">
    <div class="p-4 text-xl font-bold">CRM Dashboard</div>
    <ul>
        <!-- Zarządzanie Klientami -->
        <li x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-3 hover:bg-gray-600">Zarządzanie Klientami</button>
            <ul x-show="open" class="pl-4">
                <li><a href="/clients" class="block p-2 hover:bg-gray-700">Lista klientów</a></li>
                <li><a href="/purchase_history" class="block p-2 hover:bg-gray-700">Historia zakupów</a></li>
                <li><a href="/communication" class="block p-2 hover:bg-gray-700">Komunikacja</a></li>
                <li><a href="/client_segmentation" class="block p-2 hover:bg-gray-700">Segmentacja klientów</a></li>
            </ul>
        </li>
        
        <!-- Zamówienia -->
        <li x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-3 hover:bg-gray-600">Zamówienia</button>
            <ul x-show="open" class="pl-4">
                <li><a href="/products" class="block p-2 hover:bg-gray-700">Lista zamówień</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Szczegóły zamówień</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Statusy zamówień</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Zwroty i reklamacje</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Faktury</a></li>
            </ul>
        </li>
        
        <!-- Produkty -->
        <li x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-3 hover:bg-gray-600">Produkty</button>
            <ul x-show="open" class="pl-4">
                <li><a href="#" class="block p-2 hover:bg-gray-700">Lista produktów</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Dodawanie/edycja produktów</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Zarządzanie stanem magazynowym</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Promocje i rabaty</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Opinie klientów</a></li>
            </ul>
        </li>
        <!-- Finanse i rozliczenia -->
        <li x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-3 hover:bg-gray-600">Finanse i rozliczenia</button>
            <ul x-show="open" class="pl-4">
                <li><a href="#" class="block p-2 hover:bg-gray-700">Faktury sprzedażowe</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Raporty finansowe</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Koszty operacyjne</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Integracja z systemami płatności</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Prognoza sprzedaży</a></li>
            </ul>
        </li>
        <!-- Obsługa użytkowników -->
        <li x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-3 hover:bg-gray-600">Obsługa użytkowników</button>
            <ul x-show="open" class="pl-4">
                <li><a href="#" class="block p-2 hover:bg-gray-700">Zarządzanie administratorami</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Role i uprawnienia</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Logi aktywności</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">zmiana ustawień systemu</a></li>
            </ul>
        </li>
        <!-- Raporty i analityka -->
        <li x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-3 hover:bg-gray-600">Raporty i analityka</button>
            <ul x-show="open" class="pl-4">
                <li><a href="#" class="block p-2 hover:bg-gray-700">sprzedaż w czasie rzeczywistym</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">analiza klientów</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Skuteczność kampanii marketingowej</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Statystyki odwiedzin i konwersji</a></li>
            </ul>
        </li>
        <!-- Marketing i komunikacja -->
        <li x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-3 hover:bg-gray-600">Marketing i komunikacja</button>
            <ul x-show="open" class="pl-4">
                <li><a href="#" class="block p-2 hover:bg-gray-700">Kampanie e-mail/SMS</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Newslettery</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Automatyzacja marketingu</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Retargeting klientów</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">System powiadomień</a></li>
            </ul>
        </li>
        <!-- Magazyn i logistyka -->
        <li x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-3 hover:bg-gray-600">Magazyn i logistyka</button>
            <ul x-show="open" class="pl-4">
                <li><a href="#" class="block p-2 hover:bg-gray-700">Stan magazynu</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Automatyczne powiadomienie o brakach</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Integracja z firmami kurierskimi</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">sledzenie przesyłek</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Zarządzanie dostawcami</a></li>
            </ul>
        </li>
        <!-- ustawienia systemowe -->
        <li x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left p-3 hover:bg-gray-600">Ustawienia systemowe</button>
            <ul x-show="open" class="pl-4">
                <li><a href="#" class="block p-2 hover:bg-gray-700">Konfiguracja sklepu</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Integracja z API</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Backup Danych</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Import/Export danych</a></li>
                <li><a href="#" class="block p-2 hover:bg-gray-700">Powiadomienia systemowe</a></li>
            </ul>
        </li>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
