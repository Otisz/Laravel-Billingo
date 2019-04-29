# Release Notes

## [v0.4.2 (2019-04-29)](https://github.com/Otisz/Laravel-Billingo/compare/v0.4.1...v0.4.2)

### Fixed
- Remove forced block id ([7e9ec2](https://github.com/Otisz/Laravel-Billingo/commit/7e9ec213d2350ecc6048ed886363eefac8b98c64))

## [v0.4.1 (2019-04-23)](https://github.com/Otisz/Laravel-Billingo/compare/v0.4.0...v0.4.1)

### Changed
- Clean up code duplication ([4f5484e](https://github.com/Otisz/Laravel-Billingo/commit/4f5484e258fadabaa916af2424a4eed4f3400a69))
- Update docs ([5e5abaf](https://github.com/Otisz/Laravel-Billingo/commit/5e5abafc70e84ec399c7e9975302feb7385dc891))

## [v0.4.0 (2019-04-18)](https://github.com/Otisz/Laravel-Billingo/compare/v0.3.0...v0.4.0)

### Added
- Added custom connector package ([c5bc930](https://github.com/Otisz/Laravel-Billingo/commit/c5bc9307564dc09b44bac7746f9e3acdaf8bb9b0))

### Changed
- Rename `Otisz\Billingo\Providers\ServiceProvider` to `Otisz\BillingoServiceProvider` ([d348de5](https://github.com/Otisz/Laravel-Billingo/commit/d348de5d20c40cb5294ae979674818aebf283671))
- Use billingo facade in services ([d348de5](https://github.com/Otisz/Laravel-Billingo/commit/d348de5d20c40cb5294ae979674818aebf283671))

## [v0.3.0 (2019-03-23)](https://github.com/Otisz/Laravel-Billingo/compare/v0.2.1...v0.3.0)

### Added
- Added Invoices service ([d9c4111](https://github.com/Otisz/Laravel-Billingo/commit/d9c4111916ffff8618c987617c13170497d9ea5a))
- Added connector accessor ([d570758](https://github.com/Otisz/Laravel-Billingo/commit/d5707586ca08b02182d8e961d710147fa6477d40))

### Changed
- Require `illuminate/support` ([0ac5ffb](https://github.com/Otisz/Laravel-Billingo/commit/0ac5ffbb11cd5a5e9b528eef79701f336ba3b780))

## [v0.2.1 (2019-03-22)](https://github.com/Otisz/Laravel-Billingo/compare/v0.2.0...v0.2.1)

### Fixed
- Bind `Billngo.php` contract to `Billingo.php` class before BillingoConnector ([21096e7](https://github.com/Otisz/Laravel-Billingo/commit/21096e798fb747237e2dd825f52997406a7241c0))

## [v0.2.0 (2019-03-21)](https://github.com/Otisz/Laravel-Billingo/compare/v0.1.0...v0.2.0)

### Added
- Add `Billingo.php` contract ([114876f](https://github.com/Otisz/Laravel-Billingo/commit/114876f27693bc84763354c995ac1b98406626b2))

### Changed
- Moved methods from `BillinGoblin.php` abstract class to `Billingo.php` class ([d8913a1](https://github.com/Otisz/Laravel-Billingo/commit/d8913a11421e2b6d4b8739dc28298dae36ba6812))
- Renamed `show()` to `find()` method in `Clients.php` class ([d8913a1](https://github.com/Otisz/Laravel-Billingo/commit/d8913a11421e2b6d4b8739dc28298dae36ba6812))

### Fixed
- Fixed bindings of classes and interfaces in `ServiceProvider.php` ([28ce6d3](https://github.com/Otisz/Laravel-Billingo/commit/28ce6d33b892c90709d919adaa517ce602935589))

### Removed
- Remove `BillinGoblin.php` abstract class ([4eb8856](https://github.com/Otisz/Laravel-Billingo/commit/4eb8856dc392f0e188d34df0896dfda26ec73af7))

## [v0.1.0 (2019-03-18)](https://github.com/Otisz/Laravel-Billingo)

### Added
- Add client service