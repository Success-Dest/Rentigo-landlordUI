<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">My Reviews</h1>
            <p class="text-muted-foreground mt-2">Rate and review your past rental experiences</p>
        </div>

        <div id="successMessage" class="bg-success-light p-4 rounded-lg animate-fade-in hidden">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <p class="text-sm font-medium text-success">
                    Review submitted successfully! It will be published after moderation.
                </p>
            </div>
        </div>

        <!-- Past Properties -->
        <div class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Past Properties</h3>
            </div>
            
            <div class="divide-y divide-border">
                <?php foreach($reviews as $review): ?>
                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h4 class="font-semibold text-foreground"><?php echo $review['property']; ?></h4>
                            <p class="text-sm text-muted-foreground">Downtown</p>
                            <p class="text-sm text-muted-foreground mt-1">
                                January 1, 2023 - December 31, 2023
                            </p>
                        </div>
                        <div class="ml-4 flex items-center space-x-3">
                            <span class="status-badge bg-success-light text-success">Published</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-4 bg-secondary rounded-lg">
                        <div class="flex items-center space-x-2 mb-2">
                            <div class="flex space-x-1">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <svg class="w-5 h-5 <?php echo $i <= $review['rating'] ? 'text-warning' : 'text-muted-foreground'; ?> fill-current" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                <?php endfor; ?>
                            </div>
                            <span class="text-sm text-muted-foreground">
                                <?php echo $review['rating']; ?>/5 stars
                            </span>
                        </div>
                        <p class="text-sm text-foreground"><?php echo $review['comment']; ?></p>
                        <p class="text-xs text-muted-foreground mt-2">
                            Reviewed on <?php echo date('F j, Y', strtotime($review['date'])); ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Unreviewed Property -->
                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h4 class="font-semibold text-foreground">Oak Street Apartment</h4>
                            <p class="text-sm text-muted-foreground">Downtown</p>
                            <p class="text-sm text-muted-foreground mt-1">
                                January 1, 2024 - December 31, 2024
                            </p>
                        </div>
                        <div class="ml-4 flex items-center space-x-3">
                            <span class="status-badge bg-muted text-muted-foreground">Not Reviewed</span>
                            <button onclick="openReviewModal('Oak Street Apartment', 'Downtown')" class="btn-primary text-sm">
                                Write Review
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review Modal -->
<div id="reviewModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-modal max-w-md w-full mx-4 animate-scale-in">
        <div class="flex items-center justify-between p-6 border-b border-border">
            <h3 class="text-lg font-semibold text-foreground">Write Review</h3>
            <button onclick="closeReviewModal()" class="p-2 hover:bg-sidebar-hover rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="p-6 space-y-4">
            <div>
                <h4 class="font-semibold text-foreground" id="modalPropertyName"></h4>
                <p class="text-sm text-muted-foreground" id="modalPropertyLocation"></p>
            </div>

            <div>
                <label class="block text-sm font-medium text-foreground mb-2">Rating</label>
                <div class="flex space-x-1" id="starRating">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <button type="button" onclick="setRating(<?php echo $i; ?>)" class="star-btn text-muted-foreground hover:text-warning" data-rating="<?php echo $i; ?>">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </button>
                    <?php endfor; ?>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-foreground mb-1">Comment</label>
                <textarea id="reviewComment" placeholder="Share your experience with this property..." class="form-input min-h-24" required></textarea>
            </div>

            <div class="flex space-x-3">
                <button onclick="closeReviewModal()" class="btn-secondary flex-1">Cancel</button>
                <button onclick="submitReview()" id="submitReviewBtn" class="btn-primary flex-1 opacity-50 cursor-not-allowed" disabled>
                    Submit Review
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let currentRating = 0;
let submitStatus = 'idle';

function openReviewModal(propertyName, location) {
    document.getElementById('modalPropertyName').textContent = propertyName;
    document.getElementById('modalPropertyLocation').textContent = location;
    document.getElementById('reviewModal').classList.remove('hidden');
    currentRating = 0;
    updateStarDisplay();
    updateSubmitButton();
}

function closeReviewModal() {
    document.getElementById('reviewModal').classList.add('hidden');
    document.getElementById('reviewComment').value = '';
    currentRating = 0;
    updateStarDisplay();
}

function setRating(rating) {
    currentRating = rating;
    updateStarDisplay();
    updateSubmitButton();
}

function updateStarDisplay() {
    const stars = document.querySelectorAll('.star-btn');
    stars.forEach((star, index) => {
        if (index < currentRating) {
            star.classList.remove('text-muted-foreground');
            star.classList.add('text-warning');
        } else {
            star.classList.remove('text-warning');
            star.classList.add('text-muted-foreground');
        }
    });
}

function updateSubmitButton() {
    const submitBtn = document.getElementById('submitReviewBtn');
    if (currentRating > 0) {
        submitBtn.disabled = false;
        submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    } else {
        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    }
}

function submitReview() {
    if (currentRating === 0 || submitStatus === 'submitting') return;
    
    submitStatus = 'submitting';
    const submitBtn = document.getElementById('submitReviewBtn');
    submitBtn.textContent = 'Submitting...';
    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    
    // Simulate submission
    setTimeout(() => {
        submitStatus = 'idle';
        closeReviewModal();
        document.getElementById('successMessage').classList.remove('hidden');
        
        // Reset button
        submitBtn.textContent = 'Submit Review';
        
        // Hide success message after 5 seconds
        setTimeout(() => {
            document.getElementById('successMessage').classList.add('hidden');
        }, 5000);
    }, 2000);
}
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
