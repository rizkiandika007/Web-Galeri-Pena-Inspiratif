    <style>
        :root {
            --primary: #185FA5;
            --primary-light: #378ADD;
            --primary-lighter: #B5D4F4;
            --primary-lightest: #E6F1FB;
            --primary-dark: #0C447C;
            --primary-darker: #042C53;
        }

        /* ========== DETAIL PAGE STYLES ========== */
        .hero-detail {
            position: relative;
            width: 100%;
            height: 420px;
            border-radius: 20px;
            overflow: hidden;
        }

        .hero-detail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .hero-detail:hover img {
            transform: scale(1.04);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 40%, rgba(0,0,0,0.05) 100%);
            z-index: 1;
        }

        .hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 2;
            padding: 48px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .breadcrumb a, .breadcrumb span {
            font-size: 12px;
            font-weight: 500;
            color: rgba(255,255,255,0.5);
            transition: color 0.2s ease;
        }

        .breadcrumb a:hover {
            color: #85B7EB;
        }

        .breadcrumb .separator {
            color: rgba(255,255,255,0.3);
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
            color: rgba(255,255,255,0.6);
        }

        .meta-item svg {
            width: 14px;
            height: 14px;
            opacity: 0.7;
        }

        .meta-dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
        }

        /* Content area */
        .content-grid {
            display: flex;
            gap: 36px;
            margin-top: 48px;
        }

        .content-main {
            flex: 1;
            min-width: 0;
        }

        .content-sidebar {
            width: 320px;
            flex-shrink: 0;
        }

        .article-body {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            border: 2px solid rgba(24,95,165,0.15);
            box-shadow: 0 1px 3px rgba(24,95,165,0.04);
        }

        /* Photo gallery section */
        .gallery-section {
            margin-top: 36px;
        }

        .gallery-section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1A1D26;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .gallery-section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: var(--primary);
            border-radius: 4px;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        @media (min-width: 640px) {
            .photo-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .photo-grid-item {
            position: relative;
            aspect-ratio: 1;
            border-radius: 14px;
            overflow: hidden;
            cursor: pointer;
            border: 1px solid rgba(24,95,165,0.15);
        }

        .photo-grid-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .photo-grid-item:hover img {
            transform: scale(1.08);
        }

        .photo-grid-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.3) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo-grid-item:hover::after {
            opacity: 1;
        }

        .photo-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 12px;
            z-index: 2;
            font-size: 11px;
            font-weight: 600;
            color: white;
            opacity: 0;
            transform: translateY(6px);
            transition: all 0.3s ease;
        }

        .photo-grid-item:hover .photo-caption {
            opacity: 1;
            transform: translateY(0);
        }

        /* Sidebar */
        .sidebar-card {
            background: #fff;
            border-radius: 20px;
            padding: 28px;
            border: 2px solid rgba(24,95,165,0.15);
            box-shadow: 0 1px 3px rgba(24,95,165,0.04);
        }

        .sidebar-title {
            font-size: 15px;
            font-weight: 700;
            color: #1A1D26;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(24,95,165,0.12);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sidebar-title svg {
            width: 18px;
            height: 18px;
            color: var(--primary);
        }

        .related-post-item {
            display: flex;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(24,95,165,0.08);
            transition: all 0.25s ease;
        }

        .related-post-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .related-post-item:first-child {
            padding-top: 0;
        }

        .related-post-item:hover {
            transform: translateX(4px);
        }

        .related-post-thumb {
            width: 72px;
            height: 72px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .related-post-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .related-post-item:hover .related-post-thumb img {
            transform: scale(1.08);
        }

        .related-post-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 4px;
            min-width: 0;
        }

        .related-post-info h4 {
            font-size: 13px;
            font-weight: 600;
            color: #1A1D26;
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s ease;
        }

        .related-post-item:hover .related-post-info h4 {
            color: var(--primary);
        }

        .related-post-info span {
            font-size: 11px;
            color: #A3A6AE;
        }

        /* Author card */
        .author-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 20px;
            background: var(--primary-lightest);
            border-radius: 14px;
            margin-top: 24px;
        }

        .author-avatar {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }

        .author-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .author-info h4 {
            font-size: 13px;
            font-weight: 600;
            color: #1A1D26;
        }

        .author-info span {
            font-size: 11px;
            color: #A3A6AE;
        }

        /* Back button */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #64748B;
            padding: 10px 20px;
            background: white;
            border-radius: 50px;
            border: 1px solid #EEF0F7;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }

        .back-btn:hover {
            color: var(--primary);
            border-color: rgba(24,95,165,0.3);
            transform: translateX(-3px);
        }

        /* Lightbox */
        .lightbox-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.9);
            z-index: 100;
            align-items: center;
            justify-content: center;
            cursor: zoom-out;
            animation: fadeIn 0.3s ease;
        }

        .lightbox-overlay.active {
            display: flex;
        }

        .lightbox-overlay img {
            max-width: 90%;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 12px;
            animation: scaleIn 0.3s ease;
        }

        .lightbox-close {
            position: absolute;
            top: 24px;
            right: 24px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 101;
        }

        .lightbox-close:hover {
            background: rgba(255,255,255,0.2);
            transform: scale(1.1);
        }

        .lightbox-close svg {
            width: 18px;
            height: 18px;
            color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Kategori tag */
        .kategori-tag {
            display: inline-flex;
            align-items: center;
            padding: 5px 14px;
            background: var(--primary-lightest);
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
            border-radius: 50px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            border: 2px solid var(--primary);
        }

        .kategori-tag-white {
            background: rgba(255,255,255,0.15);
            color: white;
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        /* Tags section */
        .tags-section {
            border-top: 2px solid rgba(24,95,165,0.15);
            padding-top: 24px;
            margin-top: 32px;
        }

        .tags-label {
            font-size: 13px;
            font-weight: 600;
            color: #64748B;
            margin-bottom: 12px;
        }

        .tags-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        /* Breadcrumb bar */
        .breadcrumb-bar {
            background: var(--primary-lightest);
            padding: 12px 0;
            margin-top: 20px;
        }

        .breadcrumb-bar-inner {
            max-width: 1130px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            font-size: 13px;
            gap: 8px;
        }

        .breadcrumb-bar a {
            color: var(--primary-dark);
            font-weight: 500;
            transition: color 0.2s;
        }

        .breadcrumb-bar a:hover {
            color: var(--primary);
        }

        .breadcrumb-bar .sep {
            color: var(--primary-lighter);
        }

        .breadcrumb-bar .current {
            color: var(--primary);
            font-weight: 600;
        }

        /* article prose */
        .prose-content {
            font-size: 15px;
            line-height: 1.8;
            color: #374151;
        }
    </style>