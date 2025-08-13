=== WooCodes - Digital Product Codes Management ===
Contributors: codeswf
Tags: woocommerce, digital products, license keys, codes delivery, automatic delivery, digital codes, product keys, software licenses, game keys, activation codes
Requires at least: 5.6
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.2.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
WC requires at least: 5.0
WC tested up to: 8.0

Automatically deliver digital product codes, license keys, and activation codes to customers after WooCommerce purchase completion. Professional email templates and comprehensive management system.

== Description ==

**WooCodes** is the ultimate solution for WooCommerce store owners who sell digital products requiring unique codes, license keys, or activation codes. Whether you're selling software licenses, game keys, membership access codes, or any digital product that requires unique delivery codes, WooCodes automates the entire process.

### 🚀 Key Features

* **Automatic Code Delivery** - Codes are instantly sent via email after successful payment
* **Professional Email Templates** - Fully customizable, mobile-responsive email designs
* **Bulk Code Management** - Import hundreds of codes via CSV or add them manually
* **Real-time Stock Tracking** - Monitor available codes and get low-stock alerts
* **Thank You Page Integration** - Display codes beautifully on order confirmation pages
* **Comprehensive Logging** - Track every code sent with detailed logs
* **Multi-Product Support** - Manage codes for unlimited products
* **Copy-to-Clipboard** - Easy code copying for customers
* **Customizable Branding** - Add your logo, colors, and custom messaging

### 🎯 Perfect For

* Software companies selling license keys
* Game developers distributing activation codes
* Membership sites with access codes
* Digital marketplaces
* Educational platforms with course codes
* Any business selling unique digital codes

### 🛡️ Secure & Reliable

* **WordPress Coding Standards** - Clean, secure, and optimized code
* **CSRF Protection** - All forms protected with WordPress nonces
* **Data Sanitization** - All inputs properly sanitized and validated
* **Database Security** - Uses WordPress database API with prepared statements
* **No External Dependencies** - Completely self-contained plugin

### 📧 Email Features

* **Professional Design** - Beautiful, responsive email templates
* **Custom Branding** - Upload your logo and customize colors
* **Personalization** - Include customer names and order details
* **Support Integration** - Add support links and contact information
* **Mobile Optimized** - Looks perfect on all devices

### 📊 Management Features

* **Bulk Import** - CSV upload for mass code addition
* **Individual Management** - Add, edit, or delete codes individually
* **Stock Monitoring** - Real-time availability tracking
* **Export Options** - Export codes for backup or external use
* **Search & Filter** - Find specific codes quickly
* **Duplicate Prevention** - Automatic duplicate code detection

### 🔧 Easy Setup

1. Install and activate the plugin
2. Go to WooCodes in your WordPress admin
3. Select a product and add your codes
4. Customize your email template
5. Codes are automatically sent on purchase!

### 🌐 Multilingual Support

* **Translation Ready** - Full internationalization support
* **RTL Compatible** - Works with right-to-left languages
* **WPML Compatible** - Works with multilingual sites

### 🎨 Customization Options

* **Logo Upload** - Add your brand logo to emails
* **Color Schemes** - Match your brand colors
* **Custom Messages** - Personalize all text content
* **Support Links** - Add help and contact information
* **Button Styling** - Customize call-to-action buttons

== Installation ==

### Automatic Installation

1. Log into your WordPress admin panel
2. Go to Plugins → Add New
3. Search for "WooCodes"
4. Click "Install Now" and then "Activate"

### Manual Installation

1. Download the plugin zip file
2. Upload `woocodes` folder to `/wp-content/plugins/`
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Go to WooCodes in your admin menu to configure

### After Installation

1. Ensure WooCommerce is installed and activated
2. Navigate to WooCodes → Codes Management
3. Select a product and add your codes
4. Customize your email template in Invoice Settings
5. Test with a small order to ensure everything works perfectly

== Frequently Asked Questions ==

= Does this plugin require WooCommerce? =

Yes, WooCodes is built specifically for WooCommerce and requires it to function. Make sure you have WooCommerce installed and activated.

= How do I add codes to my products? =

1. Go to WooCodes → Codes Management
2. Select your product from the dropdown
3. Either paste codes manually (one per line) or upload a CSV file
4. Click "Save Codes"

= What format should my CSV file be in? =

Your CSV file should be simple with one code per line:
```
ABC123-XYZ456
DEF789-UVW012
GHI345-STU678
```

= Can I customize the email template? =

Absolutely! Go to WooCodes → Invoice Settings to:
- Upload your logo
- Change colors and fonts
- Modify all text content
- Add support links
- Customize button text

= What happens when I run out of codes? =

The plugin will:
- Show low stock warnings when codes are running low
- Prevent purchases when no codes are available
- Log which products need code replenishment
- Display stock status on product pages

= Can customers see codes on the thank you page? =

