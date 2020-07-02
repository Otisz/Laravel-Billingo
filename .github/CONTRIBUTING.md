# Contribution Guide

## Running Laravel Billingo's Tests

Billingo API V3 **DOES NOT** provide testing/sandbox environment.

Like Billingo, I also recommend that you create a new Billingo account so that tests don’t cause you any problems.

Copy the default file using `cp phpunit.xml.dist phpunit.xml` and set the following line below the `BILLINGO_API_KEY` environment variable in your new `phpunit.xml` file:

```
<env name="BILLINGO_API_KEY" value="Your Billingo API Key"/>
```
 
Please note that due to the fact that actual API requests against Billingo are being made, these tests take a few minutes to run.