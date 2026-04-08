# UXNitro v1.0.0 - Release Notes

**Release Date**: April 8, 2026  
**Status**: Stable Release  
**Based On**: Customify 0.4.13  

---

## 🎉 Introducing UXNitro

UXNitro is a lightweight, hosting-focused WordPress theme built for speed and modern design. Forked from Customify, it has been rebranded and enhanced with powerful performance optimization features.

### What's New

#### Complete Rebranding
- Theme name changed to **UXNitro**
- New branding throughout (UXNitro.com)
- Updated documentation and support links
- Professional admin interface
- Welcome page for new users

#### 🚀 UXNitro Performance Panel

Brand new Customizer panel with **30+ performance optimization settings**:

##### WordPress Cleanup (15 settings)
Remove unnecessary WordPress bloat:
- ✅ Disable Emojis - Remove emoji scripts
- ✅ Disable Embeds - Control external embeds
- ✅ Disable Block Library CSS - Clean up unused CSS
- ✅ Disable Dashicons for Guests
- ✅ Disable RSS Feeds
- ✅ Disable XML-RPC - Security improvement
- ✅ Disable REST API for Guests
- ✅ Disable Pingbacks - Reduce spam
- ✅ Disable Shortlink tags
- ✅ Disable Generator Meta - Hide WP version
- ✅ Disable oEmbed Discovery Links
- ✅ Disable Query Strings from Static Files
- ✅ Disable Heartbeat API - Reduce server load
- ✅ Disable Comment Reply Script
- ✅ Disable jQuery Migrate

##### Font Optimization (5 settings)
Control how fonts load:
- ✅ Disable Google Fonts
- ✅ Font Display Swap
- ✅ Preload Primary Font
- ✅ Use System Fonts Only

##### Media Optimization (2 settings)
- ✅ Lazy Load Images
- ✅ Lazy Load Iframes

##### Database & Background Tasks (1 setting)
- ✅ Heartbeat Frequency Control

##### Admin Optimization (6 settings)
- ✅ Hide Dashboard Widgets
- ✅ Disable Welcome Panel
- ✅ Hide Plugin Nags
- ✅ Disable Update Nags
- ✅ Simplify Admin Menu
- ✅ Cleanup Admin Bar

---

## 📋 Full Changelog

### Changed
- **Theme Name**: Customify → UXNitro
- **Author**: WPCustomify → UXNitro
- **Author URI**: https://uxnitro.com
- **Theme Description**: Rewritten for hosting-focused positioning
- **Version**: 0.4.13 → 1.0.0
- **Minimum PHP**: 5.6 → 7.4
- **Text Domain**: customify → uxnitro
- All user-facing branding strings updated
- Admin dashboard updated with UXNitro branding
- Language files updated
- Welcome page added

### Added
- New `inc/performance/` directory with modular architecture
- Performance Customizer panel with detailed descriptions
- Admin welcome page (Appearance → UXNitro)
- SVG logo files for admin area
- Comprehensive documentation (DEVELOPMENT-GUIDE.md)
- Branding asset requirements (BRANDING-ASSETS.md)

### Improved
- Performance settings now include clear descriptions
- Each option explains when it's safe to use
- Recommendations provided for each setting
- Side effects documented

### Preserved
- All Customify functionality remains intact
- Header & Footer builder
- Typography controls
- Global color palette
- Sticky header
- Transparent header
- Container width controls
- Sidebar controls
- Blog and archive layouts
- Button styling
- Spacing controls
- Mobile responsive controls
- WooCommerce compatibility
- Elementor compatibility
- Gutenberg support

---

## 🎯 Who Is This For?

### Perfect For:
- ✅ Hosting companies
- ✅ Web agencies
- ✅ SaaS websites
- ✅ Blogs
- ✅ Small business sites
- ✅ Anyone wanting a fast, lightweight theme

### Works Great With:
- Elementor page builder
- Gutenberg editor
- SureCart
- LiteSpeed Cache
- WooCommerce
- All major caching plugins

---

## 🚀 Quick Start Guide

