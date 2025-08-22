<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">Agreements</h1>
            <p class="text-muted-foreground mt-2">View and manage your rental agreements</p>
        </div>

        <div class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Your Agreements</h3>
            </div>
            
            <div class="divide-y divide-border">
                <?php foreach($agreements as $agreement): ?>
                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="p-3 bg-primary-light rounded-lg">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-foreground">Rental Agreement</h4>
                                <p class="text-sm text-muted-foreground"><?php echo $agreement['property']; ?></p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span class="text-sm text-muted-foreground">
                                        Signed: <?php echo date('F j, Y', strtotime($agreement['start_date'])); ?>
                                    </span>
                                    <span class="text-sm text-muted-foreground">
                                        Expires: <?php echo date('F j, Y', strtotime($agreement['end_date'])); ?>
                                    </span>
                                    <span class="text-sm text-muted-foreground">
                                        Rent: $<?php echo $agreement['rent']; ?>/mo
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <?php if($agreement['status'] === 'active'): ?>
                                <span class="status-badge bg-success-light text-success">Active</span>
                            <?php else: ?>
                                <span class="status-badge bg-warning-light text-warning">Pending</span>
                            <?php endif; ?>
                            <div class="flex space-x-2">
                                <button onclick="viewAgreement(<?php echo $agreement['id']; ?>)" class="btn-secondary text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View
                                </button>
                                <button onclick="downloadAgreement(<?php echo $agreement['id']; ?>)" class="btn-secondary text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <?php if($agreement['status'] === 'active'): ?>
                    <div class="mt-4 p-4 bg-success-light rounded-lg">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-success mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-success">Agreement Active</p>
                                <p class="text-sm text-foreground mt-1">
                                    Your rental agreement is currently active and valid until <?php echo date('F j, Y', strtotime($agreement['end_date'])); ?>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Agreement Terms Summary -->
        <div class="dashboard-card animate-scale-in">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Agreement Terms Summary</h3>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="p-4 bg-primary-light rounded-lg mb-3">
                            <svg class="w-8 h-8 text-primary mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-foreground">Property Type</h4>
                        <p class="text-sm text-muted-foreground mt-1">2 Bedroom Apartment</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="p-4 bg-primary-light rounded-lg mb-3">
                            <svg class="w-8 h-8 text-primary mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4h3a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h3z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-foreground">Lease Duration</h4>
                        <p class="text-sm text-muted-foreground mt-1">12 Months</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="p-4 bg-primary-light rounded-lg mb-3">
                            <svg class="w-8 h-8 text-primary mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-foreground">Security Deposit</h4>
                        <p class="text-sm text-muted-foreground mt-1">$1200 (1 month rent)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agreement Viewer Modal -->
<div id="agreementModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-modal max-w-4xl w-full mx-4 max-h-[90vh] overflow-hidden">
        <div class="flex items-center justify-between p-6 border-b border-border">
            <h3 class="text-lg font-semibold text-foreground">Rental Agreement</h3>
            <button onclick="closeAgreementModal()" class="p-2 hover:bg-sidebar-hover rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6 overflow-y-auto max-h-[70vh]">
            <div class="prose max-w-none">
                <h4>Rental Agreement - Oak Street Apartment</h4>
                <p>This agreement is between the landlord and tenant for the rental of the property located at Oak Street Apartment, Downtown.</p>
                <h5>Terms and Conditions:</h5>
                <ul>
                    <li>Monthly rent: $1200</li>
                    <li>Security deposit: $1200</li>
                    <li>Lease duration: 12 months</li>
                    <li>Pet policy: No pets allowed</li>
                    <li>Smoking policy: No smoking</li>
                </ul>
                <p>Both parties agree to the terms outlined in this agreement.</p>
            </div>
        </div>
    </div>
</div>

<script>
function viewAgreement(agreementId) {
    document.getElementById('agreementModal').classList.remove('hidden');
}

function closeAgreementModal() {
    document.getElementById('agreementModal').classList.add('hidden');
}

function downloadAgreement(agreementId) {
    // Simulate download
    alert('Agreement download started...');
}
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
