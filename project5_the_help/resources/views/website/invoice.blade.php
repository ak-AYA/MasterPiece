@extends('website.main')
@section('title', 'Invoice')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<style>
    @media print {
        .no-print {
            display: none !important;
        }
        .print-only {
            display: block !important;
        }
        body {
            print-color-adjust: exact;
            -webkit-print-color-adjust: exact;
            background: white !important;
        }
        #invoice-section {
            padding: 0 !important;
            margin: 0 !important;
            background: white !important;
        }
        .shadow-lg {
            box-shadow: none !important;
        }
    }
    @page {
        margin: 20mm;
    }
    
    .invoice-header-gradient {
        background: linear-gradient(to right, #2563eb, #3b82f6);
    }
</style>

<div class="min-h-screen bg-gray-50  mt-5 pt-5" id="invoice-section">
    <div class="max-w-3xl mx-auto px-4 py-4 mt-5">
        {{-- Print Button --}}
        <div class="flex justify-end mb-6 no-print">
            <button onclick="window.print()" 
                    class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-150 ease-in-out shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Print Invoice
            </button>
        </div>

        {{-- Invoice Card --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            {{-- Invoice Header --}}
            <div class="invoice-header-gradient p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-white">INVOICE</h1>
                        <p class="text-blue-100 mt-1">Booking #{{ $booking->id }}</p>
                    </div>
                    <div class="text-right">
                        <div class="text-blue-100">Date Issued</div>
                        <div class="text-white font-medium">{{ \Carbon\Carbon::parse($booking->date)->format('d M, Y') }}</div>
                    </div>
                </div>
            </div>

            {{-- Invoice Content --}}
            <div class="p-6">
                {{-- Client & Service Info --}}
                <div class="grid md:grid-cols-2 gap-8">
                    {{-- Client Information --}}
                    <div class="space-y-1">
                        <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Client Information</h3>
                        <div class="border-l-4 border-blue-500 pl-3 mt-2">
                            <div class="text-gray-800 font-semibold text-lg">{{ $booking->user->name }}</div>
                            <div class="text-gray-600 text-sm">Client ID: #{{ $booking->user->id }}</div>
                        </div>
                    </div>

                    {{-- Service Information --}}
                    <div class="space-y-1">
                        <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Service Details</h3>
                        <div class="border-l-4 border-blue-500 pl-3 mt-2">
                            <div class="text-gray-800 font-semibold text-lg">{{ $booking->service->name }}</div>
                            <div class="text-gray-600 text-sm">
                                Time: {{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Payment Details --}}
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        {{-- Payment Method --}}
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Payment Method</h3>
                            <div class="mt-2 text-gray-800">{{ $booking->payment->name }}</div>
                        </div>

                        {{-- Total Amount --}}
                        <div class="text-right">
                            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Amount</h3>
                            <div class="mt-2 text-3xl font-bold text-blue-600">
                                {{ $booking->total_price }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Invoice Footer --}}
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="text-center text-gray-600">
                    <p class="font-medium">Thank you for your business!</p>
                    <p class="text-sm mt-1">Please keep this invoice for your records.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Add any needed JavaScript here
</script>


@endsection