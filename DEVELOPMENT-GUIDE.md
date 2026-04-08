# UXNitro Development Guide

## Overview

UXNitro is a lightweight, hosting-focused WordPress theme forked from Customify. This document outlines the changes made and provides guidance for future development.

---

## ✅ Completed Changes

### 1. Theme Branding
- ✅ Theme name changed from "Customify" to "UXNitro"
- ✅ Author changed from "WPCustomify" to "UXNitro"
- ✅ Theme URI and Author URI updated to https://uxnitro.com
- ✅ Description updated to reflect hosting-focused positioning
- ✅ Version bumped to 1.0.0
- ✅ Text domain changed to "uxnitro"
- ✅ All user-facing strings updated (600+ references)
- ✅ Language files updated (customify.pot → uxnitro.pot)
- ✅ Admin dashboard branding updated
- ✅ Welcome page created with UXNitro branding
- ✅ SVG logo created (admin-logo.svg, uxnitro-logo-admin.svg)

### 2. New Features Added

#### UXNitro Performance Panel (Customizer)
Location: WordPress Customizer → UXNitro Performance

**WordPress Cleanup Section:**
- ✅ Disable Emojis (removes emoji scripts/styles)
- ✅ Disable Embeds (prevents external embed scripts)
- ✅ Disable Block Library CSS (removes Gutenberg CSS if unused)
- ✅ Disable Dashicons for Guests
- ✅ Disable RSS Feeds
- ✅ Disable XML-RPC
- ✅ Disable REST API for Guests
- ✅ Disable Pingbacks
- ✅ Disable Shortlink
- ✅ Disable Generator Meta Tag
- ✅ Disable oEmbed Discovery Links
- ✅ Disable Query Strings from Static Files
- ✅ Disable Heartbeat API
- ✅ Disable Comment Reply Script (when not needed)
- ✅ Disable jQuery Migrate

**Font Optimization Section:**
- ✅ Disable Google Fonts
- ✅ Font Display Swap toggle
- ✅ Preload Primary Font
- ✅ Preload Font URL input
- ✅ Use System Fonts Only toggle

**Media Optimization Section:**
- ✅ Enable Lazy Load for Images
- ✅ Enable Lazy Load for Iframes

**Database & Background Tasks Section:**
- ✅ Heartbeat Frequency Control (15s, 30s, 60s, 120s)

**Admin Optimization Section:**
- ✅ Hide Dashboard Widgets
- ✅ Disable Welcome Panel
- ✅ Hide Plugin Nags
- ✅ Disable Update Nags for Non-Admin Users
- ✅ Simplify Admin Menu
- ✅ Cleanup Admin Bar

### 3. New File Structure

```
UXNitro-master/
├── inc/
│   ├── branding/           # Theme branding (future use)
│   ├── performance/        # Performance optimization modules
│   │   ├── customizer-panel.php    # Performance Customizer panel
│   │   ├── cleanup.php             # WordPress cleanup
│   │   ├── fonts.php               # Font optimization
│   │   ├── media.php               # Media optimization
│   │   ├── admin.php               # Admin optimization
│   │   └── performance-loader.php  # Module loader
│   └── admin/
│       └── welcome-page.php        # Admin welcome page
├── assets/
│   └── images/
│       ├── admin-logo.svg          # Admin logo (SVG)
│       ├── admin/
│       │   └── uxnitro-logo-admin.svg  # Dashboard logo
│       └── BRANDING-ASSETS.md      # Asset requirements
└── functions.php                   # Updated with performance modules
```

### 4. Code Quality
- ✅ All new code follows WordPress Coding Standards
- ✅ Proper escaping and sanitization
- ✅ Translation-ready strings
- ✅ Modular architecture for easy maintenance
- ✅ Hooks and filters used where possible
- ✅ Backward compatibility maintained

---

## 🔄 Preserved Features (Intentionally Not Changed)

### Internal Class Names
These were kept for backward compatibility:
- `Customify` (main class)
- `Customify_Customizer`
- `Customify_Dashboard`
- All other internal PHP class names

### Function Names
- `customify_is_e_theme_location()`
- `customify_content_width`
- `customify_the_content` (filter)
- Other internal function names

### Filter/Action Hooks
- `customify/load-scripts`
- `customify/theme/css`
- `customify/theme/js`
- `Customify_JS` (JavaScript object)
- All core Customify hooks

### CSS Classes
- `customify-grid`
- `customify-col`
- All grid/layout CSS classes

**Rationale**: Changing these would break child themes and customizations. The internal architecture remains compatible with Customify while presenting UXNitro branding to users.

---

## 📋 To-Do List (Future Improvements)

### High Priority

#### 1. Visual Assets
- [ ] Create production-ready PNG screenshot.png (1200x900px)
  - Show modern homepage design
  - Include UXNitro branding
  - Demonstrate theme capabilities

- [ ] Convert SVG logos to PNG
  - `assets/images/admin-logo.svg` → `admin-logo.png` (512x512px)
  - Create `customify_logo@2x.png` replacement

- [ ] Create welcome page banner (1200x400px)

#### 2. Testing
- [ ] Test on fresh WordPress installation
- [ ] Test Customizer Performance panel
  - Verify all toggles work
  - Test each performance option
  - Check for conflicts with popular plugins

- [ ] Test compatibility with:
  - [ ] Elementor
  - [ ] Gutenberg blocks
  - [ ] WooCommerce
  - [ ] SureCart
  - [ ] LiteSpeed Cache
  - [ ] WP Rocket
  - [ ] W3 Total Cache

- [ ] Mobile responsiveness testing
  - [ ] Header builder on mobile
  - [ ] Footer builder on mobile
  - [ ] Performance panel on mobile

