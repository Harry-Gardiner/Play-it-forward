/**
 * Newsletter Popup Component
 * Handles showing/hiding newsletter signup popup with localStorage tracking
 */
/**
 * Newsletter Popup Class
 * Manages popup display, localStorage persistence, and auto-close functionality
 */
class NewsletterPopup {
  constructor() {
    // Check if popup data is available
    if (!window.newsletterPopupData) {
      console.log(
        'Newsletter popup: No popup data available (shortcode validation may have failed)'
      );
      return;
    }

    this.data = window.newsletterPopupData;
    this.storageKey = 'newsletter-popup-dismissed';
    this.subscriptionKey = 'newsletter-popup-subscribed';
    this.popup = null;
    this.observer = null;

    // Only initialize if we have valid data
    if (this.data && this.data.form) {
      this.init();
    } else {
      console.log('Newsletter popup: Invalid popup data or missing form');
    }
  }
  init() {
    // Check if popup should be shown
    if (this.shouldShowPopup()) {
      this.createPopup();
      this.bindEvents();
      this.showPopup();
    }
  }

  shouldShowPopup() {
    const dismissed = localStorage.getItem(this.storageKey);
    const subscribed = localStorage.getItem(this.storageKey + '_subscribed');

    // Don't show if user has successfully subscribed (longer period)
    if (subscribed) {
      const subscribedDate = new Date(subscribed);
      const now = new Date();
      const daysDiff = (now - subscribedDate) / (1000 * 60 * 60 * 24);

      // Don't show popup for 30 days after successful subscription
      if (daysDiff < 30) {
        return false;
      }
    }

    // Check regular dismissal
    if (!dismissed) {
      return true;
    }

    // Check if dismissal has expired (older than dismissalDuration days)
    const dismissedDate = new Date(dismissed);
    const now = new Date();
    const daysDiff = (now - dismissedDate) / (1000 * 60 * 60 * 24);

    return daysDiff >= this.dismissalDuration;
  }

  createPopup() {
    // Create overlay
    this.overlay = document.createElement('div');
    this.overlay.className = 'newsletter-popup-overlay';

    // Create popup container
    this.popup = document.createElement('div');
    this.popup.className = 'newsletter-popup';

    // Get newsletter content from PHP (this will be populated by server-side rendering)
    const newsletterContent = window.newsletterPopupData || {};

    this.popup.innerHTML = `
      <div class="newsletter-popup__content">
        <button class="newsletter-popup__close" aria-label="Close newsletter signup">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>

        <div class="newsletter-popup__header">
          ${
            newsletterContent.title
              ? `<h2 class="newsletter-popup__title">${newsletterContent.title}</h2>`
              : ''
          }
          ${
            newsletterContent.content
              ? `<div class="newsletter-popup__body">${newsletterContent.content}</div>`
              : ''
          }
        </div>

        <div class="newsletter-popup__form">
          <small>* indicates required</small>
          <div class="newsletter-popup__form-container">
            ${newsletterContent.form || '<p>Newsletter form not available</p>'}
          </div>
        </div>
      </div>
    `;

    this.overlay.appendChild(this.popup);
    document.body.appendChild(this.overlay);

    this.closeButton = this.popup.querySelector('.newsletter-popup__close');
  }

  bindEvents() {
    if (this.closeButton) {
      this.closeButton.addEventListener('click', () => this.dismissPopup());
    }

    if (this.overlay) {
      this.overlay.addEventListener('click', (e) => {
        // Close if clicking on overlay background (not popup content)
        if (e.target === this.overlay) {
          this.dismissPopup();
        }
      });
    }

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.popup) {
        this.dismissPopup();
      }
    });

    // Auto-close on successful form submission
    this.setupAutoClose();
  }

  setupAutoClose() {
    // Monitor for success messages and auto-close popup
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.addedNodes.length) {
          // Check for various success message selectors
          const successSelectors = [
            '.mc-message.success',
            '.success-message',
            '.mc4wp-success',
            '.wpcf7-mail-sent-ok',
            '[class*="success"]',
            '.mailchimp-success',
          ];

          let successMessage = null;
          for (const selector of successSelectors) {
            successMessage = this.popup.querySelector(selector);
            if (successMessage) break;
          }

          // Also check for success text content
          if (!successMessage) {
            const allMessages = this.popup.querySelectorAll(
              '.mc-message, .response, .message'
            );
            for (const message of allMessages) {
              const text = message.textContent.toLowerCase();
              if (
                text.includes('success') ||
                text.includes('thank you') ||
                text.includes('subscribed')
              ) {
                successMessage = message;
                break;
              }
            }
          }

          if (successMessage) {
            console.log(
              'Newsletter signup successful! Auto-closing popup in 2 seconds...'
            );

            // Store successful subscription to prevent showing popup for longer
            localStorage.setItem(
              this.storageKey + '_subscribed',
              new Date().toISOString()
            );

            // Auto-close after 2 seconds to let user see success message
            setTimeout(() => {
              this.dismissPopup();
            }, 2000);

            // Stop observing once we've detected success
            observer.disconnect();
          }
        }
      });
    });

    // Start observing the popup for changes
    if (this.popup) {
      observer.observe(this.popup, {
        childList: true,
        subtree: true,
        characterData: true,
      });

      // Store observer reference for cleanup
      this.observer = observer;
    }
  }

  showPopup() {
    if (this.overlay) {
      // Add a small delay to ensure CSS is loaded
      setTimeout(() => {
        this.overlay.classList.add('newsletter-popup-overlay--visible');
        this.popup.classList.add('newsletter-popup--visible');

        // Focus management for accessibility
        this.closeButton?.focus();

        // Prevent body scroll
        document.body.style.overflow = 'hidden';
      }, 100);
    }
  }

  dismissPopup() {
    if (this.overlay) {
      this.overlay.classList.remove('newsletter-popup-overlay--visible');
      this.popup.classList.remove('newsletter-popup--visible');

      // Restore body scroll
      document.body.style.overflow = '';

      // Clean up observer
      if (this.observer) {
        this.observer.disconnect();
        this.observer = null;
      }

      // Remove from DOM after animation
      setTimeout(() => {
        this.overlay.remove();
      }, 300);

      // Store dismissal date (only if not auto-closed from success)
      if (!localStorage.getItem(this.storageKey + '_subscribed')) {
        localStorage.setItem(this.storageKey, new Date().toISOString());
      }
    }
  }

  // Public method to force show popup (for testing)
  forceShow() {
    localStorage.removeItem(this.storageKey);
    localStorage.removeItem(this.storageKey + '_subscribed');
    this.init();
  }

  // Public method to clear subscription status (for testing)
  clearSubscriptionStatus() {
    localStorage.removeItem(this.storageKey + '_subscribed');
    console.log('Newsletter subscription status cleared');
  }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  // Small delay to let the page settle
  setTimeout(() => {
    new NewsletterPopup();
  }, 2000); // 2 second delay before showing popup
});

// Export for potential external use
window.NewsletterPopup = NewsletterPopup;
