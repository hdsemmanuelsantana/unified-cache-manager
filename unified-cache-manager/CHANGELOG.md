# Changelog

## [1.0.4] - 2025-05-30

### Added
- Cache detection for WP Rocket, Cloudflare (plugin), and WP Engine hosting environment.
- Automatic button display on dashboard for available cache tools.
- Cache actions for:
  - Clearing WP Rocket cache
  - Triggering Cloudflare full purge
  - Calling WP Engine cache clear (if available)

### Changed
- Admin UI now conditionally displays cache controls only for active platforms.

## [1.0.3] - 2024-05-30
### Changed
- Admin menu label updated to "Unified Cache Tools"
- Dashicon changed to `dashicons-database`

## [1.0.2] - 2024-05-30
### Added
- Manual plugin update checker button in dashboard

### Improved
- Admin page layout and nonce validation

## [1.0.1] - 2024-05-29
### Fixed
- Prevented fatal error from duplicate PUC class

## [1.0.0] - 2024-05-28
### Initial Release
- Unified interface for cache clearing
- Integrated Plugin Update Checker
