# UXNitro WordPress Theme
> Lightweight, hosting-focused WordPress theme optimized for speed and modern design.

[![WordPress](https://img.shields.io/badge/WordPress-6.7%2B-blue.svg)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-green.svg)](https://www.php.net/)
[![License](https://img.shields.io/badge/License-GPL%20v2%2B-orange.svg)](LICENSE.md)
[![Version](https://img.shields.io/badge/Version-1.0.15-lightgrey.svg)](https://github.com/uxnitro/uxnitro)

## 🚀 Features

### ⚡ Performance First
- Built-in performance optimization panel
- WordPress cleanup tools (emojis, embeds, dashicons, etc.)
- Font optimization controls
- Media lazy loading
- Database & heartbeat management
- Admin area optimization

### 🎨 Design & Customization
- Header & Footer builder
- Typography controls
- Global color palette
- Sticky & transparent headers
- Container width controls
- Sidebar controls
- Blog & archive layouts
- Mobile responsive controls

### 🔌 Compatible With
- ✅ Elementor
- ✅ Gutenberg
- ✅ SureCart
- ✅ LiteSpeed Cache
- ✅ All major caching plugins
- ✅ Well-coded plugins

## 📦 Installation

### Upload Method
1. Download the latest release
2. Go to WordPress Admin → Appearance → Themes
3. Click "Add New" → "Upload Theme"
4. Upload the ZIP file
5. Activate UXNitro

### FTP Method
1. Upload the `uxnitro` folder to `/wp-content/themes/`
2. Activate the theme in WordPress admin

## 🎯 Quick Start

1. **Activate Theme** → Go to Appearance → Themes → Activate UXNitro
2. **Open Customizer** → Appearance → Customize
3. **Set Performance** → Go to UXNitro Performance panel
4. **Customize** → Set your logo, colors, fonts, header, footer
5. **Build Pages** → Use Elementor or Gutenberg

## ⚙️ Performance Settings

All settings are **OFF by default** for maximum compatibility. Enable only what you need:

### WordPress Cleanup
- Disable Emojis
- Disable Embeds
- Disable Block Library CSS
- Disable Dashicons for Guests
- Disable RSS Feeds
- Disable XML-RPC
- Disable REST API for Guests
- Disable Pingbacks
- Disable Shortlink
- Disable Generator Meta Tag
- Disable oEmbed Discovery
- Disable Query Strings
- Disable Font Awesome
- Disable Comment Reply Script
- Disable jQuery Migrate
- Disable Heartbeat API

### Font Optimization
- Disable Google Fonts
- Font Display Swap
- Preload Primary Font
- Use System Fonts Only

### Media Optimization
- Lazy Load Images
- Lazy Load Iframes

### Database & Background Tasks
- Heartbeat Frequency Control

### Admin Optimization
- Hide Dashboard Widgets
- Disable Welcome Panel
- Hide Plugin Nags

## 📁 Folder Structure

```
uxnitro/
├── inc/
│   ├── branding/           # Theme branding
│   ├── performance/        # Performance optimization modules
│   │   ├── customizer-panel.php
│   │   ├── cleanup.php
│   │   ├── fonts.php
│   │   ├── media.php
│   │   ├── admin.php
│   │   └── performance-loader.php
│   ├── admin/
│   │   ├── dashboard.php
│   │   ├── editor.php
│   │   └── welcome-page.php
│   ├── customizer/         # Customizer controls
│   ├── panel-builder/      # Header/Footer builder
│   └── blog/               # Blog functionality
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── template-parts/
├── languages/
├── style.css
├── functions.php
└── README.md
```

## 🔧 Development

### Requirements
- WordPress 6.7+
- PHP 7.4+
- MySQL 5.6+ or MariaDB 10.1+

### Code Standards
- Follows WordPress Coding Standards
- Uses hooks and filters for extensibility
- Modular architecture for easy maintenance
- Translation-ready (text domain: `uxnitro`)

### Adding Custom Performance Settings

```php
// In inc/performance/customizer-panel.php
$wp_customize->add_setting(
    'uxnitro_your_setting',
    array(
        'default'           => false,
        'sanitize_callback' => 'uxnitro_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'uxnitro_your_setting',
        array(
            'label'       => __( 'Your Setting', 'uxnitro' ),
            'description' => __( 'Description here.', 'uxnitro' ),
            'section'     => 'uxnitro_performance_wordpress',
            'type'        => 'checkbox',
        )
    )
);
```

## 📚 Documentation

Full documentation available at: https://uxnitro.com/docs

## 🤝 Contributing

We welcome contributions! Please:
1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 🐛 Bug Reports

Found a bug? Please report it:
- Open an issue on GitHub
- Include WordPress version, PHP version, and steps to reproduce

## 📞 Support

- **Documentation**: https://uxnitro.com/docs
- **Support**: https://uxnitro.com/support
- **GitHub**: https://github.com/uxnitro
- **Trustpilot**: https://www.trustpilot.com/review/uxnitro.com
- **YouTube**: https://www.youtube.com/@uxnitro

## 📄 License

This theme is licensed under the GNU General Public License v2 or later.

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

## 🙏 Credits

- Based on Underscores: http://underscores.me/
- Originally forked from Customify by PressMaximum
- Grid system based on Gridlex v2.4.1
- Normalize.css by Nicolas Gallagher and Jonathan Neal

## 📊 Version History

### 1.0.15 - Current
- ✅ Complete UXNitro branding
- ✅ Performance optimization panel
- ✅ WordPress cleanup tools
- ✅ Font & media optimization
- ✅ Admin optimization settings
- ✅ Premium toggle switches with Active/Disabled labels
- ✅ WooCommerce integration removed
- ✅ All pro/upsell features removed
- ✅ All settings default to OFF for safety

### 1.0.0 - Initial Release
- Forked from Customify
- Complete rebranding to UXNitro
- Performance panel added
- Admin welcome page

---

**Built with ❤️ by the UXNitro Team**

[https://uxnitro.com](https://uxnitro.com)