Yes! Codes are displayed beautifully on the order confirmation page with:
- Professional styling matching your email template
- Copy-to-clipboard functionality
- Organized by product
- Your branding and support information

= How can I track which codes were sent? =

The plugin maintains detailed logs showing:
- Which codes were sent to which customers
- Order numbers and dates
- Product information
- Customer email addresses

= Is the plugin secure? =

Yes, WooCodes follows WordPress security best practices:
- All forms use WordPress nonces for CSRF protection
- Input sanitization and output escaping
- Prepared database statements
- Capability checks for admin functions

= Can I use this with variable products? =

Yes, WooCodes works with simple products, variable products, and all WooCommerce product types.

= What if the email doesn't send? =

WooCodes uses WordPress's built-in wp_mail() function. If emails aren't sending:
1. Check your WordPress email configuration
2. Consider using an SMTP plugin
3. Check the order notes for delivery status
4. Ensure codes are available for the products

= Can I export my codes? =

Yes! You can:
- Copy individual codes to clipboard
- Copy all codes for a product
- Export codes as CSV files
- View comprehensive logs of sent codes

== Screenshots ==

1. **Codes Management Interface** - Easy-to-use dashboard for managing product codes
2. **Email Template Customization** - Professional email template with live preview
3. **Customer Email Example** - Beautiful, responsive email customers receive
4. **Thank You Page Display** - Codes displayed on order confirmation page
5. **Sent Codes Log** - Comprehensive tracking of all delivered codes
6. **Product Stock Display** - Show code availability on product pages
7. **CSV Import Interface** - Bulk import codes from spreadsheet files
8. **Mobile-Responsive Design** - Perfect display on all devices

== Changelog ==

= 1.2.0 - 2024-12-20 =
* **Major Update - CodeCanyon Ready**
* Added: Complete plugin restructure with proper OOP architecture
* Added: Enhanced security with nonces and capability checks
* Added: Comprehensive database logging system
* Added: Copy-to-clipboard functionality for codes
* Added: Export codes as CSV feature
* Added: Low stock warnings and availability display
* Added: Mobile-responsive email templates
* Added: Professional admin interface with improved UX
* Added: Proper internationalization support
* Added: WordPress coding standards compliance
* Added: Extensive documentation and help system
* Improved: Email template system with live preview
* Improved: Code management with bulk operations
* Improved: Error handling and user feedback
* Fixed: Security vulnerabilities and XSS prevention
* Fixed: Database queries with proper sanitization
* Fixed: Compatibility with latest WordPress and WooCommerce

= 1.1.0 - 2024-06-15 =
* Added: CSV import functionality for bulk code uploads
* Added: Invoice customization options
* Added: Support message configuration
* Improved: Email template responsive design
* Fixed: Duplicate code prevention
* Fixed: Order completion handling

= 1.0.1 - 2024-03-10 =
* Fixed: Plugin activation issues on some configurations
* Fixed: Code delivery timing problems
* Improved: Error handling and logging

= 1.0.0 - 2024-01-01 =
* Initial release
* Basic code management system
* Automatic email delivery
* Simple admin interface
* Order thank you page integration

== Upgrade Notice ==

= 1.2.0 =
Major update with enhanced security, new features, and improved user experience. Backup your site before updating. This version includes database schema changes and requires reactivation.

= 1.1.0 =
New CSV import feature and customization options. Recommended update for all users.

= 1.0.1 =
Important bug fixes for plugin activation and code delivery. Please update immediately.

== Additional Information ==

### Support

For support, documentation, and feature requests, please visit:
* **Plugin Website**: https://woocodes.com
* **Documentation**: https://woocodes.com/docs
* **Support Forum**: https://woocodes.com/support

### Contributing

WooCodes is open source and welcomes contributions:
* **GitHub Repository**: https://github.com/mohammedchalh/woocodes
* **Bug Reports**: https://github.com/mohammedchalh/woocodes/issues
* **Feature Requests**: https://woocodes.com/feature-requests

### Privacy Policy

WooCodes respects user privacy:
* No data is sent to external servers
* All customer information stays on your site
* Codes are stored securely in your WordPress database
* Email delivery uses your existing WordPress email system

### Performance

WooCodes is optimized for performance:
* Minimal database queries
* Efficient code lookup algorithms
* Lightweight frontend resources
* Caching-friendly architecture

### Compatibility

WooCodes is tested and compatible with:
* WordPress 5.6+ to 6.5+
* WooCommerce 5.0+ to 8.0+
* PHP 7.4+ to 8.2+
* All major WordPress themes
* Popular WooCommerce extensions
* Multilingual plugins (WPML, Polylang)
* Caching plugins
* Security plugins

== License ==

This plugin is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify
> it under the terms of the GNU General Public License as published by
> the Free Software Foundation; either version 2 of the License, or
> (at your option) any later version.
> 
> This program is distributed in the hope that it will be useful,
> but WITHOUT ANY WARRANTY; without even the implied warranty of
> MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
> GNU General Public License for more details.
