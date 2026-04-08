# Contributing to UXNitro

Thank you for your interest in contributing to UXNitro! We welcome all contributions that help make the theme better.

## 🚀 Getting Started

### Requirements
- WordPress 6.7+
- PHP 7.4+
- Git

### Setup Development Environment
1. Fork the repository
2. Clone your fork: `git clone https://github.com/YOUR-USERNAME/uxnitro.git`
3. Create a branch: `git checkout -b feature/your-feature`
4. Make your changes
5. Test thoroughly
6. Submit a pull request

## 📝 Code Standards

### PHP
- Follow WordPress PHP Coding Standards
- Use proper escaping: `esc_html__()`, `esc_url()`, `esc_attr()`, etc.
- Use translation functions: `__( 'text', 'uxnitro' )`
- Prefix all functions with `uxnitro_`
- Use hooks and filters for extensibility

### CSS
- Use kebab-case for class names
- Organize with clear section comments
- Keep specificity low
- Avoid !important unless absolutely necessary

### JavaScript
- Use jQuery for DOM manipulation (WordPress standard)
- Follow WordPress JavaScript Coding Standards
- Use strict mode: `'use strict';`
- Wrap in IIFE to avoid conflicts

## 🎯 Performance Features

When adding new performance settings:
1. Add setting in `inc/performance/customizer-panel.php`
2. Add functionality in appropriate file under `inc/performance/`
3. Use `uxnitro_get_setting( 'setting_key', 'off' )` to retrieve values
4. Default to `'off'` for safety
5. Include clear description of what it does

## 🧪 Testing

Before submitting:
- [ ] Test on fresh WordPress install
- [ ] Test with default WordPress plugins
- [ ] Test Customizer saves correctly
- [ ] Test all Performance panel toggles
- [ ] Test on mobile devices
- [ ] Check for PHP errors/warnings
- [ ] Verify no console errors

## 📦 Pull Request Process

1. Update version number if applicable
2. Add your changes to changelog
3. Ensure all tests pass
4. Update documentation if needed
5. Submit PR with clear description of changes

## 🐛 Reporting Bugs

Include:
- WordPress version
- PHP version
- Theme version
- Steps to reproduce
- Expected vs actual behavior
- Screenshots if applicable

## 💡 Feature Requests

When suggesting features:
- Explain the use case
- Describe how it fits UXNitro's goals (lightweight, performance-first)
- Consider impact on theme size and complexity

## 📁 File Organization

```
inc/
├── branding/           # Theme branding files
├── performance/        # Performance modules (NEW FEATURES GO HERE)
├── admin/             # Admin functionality
├── customizer/        # Customizer controls
├── panel-builder/     # Header/Footer builder
└── blog/              # Blog functionality
```

## 🎨 Adding Customizer Controls

All Performance panel controls:
- Use checkbox type (displays as toggle switch)
- Default to `'off'`
- Include clear label and description
- Add to appropriate section

## 📚 Resources

- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [Theme Review Guidelines](https://developer.wordpress.org/themes/)
- [Customizer API](https://developer.wordpress.org/themes/customize-api/)

## 📞 Questions?

Open an issue or contact us at https://uxnitro.com/support

---

Thank you for contributing to UXNitro! 🚀
