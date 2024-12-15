<div class="max-w-[480px] mx-auto bg-white min-h-screen relative shadow-lg pb-32">
    <!-- Header -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white z-50">
        <div class="flex items-center h-16 px-4 border-b border-gray-100">
            <button onclick="history.back()" class="p-2 hover:bg-gray-50 rounded-full">
                <i class="bi bi-arrow-left text-xl"></i>
            </button>
            <h1 class="ml-2 text-lg font-medium">Cart</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="pt-16 px-4">
        <!-- Store Section -->
        <div class="pt-4">
            <div class="flex items-center gap-2 mb-4">
                <i class="bi bi-shop text-lg text-primary"></i>
                <span class="font-medium">BulanBintang2025</span>
            </div>

            <!-- Cart Items -->
            <div class="space-y-4">
                <!-- Cart Item 1 -->
                <div class="flex gap-3 pb-4 border-b border-gray-100">
                    <!-- Checkbox -->
                    <div class="pt-1">
                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                    </div>

                    <!-- Product Image -->
                    <div class="flex-shrink-0">
                        <img src="https://bbhqwp.sgp1.cdn.digitaloceanspaces.com/wp-content/uploads/2024/05/25071835/DUCHESS-OFF-WHITE-MEDIUM-1010x1010.jpg"
                            alt="Kaos Polos Motif Putih"
                            class="w-20 h-20 object-cover rounded-lg">
                    </div>

                    <!-- Product Details -->
                    <div class="flex-1">
                        <h3 class="text-sm font-medium line-clamp-2">Baju Melayu Duchess</h3>
                        {{-- <p class="text-xs text-gray-500 mt-1">Putih, M</p> --}}
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-primary font-semibold">RM 209.00</span>
                            <div class="flex items-center border border-gray-200 rounded-lg">
                                <button class="px-2 py-1 text-gray-500 hover:text-primary">-</button>
                                <input type="number" value="1" class="w-12 text-center border-x border-gray-200 py-1 text-sm">
                                <button class="px-2 py-1 text-gray-500 hover:text-primary">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cart Item 2 -->
                <div class="flex gap-3 pb-4 border-b border-gray-100">
                    <div class="pt-1">
                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                    </div>
                    <div class="flex-shrink-0">
                        <img src="https://bbhqwp.sgp1.cdn.digitaloceanspaces.com/wp-content/uploads/2024/05/24135515/ELAINA-PEARL-WHITE-MEDIUM-1010x1010.jpg"
                            alt="Kaos Polos Abu Motif"
                            class="w-20 h-20 object-cover rounded-lg">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-medium line-clamp-2">Kurung Elaina</h3>
                        {{-- <p class="text-xs text-gray-500 mt-1">Abu-abu, L</p> --}}
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-primary font-semibold">RM 229.00</span>
                            <div class="flex items-center border border-gray-200 rounded-lg">
                                <button class="px-2 py-1 text-gray-500 hover:text-primary">-</button>
                                <input type="number" value="1" class="w-12 text-center border-x border-gray-200 py-1 text-sm">
                                <button class="px-2 py-1 text-gray-500 hover:text-primary">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shipping Options -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
            <h3 class="font-medium mb-3">Delivery</h3>
            <div class="flex items-center justify-between text-sm">
                <div>
                    <p class="text-gray-600">Standard</p>
                    <p class="text-xs text-gray-500">Estimed delivery 2-3 days</p>
                </div>
                <span class="text-primary font-medium">RM 16.50</span>
            </div>
        </div>

        <!-- Vouchers -->
        <div class="mt-4 p-4 bg-gray-50 rounded-lg">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="bi bi-ticket-perforated text-primary"></i>
                    <span class="text-sm font-medium">Voucher Discount</span>
                </div>
                <button class="text-primary text-sm">Enter Voucher</button>
            </div>
        </div>
    </div>

    <!-- Bottom Section - Price Summary & Checkout -->
    <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white border-t border-gray-100 p-4 z-50">
        <!-- Price Summary -->
        <div class="flex justify-between items-start mb-4">
            <div>
                <p class="text-sm text-gray-600">Total Payment:</p>
                <p class="text-lg font-semibold text-primary">RM 454.50</p>
            </div>
            <div class="text-right">
                <p class="text-xs text-gray-500">2 Items</p>
            </div>
        </div>

        <!-- Checkout Button -->
        <button class="w-full h-12 flex items-center justify-center rounded-full bg-primary text-white font-medium hover:bg-primary/90 transition-colors">
            Checkout
        </button>
    </div>
</div>
