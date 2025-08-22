<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">Report an Issue</h1>
            <p class="text-muted-foreground mt-2">Report maintenance issues with your property</p>
        </div>

        <div id="successMessage" class="dashboard-card p-12 text-center animate-scale-in hidden">
            <svg class="w-16 h-16 text-success mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <h3 class="text-xl font-semibold text-foreground mb-2">Issue Reported Successfully!</h3>
            <p class="text-muted-foreground mb-6">
                Your issue has been reported and assigned ticket #<span id="ticketNumber">ISS-2024-001</span>. We'll notify you when it's updated.
            </p>
            <button onclick="reportAnother()" class="btn-primary">Report Another Issue</button>
        </div>

        <div id="issueForm" class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Issue Details</h3>
            </div>
            
            <form onsubmit="submitIssue(event)" class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1">Property</label>
                        <select id="property" class="form-input" required>
                            <option value="">Select Property</option>
                            <option value="Oak Street Apartment">Oak Street Apartment</option>
                            <option value="Maple Avenue Studio">Maple Avenue Studio</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1">Issue Category</label>
                        <select id="category" class="form-input" required>
                            <option value="">Select Category</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Electrical">Electrical</option>
                            <option value="Heating/Cooling">Heating/Cooling</option>
                            <option value="Appliances">Appliances</option>
                            <option value="Locks/Security">Locks/Security</option>
                            <option value="Pest Control">Pest Control</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">Priority Level</label>
                    <select id="priority" class="form-input">
                        <option value="low">Low - Can wait a few days</option>
                        <option value="medium" selected>Medium - Within 24-48 hours</option>
                        <option value="high">High - Urgent, needs immediate attention</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">Description</label>
                    <textarea id="description" placeholder="Please describe the issue in detail..." class="form-input min-h-32" required></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">Upload Images (Optional)</label>
                    <div class="border-2 border-dashed border-border rounded-lg p-4 text-center">
                        <svg class="w-8 h-8 text-muted-foreground mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-sm text-muted-foreground mb-2">Upload images to help us understand the issue better</p>
                        <input type="file" accept="image/*" multiple id="imageUpload" class="hidden">
                        <label for="imageUpload" class="btn-secondary cursor-pointer">Choose Images</label>
                    </div>
                    
                    <div id="imagePreview" class="mt-3 grid grid-cols-2 md:grid-cols-3 gap-3 hidden"></div>
                </div>

                <button type="submit" id="submitBtn" class="btn-primary w-full">Report Issue</button>
            </form>
        </div>
    </div>
</div>

<script>
let selectedImages = [];
let submitStatus = 'idle';

document.getElementById('imageUpload').addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    selectedImages = [...selectedImages, ...files];
    updateImagePreview();
});

function updateImagePreview() {
    const preview = document.getElementById('imagePreview');
    if (selectedImages.length === 0) {
        preview.classList.add('hidden');
        return;
    }
    
    preview.classList.remove('hidden');
    preview.innerHTML = '';
    
    selectedImages.forEach((image, index) => {
        const div = document.createElement('div');
        div.className = 'relative';
        div.innerHTML = `
            <img src="${URL.createObjectURL(image)}" alt="Upload ${index + 1}" class="w-full h-24 object-cover rounded-lg">
            <button type="button" onclick="removeImage(${index})" class="absolute -top-2 -right-2 w-6 h-6 bg-destructive text-destructive-foreground rounded-full flex items-center justify-center text-xs">×</button>
        `;
        preview.appendChild(div);
    });
}

function removeImage(index) {
    selectedImages.splice(index, 1);
    updateImagePreview();
}

function submitIssue(e) {
    e.preventDefault();
    if (submitStatus === 'submitting') return;
    
    submitStatus = 'submitting';
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.textContent = 'Submitting...';
    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    
    // Simulate submission
    setTimeout(() => {
        submitStatus = 'success';
        document.getElementById('issueForm').classList.add('hidden');
        document.getElementById('successMessage').classList.remove('hidden');
        
        // Reset form
        document.querySelector('form').reset();
        selectedImages = [];
        updateImagePreview();
    }, 2000);
}

function reportAnother() {
    submitStatus = 'idle';
    document.getElementById('issueForm').classList.remove('hidden');
    document.getElementById('successMessage').classList.add('hidden');
    
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.textContent = 'Report Issue';
    submitBtn.disabled = false;
    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
}
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
