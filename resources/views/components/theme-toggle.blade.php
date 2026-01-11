@props(['showLabel' => true, 'compact' => false])

<div class="d-flex align-items-center" x-data>
    @if($showLabel)
        <span class="text-muted me-2 d-none d-lg-block" style="font-size: 0.75rem; font-weight: 500;">
            TEMA
        </span>
    @endif

    <div
        class="theme-capsule {{ $compact ? 'theme-capsule-compact' : '' }}"
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
            aria-label="Light Mode"
        >
            <i class="fas fa-sun"></i>
            <span class="theme-label d-none d-lg-inline">Terang</span>
        </button>

        <!-- System -->
        <button
            type="button"
            class="theme-capsule-btn"
            x-on:click="$store.theme.set('system')"
            x-bind:class="{ 'active': $store.theme.current === 'system' }"
            title="System Theme"
            aria-label="System Theme"
        >
            <i class="fas fa-circle-half-stroke"></i>
            <span class="theme-label d-none d-lg-inline">Sistem</span>
        </button>

        <!-- Dark -->
        <button
            type="button"
            class="theme-capsule-btn"
            x-on:click="$store.theme.set('dark')"
            x-bind:class="{ 'active': $store.theme.current === 'dark' }"
            title="Dark Mode"
            aria-label="Dark Mode"
        >
            <i class="fas fa-moon"></i>
            <span class="theme-label d-none d-lg-inline">Gelap</span>
        </button>
    </div>
</div>
