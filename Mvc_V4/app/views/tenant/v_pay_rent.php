<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">Pay Rent</h1>
            <p class="text-muted-foreground mt-2">Make your rent payments securely</p>
        </div>

        <!-- Current Rent Due -->
        <div class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Current Rent Due</h3>
            </div>
            
            <div class="p-6">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex-1">
                        <h4 class="font-semibold text-foreground text-lg"><?php echo $rent_info['property']; ?></h4>
                        <div class="flex items-center space-x-4 mt-2">
                            <div class="flex items-center text-muted-foreground">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                <span class="text-2xl font-bold text-primary">$<?php echo $rent_info['amount']; ?></span>
                            </div>
                            <div class="flex items-center text-muted-foreground">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4h3a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h3z"></path>
                                </svg>
                                <span>Due: <?php echo date('F j, Y', strtotime($rent_info['due_date'])); ?></span>
                            </div>
                        </div>
                    </div>
                    <span class="status-badge bg-destructive text-destructive-foreground">Due</span>
                </div>

                <div id="paymentSuccess" class="hidden bg-success-light p-6 rounded-lg text-center">
                    <svg class="w-12 h-12 text-success mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <h4 class="text-xl font-semibold text-success mb-2">Payment Successful!</h4>
                    <p class="text-foreground">Your rent payment has been processed successfully.</p>
                </div>

                <div id="paymentForm" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Payment Method</label>
                            <select id="paymentMethod" class="form-input">
                                <option value="card">Credit/Debit Card</option>
                                <option value="bank">Bank Transfer</option>
                                <option value="paypal">PayPal</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Amount</label>
                            <input type="number" value="<?php echo $rent_info['amount']; ?>" readonly class="form-input bg-muted">
                        </div>
                    </div>

                    <div id="cardFields" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Card Number</label>
                            <input type="text" placeholder="1234 5678 9012 3456" class="form-input">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Expiry Date</label>
                            <input type="text" placeholder="MM/YY" class="form-input">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">CVV</label>
                            <input type="text" placeholder="123" class="form-input">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Cardholder Name</label>
                            <input type="text" placeholder="John Doe" class="form-input">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1">Payment Notes (Optional)</label>
                        <textarea placeholder="Add any notes about your payment..." class="form-input min-h-20"></textarea>
                    </div>

                    <button onclick="processPayment()" id="payButton" class="btn-primary w-full">
                        Pay $<?php echo $rent_info['amount']; ?>
                    </button>
                </div>
            </div>
        </div>

        <!-- Payment History -->
        <div class="dashboard-card animate-scale-in">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Payment History</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-muted">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Date</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Property</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Amount</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <tr class="hover:bg-sidebar-hover">
                            <td class="px-6 py-4 text-sm text-foreground">December 1, 2023</td>
                            <td class="px-6 py-4 text-sm text-foreground">Oak Street Apartment</td>
                            <td class="px-6 py-4 text-sm font-medium text-foreground">$1200</td>
                            <td class="px-6 py-4"><span class="status-badge bg-success-light text-success">Paid</span></td>
                        </tr>
                        <tr class="hover:bg-sidebar-hover">
                            <td class="px-6 py-4 text-sm text-foreground">November 1, 2023</td>
                            <td class="px-6 py-4 text-sm text-foreground">Oak Street Apartment</td>
                            <td class="px-6 py-4 text-sm font-medium text-foreground">$1200</td>
                            <td class="px-6 py-4"><span class="status-badge bg-success-light text-success">Paid</span></td>
                        </tr>
                        <tr class="hover:bg-sidebar-hover">
                            <td class="px-6 py-4 text-sm text-foreground">October 1, 2023</td>
                            <td class="px-6 py-4 text-sm text-foreground">Oak Street Apartment</td>
                            <td class="px-6 py-4 text-sm font-medium text-foreground">$1200</td>
                            <td class="px-6 py-4"><span class="status-badge bg-success-light text-success">Paid</span></td>
                        </tr>
                        <tr class="hover:bg-sidebar-hover">
                            <td class="px-6 py-4 text-sm text-foreground">September 1, 2023</td>
                            <td class="px-6 py-4 text-sm text-foreground">Oak Street Apartment</td>
                            <td class="px-6 py-4 text-sm font-medium text-foreground">$1200</td>
                            <td class="px-6 py-4"><span class="status-badge bg-success-light text-success">Paid</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
let paymentStatus = 'idle';

document.getElementById('paymentMethod').addEventListener('change', function(e) {
    const cardFields = document.getElementById('cardFields');
    if (e.target.value === 'card') {
        cardFields.style.display = 'grid';
    } else {
        cardFields.style.display = 'none';
    }
});

function processPayment() {
    if (paymentStatus === 'processing') return;
    
    paymentStatus = 'processing';
    const payButton = document.getElementById('payButton');
    payButton.textContent = 'Processing Payment...';
    payButton.disabled = true;
    payButton.classList.add('opacity-50', 'cursor-not-allowed');
    
    // Simulate payment processing
    setTimeout(() => {
        paymentStatus = 'success';
        document.getElementById('paymentForm').classList.add('hidden');
        document.getElementById('paymentSuccess').classList.remove('hidden');
    }, 3000);
}
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