### 1. Installation
```bash
# Upload to WordPress
/wp-content/themes/UXNitro-master/

# Or use WP Admin
Appearance → Themes → Add New → Upload Theme
```

### 2. Activation
- Go to Appearance → Themes
- Activate "UXNitro"
- You'll see the welcome page automatically

### 3. Performance Optimization
- Go to Appearance → Customize
- Find "UXNitro Performance"
- Enable recommended settings (see DEVELOPMENT-GUIDE.md)

### 4. Customize Your Site
- Use the Customizer for all theme options
- Header & Footer builder available
- Typography and color controls
- Mobile responsive settings

---

## ⚠️ Important Notes

### For Customify Users Migrating
✅ **Your settings are preserved!** All Customify customizer settings work exactly the same.

### Backward Compatibility
- Internal class names unchanged (for developers)
- All filter/action hooks preserved
- CSS class names unchanged
- Child themes remain compatible

### What Changed
- Only user-facing branding
- Added Performance panel
- New optimization features

### What Didn't Change
- Core theme functionality
- Customizer structure (except new panel)
- Template files
- Widget areas
- Layout options

---

## 📸 Screenshots

*(Note: Production screenshot.png needs to be created - see BRANDING-ASSETS.md)*

Current placeholder: Existing screenshot.png from Customify

---

## 🐛 Known Issues

None at this time. Please report any issues to https://uxnitro.com/support

---

## 🔮 Future Roadmap

### Version 1.1.0 (Planned)
- [ ] Performance score indicator
- [ ] One-click optimization presets
- [ ] Conflict detection for plugins
- [ ] WebP image support toggle
- [ ] DNS prefetch controls
- [ ] Preconnect URL controls

### Version 1.2.0 (Planned)
- [ ] SureCart-specific styling
- [ ] Hosting company starter template
- [ ] SaaS landing page template
- [ ] Integration with form plugins

---

## 📚 Documentation

- **Development Guide**: See `DEVELOPMENT-GUIDE.md`
- **Branding Assets**: See `BRANDING-ASSETS.md`
- **Readme**: See `readme.txt`

Online documentation: https://uxnitro.com/docs

---

## 🤝 Credits

**Based On**: Customify by PressMaximum  
**Original Author**: WPCustomify  
**UXNitro Fork**: UXNitro Team  

**License**: GNU General Public License v2 or later  
**License URI**: http://www.gnu.org/licenses/gpl-2.0.html  

---

## 📞 Support

- **Website**: https://uxnitro.com
- **Documentation**: https://uxnitro.com/docs
- **Support**: https://uxnitro.com/support
- **Facebook Group**: (Link in theme admin)

---

## ✅ Testing Checklist

Before using in production, test:
- [ ] On a staging site first
- [ ] All Performance panel options
- [ ] With your plugins active
- [ ] On mobile devices
- [ ] With your caching solution
- [ ] Page builders (Elementor, etc.)
- [ ] WooCommerce (if applicable)

---

## 🎓 Recommended Performance Settings

### Safe for Most Sites ✅
```
WordPress Cleanup:
✓ Disable Emojis
✓ Disable Dashicons for Guests  
✓ Disable XML-RPC
✓ Disable Pingbacks
✓ Disable Shortlink
✓ Disable Generator Meta
✓ Disable Query Strings
✓ Disable Comment Reply Script
✓ Disable jQuery Migrate

Font Optimization:
✓ Font Display Swap

Media Optimization:
✓ Lazy Load Images
✓ Lazy Load Iframes

Database:
✓ Heartbeat: 60 seconds

Admin:
✓ Disable Welcome Panel
✓ Disable Update Nags for Non-Admin
```

### Review Before Enabling ⚠️
```
- Disable Embeds (if you embed external content)
- Disable Block Library CSS (if using Gutenberg)
- Disable RSS Feeds (if you want feed subscribers)
- Disable REST API for Guests (may break plugins)
- Disable Heartbeat API (may affect auto-save)
```

---

**Thank you for choosing UXNitro!** 🚀

Built for speed. Designed for you.
