# php-date-frequency
Date frequency calculator and public holiday checker.

## Usage

As per example.php:

<b>Include class file</b>
```php
include('src/datefrequency.php');
```

## Next Occurrence

<b>Enter a date, count and interval into the nextOccurrence function to get the next occurrence:</b>

```php
//3 months from date
$nextOccurrence = DateFrequency::nextOccurrence('08-05-2018', '3', 'months');
echo '<br>'.$nextOccurrence;
// 2018-08-08
```

<b>You can also specify the preferred day of the month Eg. "first monday":</b>

```php
//3 months from date and the preferred day of the month
$nextOccurrence = DateFrequency::nextOccurrence('08-05-2018', '3', 'months', 'third wednesday');
echo '<br>'.$nextOccurrence;
// 2018-08-15
```

<b>To change the format, add it to the parameters:</b>

```php
//custom format
$nextOccurrence = DateFrequency::nextOccurrence('08-05-2018', '3', 'months', 'third wednesday', 'Ymd');
echo '<br>'.$nextOccurrence;
// 20180815
```

## Public Holiday Checker

Data utilises the API provided by data.gov.au.

Public Holiday Dataset: https://data.gov.au/dataset/australian-holidays-machine-readable-dataset

<b>Check if date is a public holiday:</b>

```php
//check if date is a public holiday
$isholiday = publicHoliday::isHoliday('13-12-2018');
echo '<br>'.$isholiday;
// false

$isholiday = publicHoliday::isHoliday('25-12-2018');
echo '<br>'.$isholiday;
// true
```

<b>Get the name of the public holiday:</b>
```php
//get name of public holiday
$holidayName = publicHoliday::holidayName('25-12-2018');
echo '<br>'.$holidayName;
// Christmas Day
```