#### 3. Documentation
- [ ] Create user documentation for Performance panel
- [ ] Document all performance settings with examples
- [ ] Create migration guide from Customify to UXNitro
- [ ] Write developer documentation

### Medium Priority

#### 4. Performance Enhancements
- [ ] Add WebP image support toggle
- [ ] Add critical CSS injection option
- [ ] Add DNS prefetch controls
- [ ] Add preconnect URL controls
- [ ] Integration with LiteSpeed Cache API
- [ ] Auto-detect and recommend optimal settings

#### 5. Admin Experience
- [ ] Add performance score indicator
- [ ] Add one-click optimization presets
  - "Maximum Performance"
  - "Balanced"
  - "Compatibility Mode"

- [ ] Add conflict detection for plugins
- [ ] Show warnings when settings may conflict
- [ ] Add "Test Mode" for safe experimentation

#### 6. Remove Clutter
- [ ] Review and disable unnecessary demo content
- [ ] Clean up admin notices
- [ ] Streamline Customizer sections
- [ ] Remove unused starter templates references

### Low Priority

#### 7. Feature Additions
- [ ] Add SureCart-specific styling options
- [ ] Add hosting company starter template
- [ ] Add SaaS landing page template
- [ ] Integration with popular form plugins
- [ ] Add dark mode toggle option

#### 8. Developer Experience
- [ ] Add comprehensive action/filter reference
- [ ] Create child theme starter kit
- [ ] Add Gulp/Grunt build process improvements
- [ ] Better Sass organization
- [ ] Add PHP unit tests

---

## 🚀 Installation & Activation

### For New Users
1. Upload `UXNitro-master` folder to `/wp-content/themes/`
2. Extract the folder (if zipped)
3. Go to WordPress Admin → Appearance → Themes
4. Find "UXNitro" and click "Activate"
5. You'll be redirected to the welcome page automatically

### For Customify Users Migrating
1. Backup your current Customify settings
2. Upload UXNitro theme
3. Activate UXNitro (all settings are preserved!)
4. Review new Performance panel
5. Enable recommended optimizations

---

## 🎯 Recommended Performance Settings

For most hosting-focused sites, enable these:

### WordPress Cleanup ✅ Enable
- Disable Emojis
- Disable Dashicons for Guests
- Disable XML-RPC
- Disable Pingbacks
- Disable Shortlink
- Disable Generator Meta
- Disable Query Strings
- Disable Comment Reply Script
- Disable jQuery Migrate

### WordPress Cleanup ⚠️ Review First
- Disable Embeds (if you don't embed external content)
- Disable Block Library CSS (if not using Gutenberg)
- Disable RSS Feeds (if you don't want feed subscribers)
- Disable REST API for Guests (may break some plugins)
- Disable Heartbeat API (may affect auto-save)

### Font Optimization ✅ Enable
- Font Display Swap
- Disable Google Fonts (if using local/system fonts)

### Media Optimization ✅ Enable
- Lazy Load for Images
- Lazy Load for Iframes

### Database ✅ Recommended
- Heartbeat Frequency: 60 seconds

### Admin Optimization ✅ Enable
- Disable Welcome Panel
- Disable Update Nags for Non-Admin Users

---

## 🐛 Troubleshooting

### Issue: Site looks broken after activation
**Solution**: Go to Customizer → UXNitro Performance and disable recent changes one by one.

### Issue: Plugin not working correctly
**Solution**: Some performance options may conflict with certain plugins. Try disabling:
- "Disable Block Library CSS" if Gutenberg breaks
- "Disable REST API for Guests" if plugin uses REST API
- "Disable jQuery Migrate" if older plugins fail

### Issue: Fonts not loading
**Solution**: 
1. Check if "Disable Google Fonts" is enabled
2. Verify font URLs if using preload
3. Try disabling "Use System Fonts Only"

### Issue: Admin area missing features
**Solution**: 
1. Check "Simplify Admin Menu" setting
2. Verify user has proper capabilities
3. Disable admin optimizations temporarily

---

## 📝 Developer Notes

### Adding New Performance Settings

1. Add setting in `inc/performance/customizer-panel.php`:
```php
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
            'description' => __( 'Description with recommendations.', 'uxnitro' ),
            'section'     => 'uxnitro_performance_wordpress',
            'type'        => 'checkbox',
        )
    )
);
```

2. Implement functionality in appropriate file under `inc/performance/`

3. Use `uxnitro_get_setting('your_setting_key', $default)` to retrieve values

### Performance Module Structure

Each performance module should:
- Have clear, descriptive purpose
- Include detailed comments
- Use `uxnitro_get_setting()` for retrieving settings
- Include safety checks before disabling features
- Be reversible (no destructive changes)

### Testing New Features

Always test:
1. ✅ With default settings
2. ✅ With all optimizations enabled
3. ✅ On mobile devices
4. ✅ With popular page builders
5. ✅ With caching plugins
6. ✅ With WooCommerce active

---

## 🔐 Security Considerations

- All user inputs are sanitized and sanitized
- Nonce verification used where appropriate
- Capability checks for admin-only features
- No sensitive data exposed in frontend
- WordPress security best practices followed

---

## 📞 Support & Resources

- **Website**: https://uxnitro.com
- **Documentation**: https://uxnitro.com/docs
- **Support**: https://uxnitro.com/support
- **GitHub**: (add repository URL)

---

## 📄 License

This theme is licensed under the GNU General Public License v2 or later.

---

## 🙏 Credits

- Based on Underscores: http://underscores.me/
- Originally forked from Customify by PressMaximum
- Grid system based on Gridlex v2.4.1
- Normalize.css by Nicolas Gallagher and Jonathan Neal

---

**Last Updated**: April 8, 2026
**Version**: 1.0.0
**Maintained by**: UXNitro Team
