@props(['showLabel' => false, 'compact' => true])

<div class="d-flex align-items-center" x-data>
    @if($showLabel)
        <span class="text-muted me-2 d-none d-lg-block" style="font-size: 0.65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
            Mode
        </span>
    @endif

    <div
        class="theme-capsule"
        role="group"
        aria-label="Theme toggle"
        x-bind:data-theme="$store.theme.current"
    >
        <!-- Light -->
        <button
            type="button"
            class="theme-capsule-btn"
            x-on:click="$store.theme.set('light')"
            x-bind:class="{ 'active': $store.theme.current === 'light' }"
            title="Light Mode"
        >
            <i class="fas fa-sun"></i>
        </button>

        <!-- System -->
        <button
            type="button"
            class="theme-capsule-btn"
            x-on:click="$store.theme.set('system')"
            x-bind:class="{ 'active': $store.theme.current === 'system' }"
            title="System Theme"
        >
            <i class="fas fa-circle-half-stroke"></i>
        </button>

        <!-- Dark -->
        <button
            type="button"
            class="theme-capsule-btn"
            x-on:click="$store.theme.set('dark')"
            x-bind:class="{ 'active': $store.theme.current === 'dark' }"
            title="Dark Mode"
        >
            <i class="fas fa-moon"></i>
        </button>
    </div>
</div>
