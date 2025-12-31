/**
 * Scroll Behavior Management
 * Handles smooth scroll to top on SPA navigation
 */

document.addEventListener('livewire:navigated', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
