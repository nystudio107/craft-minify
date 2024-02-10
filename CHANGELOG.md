# Minify Changelog

## 1.2.13 - UNRELEASED
### Added
* Added `ServicesTrait` for the plugin service component registration

## 1.2.12 - 2024.02.09
### Added
* Add `phpstan` and `ecs` code linting
* Add `code-analysis.yaml` GitHub action

### Changed
* Updated docs to use node 20 & a new sitemap plugin
* PHPstan code cleanup
* ECS code cleanup

## 1.2.11 - 2022.02.22
### Added

* Add `.gitattributes` & `CODEOWNERS`

### Changed

* Switched documentation system to VitePress
* Use Textlint for the documentation
* Build documentation automatically via GitHub action

## 1.2.10 - 2020.04.02
### Changed
* Exclude Nginx/Apache Server Side Include (SSI) comments from being stripped via `mrclay/minify` PR

## 1.2.9 - 2018.07.21
### Changed
* We now default `disableDevModeMinifying` to `true` (which is probably what most people want in `devMode`)

## 1.2.8 - 2018.03.02
### Changed
* Fixed deprecation errors from Craft CMS 3 RC13

## 1.2.7 - 2018.02.01
### Added
* Renamed the composer package name to `craft-minify`

## 1.2.6 - 2017.12.06
### Changed
* Updated to require craftcms/cms `^3.0.0-RC1`
* Switched to `Craft::$app->view->registerTwigExtension` to register the Twig extension

## 1.2.5 - 2017.04.11
### Changed
* Updated minify deps to `3.0.0` for PHP 7.1 compatibility

## 1.2.4 - 2017.03.24
### Changed
* `hasSettings` -> `hasCpSettings` for Craft 3 beta 8 compatibility
* Added Craft 3 beta 8 compatible settings
* Modified config service calls for Craft 3 beta 8

## 1.2.3 - 2017.03.12
### Added
* Added `craft/cms` as a composer dependency
* Added code inspection typehinting for the plugin & services

### Changed
* Code refactor/cleanup

## 1.2.2 - 2017.02.17
### Changed
* Code cleanup
* Added a new colored icon

## 1.2.1 - 2017.02.10
### Changed
* Cleaned up `composer.json`

## 1.2.0 - 2017.02.01
### Added
- Ported the plugin to Craft 3
- Broke out the settings into a `config.php` file
