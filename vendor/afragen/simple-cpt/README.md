# Simple CPT

 * Contributors: [Andy Fragen](https://github.com/afragen)
 * License: MIT
 * Requires at least: 5.0
 * Requires PHP: 7.0

A simple framework for registering custom post types and their taxonomies.

## Description

This framework registers a custom post type and several associated taxonomies.

Inject 2 arrays to `Bootstrap`.

```php
$cpt = [ singular, plural, icon ];
$tax = [ [ single-1, plural-1 ], [ single-2, plural-2 ], [ ..., ... ] ];
```

It is not i18n compliant.
