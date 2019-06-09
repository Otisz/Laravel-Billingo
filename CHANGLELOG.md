# Release Notes

## [v1.0.0 (2019-06-09)](https://github.com/Otisz/Laravel-Billingo/compare/v0.4.2...v1.0.0)

### Added
- Added Products service ([894dd37](https://github.com/Otisz/Laravel-Billingo/commit/894dd37fcdf242b1e46749c8aff7e43ea72c0c83))
- Added Bank accounts service ([e1ce6af](https://github.com/Otisz/Laravel-Billingo/commit/e1ce6afbddf412e530352755349759fca819b12d))
- Added Currency service ([3afea84](https://github.com/Otisz/Laravel-Billingo/commit/3afea84d4c05e2f04c26d621a1bf973415b30381))
- Added Expenses service ([6e53cdf](https://github.com/Otisz/Laravel-Billingo/commit/6e53cdf00d73353dedb1f9e63e3bb60378f2b46d))
- Added Payment methods service ([1ef5af9](https://github.com/Otisz/Laravel-Billingo/commit/1ef5af94c63ccd7c2d65e532ba8dee76a826efc0))
- Added Recurring service ([21337a4](https://github.com/Otisz/Laravel-Billingo/commit/21337a417fc329fe183902b396ed70611b503ed5))
- Added Vat service ([6955643](https://github.com/Otisz/Laravel-Billingo/commit/69556439a960a6b06b0f0571c06ec6b4e528ed6d))
- Added services to `Billingo.php` ([43bc81c](https://github.com/Otisz/Laravel-Billingo/commit/43bc81c319b7553240f344cd67e6907e37752cf5), [c44f6ae](https://github.com/Otisz/Laravel-Billingo/commit/c44f6aed9dda5ed67c6422a48b1082b17f131395))

### Changed
- Implement [Connector](https://github.com/Otisz/Billingo-API-Connector) package into [Billingo](https://github.com/Otisz/Laravel-Billingo) ([24e196e](https://github.com/Otisz/Laravel-Billingo/commit/24e196e5ec910a7497289c8bbfd77b3349d86711))
- Update Clients and Invoices services cause of implementation ([992b5fc](https://github.com/Otisz/Laravel-Billingo/commit/992b5fcae86e0a6d2f113dad27de8b6e47b36b7f))
- Update Service Provider ([bad8d57](https://github.com/Otisz/Laravel-Billingo/commit/bad8d5760b7fd490a155c48cfa3b1cbee8f10315))

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