import os

replacements = {
    '#FF6B18': '#0056b3',
    '#ff6b18': '#0056b3',
    '255, 107, 24': '0, 86, 179',
    '#FFF5F0': '#e6f0fa', 
    '#FFF0E9': '#cce0f5',
    '#e5571f': '#004085'
}

files = [
    'public/main.css',
    'resources/views/beranda.blade.php',
    'resources/views/detailPost.blade.php',
    'resources/views/galeri.blade.php',
    'resources/views/tentangKami.blade.php'
]

for path in files:
    if os.path.exists(path):
        with open(path, 'r', encoding='utf-8') as f:
            content = f.read()
        
        for k, v in replacements.items():
            content = content.replace(k, v)
            
        with open(path, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Updated {path}")
    else:
        print(f"Not found: {path}")
