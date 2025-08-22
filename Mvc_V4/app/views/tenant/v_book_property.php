<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">Book Property</h1>
            <p class="text-muted-foreground mt-2">Complete your rental agreement</p>
        </div>

        <!-- Reserved Properties -->
        <div class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Reserved Properties</h3>
            </div>
            
            <div class="divide-y divide-border">
                <!-- Property 1 - Waiting for Verification -->
                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h4 class="font-semibold text-foreground">Oak Street Apartment</h4>
                            <p class="text-sm text-muted-foreground">Downtown</p>
                            <p class="text-lg font-bold text-primary mt-1">$1200/mo</p>
                            <p class="text-sm text-muted-foreground mt-1">Reserved on: January 15, 2024</p>
                            <p class="text-sm text-warning mt-1">Expires: January 17, 2024</p>
                        </div>
                        <div class="ml-4">
                            <span class="status-badge bg-warning-light text-warning">Waiting for Verification</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 space-y-4">
                        <div class="bg-info-light p-4 rounded-lg">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-info mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-info">Upload Required</p>
                                    <p class="text-sm text-foreground mt-1">
                                        Please upload your signed lease agreement to complete the booking.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- File Upload -->
                        <div class="space-y-3">
                            <label class="block text-sm font-medium text-foreground">Upload Signed Agreement</label>
                            <div class="border-2 border-dashed border-border rounded-lg p-6 text-center" id="uploadArea">
                                <svg class="w-12 h-12 text-muted-foreground mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <div class="space-y-2">
                                    <p class="text-sm font-medium text-foreground">Choose a file or drag it here</p>
                                    <p class="text-xs text-muted-foreground">PDF, DOC, or DOCX files only</p>
                                </div>
                                <input type="file" accept=".pdf,.doc,.docx" id="fileInput" class="hidden">
                                <label for="fileInput" class="btn-secondary inline-block mt-4 cursor-pointer">Browse Files</label>
                            </div>
                            
                            <div id="selectedFile" class="hidden">
                                <div class="flex items-center space-x-3 p-3 bg-secondary rounded-lg">
                                    <svg class="w-5 h-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-foreground" id="fileName"></span>
                                    <button onclick="removeFile()" class="text-destructive hover:text-destructive/80">Remove</button>
                                </div>
                            </div>
                            
                            <button onclick="submitAgreement()" id="submitBtn" disabled class="btn-primary w-full opacity-50 cursor-not-allowed">
                                Submit Agreement
                            </button>
                            
                            <div id="uploadSuccess" class="hidden bg-success-light p-4 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="text-sm font-medium text-success">
                                        Agreement uploaded successfully! We'll review it within 24 hours.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property 2 - Booked -->
                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h4 class="font-semibold text-foreground">Maple Avenue Studio</h4>
                            <p class="text-sm text-muted-foreground">Midtown</p>
                            <p class="text-lg font-bold text-primary mt-1">$800/mo</p>
                            <p class="text-sm text-muted-foreground mt-1">Reserved on: January 10, 2024</p>
                        </div>
                        <div class="ml-4">
                            <span class="status-badge bg-success-light text-success">Booked</span>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <div class="bg-success-light p-4 rounded-lg">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-success mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-success">Booking Complete</p>
                                    <p class="text-sm text-foreground mt-1">
                                        Your rental agreement has been approved. You can move in on your lease start date.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let uploadStatus = 'idle';

document.getElementById('fileInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        document.getElementById('fileName').textContent = file.name;
        document.getElementById('selectedFile').classList.remove('hidden');
        document.getElementById('submitBtn').disabled = false;
        document.getElementById('submitBtn').classList.remove('opacity-50', 'cursor-not-allowed');
        uploadStatus = 'idle';
    }
});

function removeFile() {
    document.getElementById('fileInput').value = '';
    document.getElementById('selectedFile').classList.add('hidden');
    document.getElementById('submitBtn').disabled = true;
    document.getElementById('submitBtn').classList.add('opacity-50', 'cursor-not-allowed');
    document.getElementById('uploadSuccess').classList.add('hidden');
}

function submitAgreement() {
    if (uploadStatus === 'uploading') return;
    
    uploadStatus = 'uploading';
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.textContent = 'Uploading...';
    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    
    // Simulate upload
    setTimeout(() => {
        uploadStatus = 'success';
        submitBtn.textContent = 'Submit Agreement';
        document.getElementById('uploadSuccess').classList.remove('hidden');
    }, 2000);
}
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
