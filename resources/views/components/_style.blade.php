<style>
    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 40%, rgba(0,0,0,0.05) 100%);
        z-index: 10;
        pointer-events: none;
    }
    .kategori-tag {
        display: inline-flex;
        align-items: center;
        padding: 5px 14px;
        background: var(--primary-lightest, #E6F1FB);
        color: var(--primary, #185FA5);
        font-size: 11px;
        font-weight: 700;
        border-radius: 50px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        border: 2px solid var(--primary, #185FA5);
    }
    .kategori-tag-white {
        background: rgba(255,255,255,0.15);
        color: white;
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255,255,255,0.2);
    }
    .meta-row {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 16px;
        flex-wrap: wrap;
    }
    .meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: rgba(255,255,255,0.9);
    }
    .meta-item svg {
        width: 14px;
        height: 14px;
        opacity: 0.8;
    }
    .meta-dot {
        width: 3px;
        height: 3px;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
    }
    .hero-title-link {
        font-weight: 700;
        color: white;
        font-size: 32px;
        line-height: 1.3;
        margin-top: 12px;
        display: block;
    }
    .hero-title-link:hover {
        text-decoration: underline;
    }
</style>
